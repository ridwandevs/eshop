<?php

namespace App\Livewire\Storefront;

use App\Models\Product;
use App\Services\CartService;
use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Traits\Toast;

#[Layout('layouts.storefront')]
class ProductDetail extends Component
{
    use Toast;

    public Product $product;
    public $quantity = 1;
    public $selectedVariant = null;

    public function mount($slug)
    {
        $this->product = Product::where('slug', $slug)
            ->with(['images', 'variants', 'categories'])
            ->firstOrFail();
    }

    public function addToCart()
    {
        $cartService = app(CartService::class);
        $cartService->add($this->product->id, $this->quantity, $this->selectedVariant);

        $this->dispatch('cart-updated');
        $this->success('Product added to cart!');
    }

    public function incrementQuantity()
    {
        $this->quantity++;
    }

    public function decrementQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function render()
    {
        return view('livewire.storefront.product-detail');
    }
}
