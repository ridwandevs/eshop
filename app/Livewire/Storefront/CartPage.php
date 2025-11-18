<?php

namespace App\Livewire\Storefront;

use App\Services\CartService;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;
use App\Traits\Toast;

#[Layout('layouts.storefront')]
#[Title('Shopping Cart')]
class CartPage extends Component
{
    use Toast;

    public $cart;

    public function mount()
    {
        $this->loadCart();
    }

    #[On('cart-updated')]
    public function loadCart()
    {
        $cartService = app(CartService::class);
        $this->cart = $cartService->getCart();
    }

    public function updateQuantity($itemId, $quantity)
    {
        $cartService = app(CartService::class);
        $cartService->update($itemId, $quantity);

        $this->loadCart();
        $this->dispatch('cart-updated');
        $this->success('Cart updated');
    }

    public function removeItem($itemId)
    {
        $cartService = app(CartService::class);
        $cartService->remove($itemId);

        $this->loadCart();
        $this->dispatch('cart-updated');
        $this->success('Item removed from cart');
    }

    public function clearCart()
    {
        $cartService = app(CartService::class);
        $cartService->clear();

        $this->loadCart();
        $this->dispatch('cart-updated');
        $this->success('Cart cleared');
    }

    public function render()
    {
        return view('livewire.storefront.cart-page');
    }
}
