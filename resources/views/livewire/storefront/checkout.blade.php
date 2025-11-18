<div>
    <h1 class="text-4xl font-bold mb-8">Checkout</h1>

    <form wire:submit="placeOrder">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Checkout Form --}}
            <div class="lg:col-span-2 space-y-6">
                <x-card title="Contact Information">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <x-input
                            label="Full Name"
                            wire:model="name"
                            placeholder="John Doe"
                            required
                        />

                        <x-input
                            label="Email"
                            wire:model="email"
                            type="email"
                            placeholder="john@example.com"
                            required
                        />
                    </div>

                    <x-input
                        label="Phone"
                        wire:model="phone"
                        placeholder="+1 234 567 8900"
                    />
                </x-card>

                <x-card title="Shipping Address">
                    <x-input
                        label="Address"
                        wire:model="address"
                        placeholder="123 Main St, Apt 4"
                        required
                    />

                    <div class="grid grid-cols-2 gap-4">
                        <x-input
                            label="City"
                            wire:model="city"
                            placeholder="New York"
                            required
                        />

                        <x-input
                            label="State/Province"
                            wire:model="state"
                            placeholder="NY"
                        />
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <x-input
                            label="Country"
                            wire:model="country"
                            placeholder="United States"
                            required
                        />

                        <x-input
                            label="Postal Code"
                            wire:model="postal_code"
                            placeholder="10001"
                            required
                        />
                    </div>
                </x-card>

                <x-card title="Order Notes (Optional)">
                    <x-textarea
                        wire:model="notes"
                        placeholder="Any special instructions for your order..."
                        rows="3"
                    />
                </x-card>
            </div>

            {{-- Order Summary --}}
            <div>
                <div class="card bg-base-100 shadow sticky top-4">
                    <div class="card-body">
                        <h2 class="card-title">Order Summary</h2>

                        <div class="divider"></div>

                        {{-- Order Items --}}
                        <div class="space-y-3 max-h-64 overflow-y-auto">
                            @foreach($cart->items as $item)
                                <div class="flex justify-between text-sm" wire:key="checkout-item-{{ $item->id }}">
                                    <div class="flex-1">
                                        <p class="font-medium">{{ $item->product->name }}</p>
                                        @if($item->variant)
                                            <p class="text-gray-600 text-xs">{{ $item->variant->name }}</p>
                                        @endif
                                        <p class="text-gray-600">Qty: {{ $item->quantity }}</p>
                                    </div>
                                    <span class="font-semibold">
                                        ${{ number_format($item->subtotal, 2) }}
                                    </span>
                                </div>
                            @endforeach
                        </div>

                        <div class="divider"></div>

                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span>Subtotal</span>
                                <span>${{ number_format($cart->total, 2) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Shipping</span>
                                <span>Free</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Tax</span>
                                <span>$0.00</span>
                            </div>
                        </div>

                        <div class="divider"></div>

                        <div class="flex justify-between text-xl font-bold">
                            <span>Total</span>
                            <span class="text-primary">${{ number_format($cart->total, 2) }}</span>
                        </div>

                        <div class="alert alert-info text-sm mt-4">
                            <x-icon name="o-information-circle" class="w-5 h-5" />
                            <span>Payment: Cash on Delivery</span>
                        </div>

                        <x-button
                            label="Place Order"
                            type="submit"
                            class="btn-primary btn-block mt-4"
                            spinner="placeOrder"
                        />

                        <a href="{{ route('cart') }}" class="btn btn-ghost btn-block">
                            Back to Cart
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
