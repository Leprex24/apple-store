<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

//    public function index()
//    {
//        $cartItems = $this->cartService->getItems();
//        $total = $this->cartService->getTotal();
//        $shippingAddress = auth()->user()->shippingAddress ?? null;
//
//        return view('cart.index', compact('cartItems', 'total', 'shippingAddress'));
//    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1'
        ]);

        $this->cartService->addItem(
            $request->product_id,
            $request->quantity ?? 1
        );

        return response()->json([
            'success' => true,
            'message' => 'Produkt dodany do koszyka',
            'cartCount' => $this->cartService->getCount()
        ]);
    }


    public function update(Request $request, $cartItemId)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $this->cartService->updateQuantity($cartItemId, $validated['quantity']);

        return response()->json([
            'success' => true,
            'cartCount' => $this->cartService->getCount()
        ]);
    }

    public function index()
    {
        $items = $this->cartService->getItems();
        $subtotal = $items->sum(fn($item) => $item->product->price * $item->quantity);

        $shippingAddress = auth()->check()
            ? auth()->user()->shippingAddress
            : null;

        return view('cart.index', compact('items', 'subtotal', 'shippingAddress'));
    }



    public function remove($cartItemId)
    {
        $this->cartService->removeItem($cartItemId);

        return response()->json([
            'success' => true,
            'cartCount' => $this->cartService->getCount()
        ]);
    }

    public function count()
    {
        return response()->json([
            'count' => $this->cartService->getCount()
        ]);
    }
}
