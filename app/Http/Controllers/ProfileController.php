<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function dashboard(){
        $user = auth()->user();
        return view('profile.dashboard', compact('user'));
    }

    public function orders()
    {
        $orders = auth()->user()
            ->orders()
            ->with(['items.product.images'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('profile.orders', compact('orders'));
    }

    public function orderDetails(Order $order)
    {
        if ($order->user_id !== auth()->id()) {
            abort(403, 'Nie masz dostępu do tego zamówienia.');
        }

        $order->load(['items.product.images']);

        return view('profile.order-details', compact('order'));
    }



    public function reviews(){
        $user = auth()->user();
        $reviews = $user->reviews()->with(['product.images', 'images'])->latest()->paginate(10);
        $productsToReview = \App\Models\Product::whereHas('orderItems', function ($query) use ($user) {
            $query->whereHas('order', function($q) use ($user) {
                $q->where('user_id', $user->id)
                  ->where('status', 'completed');
            });
        })->whereDoesntHave('reviews', function($q) use ($user) {
            $q->where('user_id', $user->id);
        })->with('images', 'category')->get();

        return view('profile.reviews', compact('reviews', 'productsToReview'));
    }

    public function storeReview(Request $request, Product $product){
        $request->validate([
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'comment' => ['required', 'string', 'min:10', 'max:2000'],
            'images.*' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:5120'], // 5MB
        ], [
            'rating.required' => 'Musisz wybrać ocenę.',
            'rating.min' => 'Ocena musi wynosić od 1 do 5.',
            'rating.max' => 'Ocena musi wynosić od 1 do 5.',
            'comment.required' => 'Komentarz jest wymagany.',
            'comment.min' => 'Komentarz musi zawierać minimum 10 znaków.',
            'comment.max' => 'Komentarz może zawierać maksymalnie 2000 znaków.',
            'images.*.image' => 'Plik musi być obrazem.',
            'images.*.mimes' => 'Dozwolone formaty: JPEG, JPG, PNG, WEBP.',
            'images.*.max' => 'Rozmiar obrazu nie może przekraczać 5MB.',
        ]);

        $hasPurchased = auth()->user()->orders()
            ->where('status', 'completed')
            ->whereHas('items', fn($q) => $q->where('product_id', $product->id))
            ->exists();

        if (!$hasPurchased) {
            return redirect()->back()->with('error', 'Możesz opiniować tylko zakupione produkty.');
        }

        if(auth()->user()->reviews()->where('product_id', $product->id)->exists()){
            return redirect()->back()->with('error', 'Już dodałeś opinię dla tego produktu.');
        }

        $review = auth()->user()->reviews()->create([
            'product_id' => $product->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        if($request->hasFile('images')){
            $uploadedCount = 0;
            foreach($request->file('images') as $image){
                if($uploadedCount >= 5) break;
                $path = $image->store('review-images', 'public');
                $review->images()->create(['image_path' => $path]);
                $uploadedCount++;
            }
        }

        return redirect()->route('profile.reviews')->with('success', 'Opinia została dodana!');
    }

    public function adminDashboard()
    {
        $usersCount = \App\Models\User::count();
        $ordersCount = \App\Models\Order::count();
        $productsCount = \App\Models\Product::count();
        $reviewsCount = \App\Models\Review::count();

        $orders = \App\Models\Order::with(['user', 'items'])
            ->latest()
            ->paginate(15);

        $reviews = \App\Models\Review::with(['user', 'product', 'images'])
            ->latest()
            ->paginate(10);

        return view('admin.dashboard', compact(
            'usersCount',
            'ordersCount',
            'productsCount',
            'reviewsCount',
            'orders',
            'reviews'
        ));
    }

    public function updateOrderStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:' . implode(',', array_keys(Order::getStatuses()))
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->route('admin.dashboard')->with('success', 'Status zamówienia został zaktualizowany!');
    }

    public function showOrder(Order $order)
    {
        $order->load(['items.product.images', 'user']);
        return view('admin.order-details', compact('order'));
    }

    public function destroyReview(\App\Models\Review $review)
    {
        // Usuń zdjęcia powiązane z opinią
        foreach ($review->images as $image) {
            \Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        $review->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Opinia została usunięta!');
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function shippingDetails()
    {
        $user = auth()->user();
        $shippingAddress = $user->shippingAddress;
        return view('profile.shipping-details', compact('user', 'shippingAddress'));
    }

    public function storeShippingDetails(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'min:2', 'max:255', 'regex:/^[A-ZĄĆĘŁŃÓŚŹŻ][a-ząćęłńóśźż]+$/u'],
            'last_name' => ['required', 'string', 'min:2', 'max:255', 'regex:/^[A-ZĄĆĘŁŃÓŚŹŻ][a-ząćęłńóśźż]+(\-[A-ZĄĆĘŁŃÓŚŹŻ][a-ząćęłńóśźż]+)?$/u'],
            'phone' => ['required', 'regex:/^(\+?48)?[\s\-]?\d{3}[\s\-]?\d{3}[\s\-]?\d{3}$/'],
            'street' => ['required', 'string', 'min:2', 'max:255'],
            'building_number' => ['required', 'string', 'max:10'],
            'apartment_number' => ['nullable', 'string', 'max:10'],
            'postal_code' => ['required', 'regex:/^\d{2}-\d{3}$/'],
            'city' => ['required', 'string', 'min:2', 'max:255', 'regex:/^[A-ZĄĆĘŁŃÓŚŹŻ][a-ząćęłńóśźż]+(\s[A-ZĄĆĘŁŃÓŚŹŻ][a-ząćęłńóśźż]+)*$/u']
        ], [
            'first_name.required' => 'Imię jest wymagane.',
            'first_name.regex' => 'Imię musi zaczynać się wielką literą i zawierać tylko litery.',
            'last_name.required' => 'Nazwisko jest wymagane.',
            'last_name.regex' => 'Nazwisko musi zaczynać się wielką literą. W przypadku nazwisk dwuczłonowych (np. Kowalski-Nowak) każda część musi zaczynać się wielką literą.',
            'phone.required' => 'Numer telefonu jest wymagany.',
            'phone.regex' => 'Podaj prawidłowy numer telefonu (np. 123 456 789).',
            'postal_code.required' => 'Kod pocztowy jest wymagany.',
            'postal_code.regex' => 'Kod pocztowy musi być w formacie XX-XXX.',
            'city.required' => 'Miasto jest wymagane.',
            'city.regex' => 'Nazwa miasta musi zaczynać się wielką literą.',
            'street.required' => 'Ulica jest wymagana.',
            'building_number.required' => 'Numer budynku jest wymagany.'
        ]);

        auth()->user()->shippingAddress()->updateOrCreate(
            ['user_id' => auth()->id()],
            $validated
        );

        return redirect()->route('profile.shipping-details')->with('success', 'Dane zostały zapisane!');
    }

    public function deleteShippingDetails()
    {
        auth()->user()->shippingAddress()->delete();
        return redirect()->route('profile.shipping-details')->with('success', 'Dane zostały usunięte!');
    }

}
