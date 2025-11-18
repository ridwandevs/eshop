<?php

namespace App\Livewire\Shop\Products;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Mary\Traits\Toast;

#[Layout('layouts.shop')]
class Create extends Component
{
    use WithFileUploads, Toast;

    #[Validate('required|min:3')]
    public $name = '';

    #[Validate('nullable')]
    public $description = '';

    #[Validate('required|numeric|min:0')]
    public $price = '';

    #[Validate('nullable|numeric|min:0')]
    public $compare_price = '';

    #[Validate('nullable')]
    public $sku = '';

    #[Validate('required|integer|min:0')]
    public $stock = 0;

    #[Validate('boolean')]
    public $track_stock = true;

    #[Validate('boolean')]
    public $is_active = true;

    #[Validate('boolean')]
    public $is_featured = false;

    #[Validate('nullable|image|max:2048')]
    public $image;

    public $selected_categories = [];

    public function save()
    {
        $this->validate();

        $product = Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'compare_price' => $this->compare_price,
            'sku' => $this->sku,
            'stock' => $this->stock,
            'track_stock' => $this->track_stock,
            'is_active' => $this->is_active,
            'is_featured' => $this->is_featured,
        ]);

        if ($this->image) {
            $path = $this->image->store('products', 'public');
            $product->update(['main_image' => $path]);
        }

        if (!empty($this->selected_categories)) {
            $product->categories()->attach($this->selected_categories);
        }

        $this->success('Product created successfully');

        return redirect()->route('shop.products.index');
    }

    public function render()
    {
        $categories = Category::active()->get();

        return view('livewire.shop.products.create', compact('categories'));
    }
}
