<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function process(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'first_name' => ['required', 'string', 'min:2', 'max:255', 'regex:/^[A-ZĄĆĘŁŃÓŚŹŻ][a-ząćęłńóśźż]+$/u'],
            'last_name' => ['required', 'string', 'min:2', 'max:255', 'regex:/^[A-ZĄĆĘŁŃÓŚŹŻ][a-ząćęłńóśźż]+(\-[A-ZĄĆĘŁŃÓŚŹŻ][a-ząćęłńóśźż]+)?$/u'],
            'phone' => ['required', 'regex:/^(\+?48)?[\s\-]?\d{3}[\s\-]?\d{3}[\s\-]?\d{3}$/'],
            'street' => ['required', 'string', 'min:2', 'max:255'],
            'building_number' => ['required', 'string', 'max:10'],
            'apartment_number' => ['nullable', 'string', 'max:10'],
            'postal_code' => ['required', 'regex:/^\d{2}-\d{3}$/'],
            'city' => ['required', 'string', 'min:2', 'max:255', 'regex:/^[A-ZĄĆĘŁŃÓŚŹŻ][a-ząćęłńóśźż]+(\s[A-ZĄĆĘŁŃÓŚŹŻ][a-ząćęłńóśźż]+)*$/u'],
            'save_address' => ['nullable', 'boolean']
        ], [
            'email.required' => 'Email jest wymagany.',
            'email.email' => 'Podaj prawidłowy adres email.',
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

        $items = $this->cartService->getItems();

        if ($items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Koszyk jest pusty');
        }

        DB::beginTransaction();

        try {
            $shippingCost = 10.00;
            $subtotal = $items->sum(fn($item) => $item->product->price * $item->quantity);
            $total = $subtotal + $shippingCost;

            $order = Order::create([
                'user_id' => auth()->id(),
                'guest_email' => auth()->check() ? null : $validated['email'],
                'order_number' => 'ORD-' . strtoupper(uniqid()),
                'total_amount' => $total,
                'status' => Order::STATUS_PENDING,
                'phone' => $validated['phone'],
                'shipping_first_name' => $validated['first_name'],
                'shipping_last_name' => $validated['last_name'],
                'shipping_street' => $validated['street'],
                'shipping_building_number' => $validated['building_number'],
                'shipping_apartment_number' => $validated['apartment_number'],
                'shipping_postal_code' => $validated['postal_code'],
                'shipping_city' => $validated['city']
            ]);

            foreach ($items as $item) {
                $order->items()->create([
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price
                ]);
            }

            // zapis jak zaznaczone
            if (auth()->check() && $request->has('save_address')) {
                auth()->user()->shippingAddress()->updateOrCreate(
                    ['user_id' => auth()->id()],
                    [
                        'first_name' => $validated['first_name'],
                        'last_name' => $validated['last_name'],
                        'phone' => $validated['phone'],
                        'street' => $validated['street'],
                        'building_number' => $validated['building_number'],
                        'apartment_number' => $validated['apartment_number'],
                        'postal_code' => $validated['postal_code'],
                        'city' => $validated['city']
                    ]
                );
            }

            $this->cartService->clear();

            if (!auth()->check()){
                session()->put('guest_order_'.$order->id,true);
            }

            DB::commit();

            return redirect()->route('order.confirmation', $order->id);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('cart.index')->with('error', 'Wystąpił błąd podczas przetwarzania zamówienia');
        }
    }

    public function confirmation(Order $order)
    {
        if (auth()->check() && $order->user_id !== auth()->id()) {
            abort(403);
        }

        if (!auth()->check() && !session()->has('guest_order_' . $order->id)) {
            abort(403);
        }

        return view('checkout.confirmation', compact('order'));
    }
}
