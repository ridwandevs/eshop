<?php

namespace App\Livewire\Storefront;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.storefront')]
#[Title('Home')]
class Home extends Component
{
    public function render()
    {
        $featuredProducts = Product::active()->featured()->take(8)->get();
        $categories = Category::active()->roots()->take(6)->get();

        return view('livewire.storefront.home', compact('featuredProducts', 'categories'));
    }
}
