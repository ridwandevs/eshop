<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Str;

class CartService
{
    protected $cart;

    public function __construct()
    {
        $this->cart = $this->getOrCreateCart();
    }

    protected function getOrCreateCart()
    {
        $sessionId = session()->getId();

        if (!session()->has('cart_session_id')) {
            session()->put('cart_session_id', Str::random(40));
            $sessionId = session('cart_session_id');
        } else {
            $sessionId = session('cart_session_id');
        }

        return Cart::firstOrCreate(['session_id' => $sessionId]);
    }

    public function add($productId, $quantity = 1, $variantId = null)
    {
        $product = Product::findOrFail($productId);

        $existingItem = $this->cart->items()
            ->where('product_id', $productId)
            ->where('variant_id', $variantId)
            ->first();

        if ($existingItem) {
            $existingItem->quantity += $quantity;
            $existingItem->save();
        } else {
            $this->cart->items()->create([
                'product_id' => $productId,
                'variant_id' => $variantId,
                'quantity' => $quantity,
                'price' => $product->price,
            ]);
        }

        return $this->cart->fresh();
    }

    public function update($itemId, $quantity)
    {
        $item = CartItem::findOrFail($itemId);

        if ($quantity <= 0) {
            $item->delete();
        } else {
            $item->update(['quantity' => $quantity]);
        }

        return $this->cart->fresh();
    }

    public function remove($itemId)
    {
        CartItem::findOrFail($itemId)->delete();
        return $this->cart->fresh();
    }

    public function clear()
    {
        $this->cart->items()->delete();
        return $this->cart->fresh();
    }

    public function getCart()
    {
        return $this->cart->load('items.product', 'items.variant');
    }

    public function getTotal()
    {
        return $this->cart->total;
    }

    public function getItemsCount()
    {
        return $this->cart->items_count;
    }
}
