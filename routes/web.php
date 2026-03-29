<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/o-nas', function () {
    return view('about');
})->name('about');

Route::get('/sklep/polecane', [ProductController::class, 'featured'])->name('shop.featured');

Route::get('/kategoria/{category:slug}', [CategoryController::class, 'show'])->name('category');

Route::get('/produkt/{product:slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/koszyk', [CartController::class, 'index'])->name('cart.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profil', [ProfileController::class, 'dashboard'])->name('profile.dashboard');
    Route::get('/profil/zamowienia', [ProfileController::class, 'orders'])->name('profile.orders');
    Route::get('/profil/zamowienie/{order}', [ProfileController::class, 'orderDetails'])->name('profile.order.details');
    Route::get('/profil/opinie', [ProfileController::class, 'reviews'])->name('profile.reviews');
    Route::get('/profil/dane-do-zamowienia', [ProfileController::class, 'shippingDetails'])->name('profile.shipping-details');
});


Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [ProfileController::class, 'adminDashboard'])->name('dashboard');
    Route::patch('/zamowienia/{order}/status', [ProfileController::class, 'updateOrderStatus'])->name('orders.update-status');
    Route::get('/zamowienia/{order}', [ProfileController::class, 'showOrder'])->name('orders.show');
    Route::delete('/opinie/{review}', [ProfileController::class, 'destroyReview'])->name('reviews.destroy');
});


Route::post('profil/opinie/{product}', [ProfileController::class, 'storeReview'])->name('profile.review.store');

Route::post('/profil/dane-do-zamowienia', [ProfileController::class, 'storeShippingDetails'])->name('profile.shipping-details.store');
Route::delete('/profil/dane-do-zamowienia', [ProfileController::class, 'deleteShippingDetails'])->name('profile.shipping-details.delete');

Route::post('/opinie/{review}/reakcja', [ProductController::class, 'reactToReview'])->name('reviews.react')->middleware('auth');

Route::get('/koszyk', [CartController::class, 'index'])->name('cart.index');
Route::post('/koszyk/dodaj', [CartController::class, 'add'])->name('cart.add');
Route::patch('/koszyk/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/koszyk/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/koszyk/licznik', [CartController::class, 'count'])->name('cart.count');
Route::patch('/koszyk/aktualizuj/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/koszyk/usun/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');
Route::patch('/koszyk/aktualizuj/{cartItem}', [CartController::class, 'update'])->name('cart.update');


Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/zamowienie/{order}/potwierdzenie', [CheckoutController::class, 'confirmation'])->name('order.confirmation');


require __DIR__.'/auth.php';
