<?php

namespace App\Livewire\Storefront;

use App\Services\CartService;
use Livewire\Component;
use Livewire\Attributes\On;

class CartCounter extends Component
{
    public $count = 0;

    public function mount()
    {
        $this->updateCount();
    }

    #[On('cart-updated')]
    public function updateCount()
    {
        $cart = app(CartService::class)->getCart();
        $this->count = $cart->items_count;
    }

    public function render()
    {
        return view('livewire.storefront.cart-counter');
    }
}
