<div>
    <div class="mb-6">
        <h1 class="text-3xl font-bold">Add New Product</h1>
        <p class="text-gray-600">Create a new product for your store</p>
    </div>

    <form wire:submit="save">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Main Content --}}
            <div class="lg:col-span-2 space-y-6">
                <x-card title="Basic Information">
                    <x-input
                        label="Product Name"
                        wire:model="name"
                        placeholder="Enter product name"
                        required
                    />

                    <x-textarea
                        label="Description"
                        wire:model="description"
                        placeholder="Enter product description"
                        rows="5"
                    />

                    <div class="grid grid-cols-2 gap-4">
                        <x-input
                            label="SKU"
                            wire:model="sku"
                            placeholder="SKU-001"
                            hint="Stock Keeping Unit"
                        />
                    </div>
                </x-card>

                <x-card title="Pricing">
                    <div class="grid grid-cols-2 gap-4">
                        <x-input
                            label="Price"
                            wire:model="price"
                            type="number"
                            step="0.01"
                            prefix="$"
                            required
                        />

                        <x-input
                            label="Compare Price"
                            wire:model="compare_price"
                            type="number"
                            step="0.01"
                            prefix="$"
                            hint="Original price before discount"
                        />
                    </div>
                </x-card>

                <x-card title="Inventory">
                    <x-input
                        label="Stock Quantity"
                        wire:model="stock"
                        type="number"
                        required
                    />

                    <x-checkbox
                        label="Track inventory"
                        wire:model="track_stock"
                        hint="Enable stock tracking for this product"
                    />
                </x-card>

                <x-card title="Product Image">
                    <x-file
                        label="Main Image"
                        wire:model="image"
                        accept="image/*"
                        hint="Upload product image (max 2MB)"
                    />

                    @if ($image)
                        <div class="mt-4">
                            <img src="{{ $image->temporaryUrl() }}" class="w-32 h-32 object-cover rounded">
                        </div>
                    @endif
                </x-card>
            </div>

            {{-- Sidebar --}}
            <div class="space-y-6">
                <x-card title="Status">
                    <x-checkbox
                        label="Active"
                        wire:model="is_active"
                        hint="Product visible to customers"
                    />

                    <x-checkbox
                        label="Featured"
                        wire:model="is_featured"
                        hint="Show on homepage"
                    />
                </x-card>

                <x-card title="Categories">
                    @if($categories->count() > 0)
                        <div class="space-y-2">
                            @foreach($categories as $category)
                                <x-checkbox
                                    :label="$category->name"
                                    :value="$category->id"
                                    wire:model="selected_categories"
                                />
                            @endforeach
                        </div>
                    @else
                        <p class="text-sm text-gray-600">No categories available.
                            <a href="{{ route('shop.categories.index') }}" class="link link-primary">
                                Create one
                            </a>
                        </p>
                    @endif
                </x-card>

                <x-card>
                    <div class="space-y-3">
                        <x-button
                            label="Create Product"
                            type="submit"
                            class="btn-primary w-full"
                            spinner="save"
                        />

                        <a href="{{ route('shop.products.index') }}" class="btn btn-ghost w-full">
                            Cancel
                        </a>
                    </div>
                </x-card>
            </div>
        </div>
    </form>
</div>
