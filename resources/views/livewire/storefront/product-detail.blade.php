<div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        {{-- Product Images --}}
        <div>
            <div class="aspect-square bg-base-200 rounded-lg overflow-hidden">
                @if($product->main_image)
                    <img src="{{ asset('storage/' . $product->main_image) }}"
                         alt="{{ $product->name }}"
                         class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center">
                        <x-icon name="o-photo" class="w-32 h-32 text-gray-400" />
                    </div>
                @endif
            </div>

            @if($product->images->count() > 0)
                <div class="grid grid-cols-4 gap-4 mt-4">
                    @foreach($product->images as $image)
                        <div class="aspect-square bg-base-200 rounded-lg overflow-hidden cursor-pointer">
                            <img src="{{ asset('storage/' . $image->path) }}"
                                 alt="{{ $image->alt_text }}"
                                 class="w-full h-full object-cover">
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        {{-- Product Info --}}
        <div>
            <h1 class="text-4xl font-bold mb-4">{{ $product->name }}</h1>

            <div class="flex items-baseline gap-4 mb-6">
                <span class="text-4xl font-bold text-primary">
                    ${{ number_format($product->price, 2) }}
                </span>
                @if($product->compare_price)
                    <span class="text-2xl text-gray-400 line-through">
                        ${{ number_format($product->compare_price, 2) }}
                    </span>
                @endif
            </div>

            @if($product->categories->count() > 0)
                <div class="flex gap-2 mb-6">
                    @foreach($product->categories as $category)
                        <span class="badge badge-outline">{{ $category->name }}</span>
                    @endforeach
                </div>
            @endif

            <div class="prose max-w-none mb-8">
                <p>{{ $product->description }}</p>
            </div>

            @if($product->track_stock)
                <div class="mb-6">
                    @if($product->stock > 0)
                        <span class="badge badge-success">In Stock ({{ $product->stock }} available)</span>
                    @else
                        <span class="badge badge-error">Out of Stock</span>
                    @endif
                </div>
            @endif

            {{-- Variants --}}
            @if($product->variants->count() > 0)
                <div class="mb-6">
                    <label class="label">
                        <span class="label-text font-semibold">Select Option</span>
                    </label>
                    <select wire:model="selectedVariant" class="select select-bordered w-full max-w-xs">
                        <option value="">Choose an option</option>
                        @foreach($product->variants as $variant)
                            <option value="{{ $variant->id }}">
                                {{ $variant->name }} - ${{ number_format($variant->price, 2) }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif

            {{-- Quantity --}}
            <div class="mb-8">
                <label class="label">
                    <span class="label-text font-semibold">Quantity</span>
                </label>
                <div class="flex items-center gap-4">
                    <button wire:click="decrementQuantity" class="btn btn-circle btn-sm">
                        <x-icon name="o-minus" class="w-4 h-4" />
                    </button>
                    <span class="text-2xl font-semibold w-12 text-center">{{ $quantity }}</span>
                    <button wire:click="incrementQuantity" class="btn btn-circle btn-sm">
                        <x-icon name="o-plus" class="w-4 h-4" />
                    </button>
                </div>
            </div>

            {{-- Add to Cart --}}
            <div class="flex gap-4">
                <button
                    wire:click="addToCart"
                    @if(!$product->isInStock()) disabled @endif
                    class="btn btn-primary btn-lg flex-1">
                    <x-icon name="o-shopping-cart" class="w-5 h-5" />
                    Add to Cart
                </button>
            </div>

            @if($product->sku)
                <div class="mt-6 text-sm text-gray-600">
                    SKU: {{ $product->sku }}
                </div>
            @endif
        </div>
    </div>
</div>
