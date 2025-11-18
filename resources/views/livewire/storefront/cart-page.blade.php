<div>
    <h1 class="text-4xl font-bold mb-8">Shopping Cart</h1>

    @if($cart->items->count() > 0)
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Cart Items --}}
            <div class="lg:col-span-2 space-y-4">
                @foreach($cart->items as $item)
                    <div class="card bg-base-100 shadow" wire:key="cart-item-{{ $item->id }}">
                        <div class="card-body">
                            <div class="flex gap-4">
                                <div class="w-24 h-24 bg-base-200 rounded-lg overflow-hidden flex-shrink-0">
                                    @if($item->product->main_image)
                                        <img src="{{ asset('storage/' . $item->product->main_image) }}"
                                             alt="{{ $item->product->name }}"
                                             class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <x-icon name="o-photo" class="w-8 h-8 text-gray-400" />
                                        </div>
                                    @endif
                                </div>

                                <div class="flex-1">
                                    <h3 class="font-semibold text-lg">{{ $item->product->name }}</h3>
                                    @if($item->variant)
                                        <p class="text-sm text-gray-600">{{ $item->variant->name }}</p>
                                    @endif
                                    <p class="text-primary font-bold mt-2">
                                        ${{ number_format($item->price, 2) }}
                                    </p>
                                </div>

                                <div class="flex flex-col items-end justify-between">
                                    <button
                                        wire:click="removeItem({{ $item->id }})"
                                        wire:confirm="Remove this item from cart?"
                                        class="btn btn-ghost btn-sm btn-circle">
                                        <x-icon name="o-trash" class="w-4 h-4" />
                                    </button>

                                    <div class="flex items-center gap-2">
                                        <button
                                            wire:click="updateQuantity({{ $item->id }}, {{ $item->quantity - 1 }})"
                                            class="btn btn-circle btn-sm">
                                            <x-icon name="o-minus" class="w-4 h-4" />
                                        </button>
                                        <span class="w-12 text-center font-semibold">{{ $item->quantity }}</span>
                                        <button
                                            wire:click="updateQuantity({{ $item->id }}, {{ $item->quantity + 1 }})"
                                            class="btn btn-circle btn-sm">
                                            <x-icon name="o-plus" class="w-4 h-4" />
                                        </button>
                                    </div>

                                    <p class="font-bold">
                                        ${{ number_format($item->subtotal, 2) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <button
                    wire:click="clearCart"
                    wire:confirm="Are you sure you want to clear the cart?"
                    class="btn btn-ghost btn-sm">
                    Clear Cart
                </button>
            </div>

            {{-- Order Summary --}}
            <div>
                <div class="card bg-base-100 shadow sticky top-4">
                    <div class="card-body">
                        <h2 class="card-title">Order Summary</h2>

                        <div class="divider"></div>

                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span>Subtotal</span>
                                <span>${{ number_format($cart->total, 2) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Shipping</span>
                                <span>Calculated at checkout</span>
                            </div>
                        </div>

                        <div class="divider"></div>

                        <div class="flex justify-between text-xl font-bold">
                            <span>Total</span>
                            <span class="text-primary">${{ number_format($cart->total, 2) }}</span>
                        </div>

                        <a href="{{ route('checkout') }}" class="btn btn-primary btn-block mt-4">
                            Proceed to Checkout
                        </a>

                        <a href="{{ route('products.index') }}" class="btn btn-ghost btn-block">
                            Continue Shopping
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-20">
            <x-icon name="o-shopping-cart" class="w-24 h-24 text-gray-400 mx-auto mb-4" />
            <h2 class="text-2xl font-semibold mb-2">Your cart is empty</h2>
            <p class="text-gray-600 mb-6">Add some products to get started</p>
            <a href="{{ route('products.index') }}" class="btn btn-primary">
                Browse Products
            </a>
        </div>
    @endif
</div>
