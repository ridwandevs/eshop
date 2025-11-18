<div>
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold">Products</h1>
            <p class="text-gray-600">Manage your product catalog</p>
        </div>
        <a href="{{ route('shop.products.create') }}" class="btn btn-primary">
            <x-icon name="o-plus" class="w-5 h-5" />
            Add Product
        </a>
    </div>

    {{-- Filters --}}
    <x-card class="mb-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <x-input
                wire:model.live="search"
                placeholder="Search products..."
                icon="o-magnifying-glass"
            />
            <x-select
                wire:model.live="status"
                :options="[
                    ['id' => '', 'name' => 'All Status'],
                    ['id' => 'active', 'name' => 'Active'],
                    ['id' => 'inactive', 'name' => 'Inactive']
                ]"
                option-value="id"
                option-label="name"
            />
        </div>
    </x-card>

    {{-- Products Table --}}
    <x-card>
        @if($products->count() > 0)
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>SKU</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr wire:key="product-{{ $product->id }}">
                                <td>
                                    @if($product->main_image)
                                        <img src="{{ asset('storage/' . $product->main_image) }}"
                                             class="w-12 h-12 object-cover rounded"
                                             alt="{{ $product->name }}">
                                    @else
                                        <div class="w-12 h-12 bg-base-300 rounded flex items-center justify-center">
                                            <x-icon name="o-photo" class="w-6 h-6 text-gray-400" />
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="font-medium">{{ $product->name }}</div>
                                    <div class="text-sm text-gray-500">{{ Str::limit($product->description, 50) }}</div>
                                </td>
                                <td>{{ $product->sku ?? '-' }}</td>
                                <td>${{ number_format($product->price, 2) }}</td>
                                <td>
                                    <span class="badge {{ $product->stock > 0 ? 'badge-success' : 'badge-error' }}">
                                        {{ $product->stock }}
                                    </span>
                                </td>
                                <td>
                                    <x-toggle
                                        wire:click="toggleActive({{ $product->id }})"
                                        :checked="$product->is_active"
                                        class="toggle-sm"
                                    />
                                </td>
                                <td>
                                    <div class="flex gap-2">
                                        <a href="{{ route('shop.products.edit', $product) }}"
                                           class="btn btn-sm btn-ghost">
                                            <x-icon name="o-pencil" class="w-4 h-4" />
                                        </a>
                                        <button
                                            wire:click="delete({{ $product->id }})"
                                            wire:confirm="Are you sure you want to delete this product?"
                                            class="btn btn-sm btn-ghost text-error">
                                            <x-icon name="o-trash" class="w-4 h-4" />
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $products->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <x-icon name="o-cube" class="w-16 h-16 text-gray-400 mx-auto mb-4" />
                <h3 class="text-lg font-medium mb-2">No products found</h3>
                <p class="text-gray-600 mb-4">Get started by creating your first product</p>
                <a href="{{ route('shop.products.create') }}" class="btn btn-primary">
                    Add Product
                </a>
            </div>
        @endif
    </x-card>
</div>
