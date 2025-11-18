<div class="max-w-2xl mx-auto">
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <h1 class="card-title text-3xl mb-6">Register Your Store</h1>

            <form wire:submit="register">
                <!-- Store Information -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold mb-4">Store Information</h2>

                    <x-input
                        label="Store Name"
                        wire:model.live="store_name"
                        placeholder="My Awesome Store"
                        hint="This will be displayed to your customers"
                        required
                    />

                    <div class="mt-4">
                        <x-input
                            label="Subdomain"
                            wire:model.live.debounce.500ms="subdomain"
                            placeholder="my-store"
                            hint="Your store will be available at: {{ $subdomain }}.{{ str_replace(['http://', 'https://'], '', config('app.url')) }}"
                            required
                        >
                            <x-slot:prefix>
                                <span class="text-gray-500">https://</span>
                            </x-slot:prefix>
                            <x-slot:suffix>
                                <span class="text-gray-500">.{{ str_replace(['http://', 'https://'], '', config('app.url')) }}</span>
                            </x-slot:suffix>
                        </x-input>

                        @if($subdomain_available === true)
                            <div class="alert alert-success mt-2">
                                <x-icon name="o-check-circle" class="w-5 h-5" />
                                <span>Subdomain is available!</span>
                            </div>
                        @elseif($subdomain_available === false)
                            <div class="alert alert-error mt-2">
                                <x-icon name="o-x-circle" class="w-5 h-5" />
                                <span>Subdomain is already taken</span>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="divider"></div>

                <!-- Owner Information -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold mb-4">Owner Information</h2>

                    <x-input
                        label="Your Name"
                        wire:model="owner_name"
                        placeholder="John Doe"
                        required
                    />

                    <x-input
                        label="Email"
                        wire:model="email"
                        type="email"
                        placeholder="john@example.com"
                        hint="You'll use this to login"
                        required
                    />

                    <x-input
                        label="Password"
                        wire:model="password"
                        type="password"
                        placeholder="••••••••"
                        required
                    />

                    <x-input
                        label="Confirm Password"
                        wire:model="password_confirmation"
                        type="password"
                        placeholder="••••••••"
                        required
                    />
                </div>

                <div class="divider"></div>

                <div class="card-actions justify-end">
                    <a href="{{ route('landing') }}" class="btn btn-ghost">Cancel</a>
                    <x-button
                        label="Create My Store"
                        type="submit"
                        class="btn-primary"
                        spinner="register"
                    />
                </div>
            </form>

            <div class="text-center mt-4">
                <p class="text-sm">
                    Already have an account?
                    <a href="{{ route('login') }}" class="link link-primary">Login here</a>
                </p>
            </div>
        </div>
    </div>
</div>
