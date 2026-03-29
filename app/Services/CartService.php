<?php

namespace App\Services;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartService
{
    protected function getIdentifier()
    {
        if (auth()->check()) {
            return ['user_id' => auth()->id()];
        }

        if (!Session::has('cart_session_id')) {
            Session::put('cart_session_id', Session::getId());
        }

        return ['session_id' => Session::get('cart_session_id')];
    }

    public function getItems()
    {
        return CartItem::where($this->getIdentifier())
            ->with('product.images')
            ->get();
    }

    public function addItem($productId, $quantity = 1)
    {
        $product = Product::findOrFail($productId);

        $identifier = $this->getIdentifier();
        $cartItem = CartItem::where($identifier)
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity', $quantity);
        } else {
            $cartItem = CartItem::create(array_merge($identifier, [
                'product_id' => $productId,
                'quantity' => $quantity
            ]));
        }

        return $cartItem;
    }

    public function updateQuantity($cartItemId, $quantity)
    {
        $cartItem = CartItem::where($this->getIdentifier())
            ->where('id', $cartItemId)
            ->firstOrFail();

        if ($quantity <= 0) {
            $cartItem->delete();
        } else {
            $cartItem->update(['quantity' => $quantity]);
        }
    }

    public function removeItem($cartItemId)
    {
        CartItem::where($this->getIdentifier())
            ->where('id', $cartItemId)
            ->delete();
    }

    public function clear()
    {
        CartItem::where($this->getIdentifier())->delete();
    }

    public function getTotal()
    {
        return $this->getItems()->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
    }

    public function getCount()
    {
        return $this->getItems()->sum('quantity');
    }

    public function mergeGuestCart()
    {
        if (!auth()->check()) return;

        $sessionId = Session::get('cart_session_id');
        if (!$sessionId) return;

        $guestItems = CartItem::where('session_id', $sessionId)->get();

        foreach ($guestItems as $guestItem) {
            $userItem = CartItem::where('user_id', auth()->id())
                ->where('product_id', $guestItem->product_id)
                ->first();

            if ($userItem) {
                $userItem->increment('quantity', $guestItem->quantity);
                $guestItem->delete();
            } else {
                $guestItem->update([
                    'user_id' => auth()->id(),
                    'session_id' => null
                ]);
            }
        }

        Session::forget('cart_session_id');
    }
}
