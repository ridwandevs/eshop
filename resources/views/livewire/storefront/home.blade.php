<div>
    {{-- Hero Section --}}
    <div class="hero bg-base-200 rounded-lg py-20 mb-12">
        <div class="hero-content text-center">
            <div class="max-w-md">
                <h1 class="text-5xl font-bold mb-6">Welcome to Our Shop</h1>
                <p class="text-lg mb-8">Discover amazing products at great prices</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">
                    Shop Now
                </a>
            </div>
        </div>
    </div>

    {{-- Categories --}}
    @if($categories->count() > 0)
        <div class="mb-12">
            <h2 class="text-3xl font-bold mb-6">Shop by Category</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                @foreach($categories as $category)
                    <a href="{{ route('category.show', $category->slug) }}"
                       class="card bg-base-200 hover:shadow-lg transition">
                        <div class="card-body items-center text-center p-6">
                            @if($category->image)
                                <img src="{{ asset('storage/' . $category->image) }}"
                                     class="w-16 h-16 object-cover rounded-full mb-2"
                                     alt="{{ $category->name }}">
                            @else
                                <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mb-2">
                                    <x-icon name="o-tag" class="w-8 h-8 text-primary" />
                                </div>
                            @endif
                            <h3 class="font-semibold">{{ $category->name }}</h3>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

    {{-- Featured Products --}}
    <div>
        <h2 class="text-3xl font-bold mb-6">Featured Products</h2>
        @if($featuredProducts->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($featuredProducts as $product)
                    <div class="card bg-base-100 shadow-lg hover:shadow-xl transition">
                        <figure class="aspect-square">
                            @if($product->main_image)
                                <img src="{{ asset('storage/' . $product->main_image) }}"
                                     alt="{{ $product->name }}"
                                     class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-base-300 flex items-center justify-center">
                                    <x-icon name="o-photo" class="w-16 h-16 text-gray-400" />
                                </div>
                            @endif
                        </figure>
                        <div class="card-body">
                            <h3 class="card-title text-lg">{{ $product->name }}</h3>
                            <p class="text-sm text-gray-600">{{ Str::limit($product->description, 60) }}</p>
                            <div class="card-actions justify-between items-center mt-4">
                                <span class="text-2xl font-bold text-primary">
                                    ${{ number_format($product->price, 2) }}
                                </span>
                                <a href="{{ route('products.show', $product->slug) }}"
                                   class="btn btn-primary btn-sm">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12 bg-base-200 rounded-lg">
                <p class="text-gray-600">No featured products available yet.</p>
            </div>
        @endif
    </div>
</div>
