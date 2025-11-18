<?php

namespace App\Livewire\Shop\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use App\Traits\Toast;

#[Layout('layouts.shop')]
class Index extends Component
{
    use WithPagination, Toast;

    public string $search = '';
    public string $status = '';

    public function delete($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            $this->success('Product deleted successfully');
        }
    }

    public function toggleActive($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->is_active = !$product->is_active;
            $product->save();
            $this->success('Product status updated');
        }
    }

    public function render()
    {
        $products = Product::query()
            ->when($this->search, fn($q) => $q->where('name', 'like', "%{$this->search}%")
                ->orWhere('sku', 'like', "%{$this->search}%"))
            ->when($this->status === 'active', fn($q) => $q->where('is_active', true))
            ->when($this->status === 'inactive', fn($q) => $q->where('is_active', false))
            ->latest()
            ->paginate(10);

        return view('livewire.shop.products.index', compact('products'));
    }
}
