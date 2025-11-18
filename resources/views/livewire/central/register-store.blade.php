<div class="max-w-2xl mx-auto px-4 py-12">
    <div class="bg-white rounded-lg border border-slate-200 shadow-sm p-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900 mb-2">Register Your Store</h1>
            <p class="text-slate-600">Get started with your online store in just a few minutes</p>
        </div>

        <form wire:submit="register" class="space-y-8">
            <!-- Store Information -->
            <div class="space-y-4">
                <h2 class="text-xl font-semibold text-slate-900 border-b border-slate-200 pb-2">Store Information</h2>

                <div>
                    <x-ui.label for="store_name" value="Store Name" required />
                    <x-ui.input
                        wire:model.live="store_name"
                        id="store_name"
                        class="mt-1"
                        placeholder="My Awesome Store"
                        required
                    />
                    <p class="mt-1 text-sm text-slate-500">This will be displayed to your customers</p>
                    @error('store_name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <x-ui.label for="subdomain" value="Subdomain" required />
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-slate-200 bg-slate-50 text-slate-500 text-sm">
                            https://
                        </span>
                        <x-ui.input
                            wire:model.live.debounce.500ms="subdomain"
                            id="subdomain"
                            class="rounded-l-none"
                            placeholder="my-store"
                            required
                        />
                        <span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-slate-200 bg-slate-50 text-slate-500 text-sm">
                            .{{ str_replace(['http://', 'https://'], '', config('app.url')) }}
                        </span>
                    </div>
                    <p class="mt-1 text-sm text-slate-500">Your store will be available at this address</p>

                    @if($subdomain_available === true)
                        <div class="mt-2 flex items-center gap-2 p-3 rounded-md bg-green-50 border border-green-200">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="text-sm text-green-700">Subdomain is available!</span>
                        </div>
                    @elseif($subdomain_available === false)
                        <div class="mt-2 flex items-center gap-2 p-3 rounded-md bg-red-50 border border-red-200">
                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="text-sm text-red-700">Subdomain is already taken</span>
                        </div>
                    @endif

                    @error('subdomain')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Owner Information -->
            <div class="space-y-4 pt-6 border-t border-slate-200">
                <h2 class="text-xl font-semibold text-slate-900 border-b border-slate-200 pb-2">Owner Information</h2>

                <div>
                    <x-ui.label for="owner_name" value="Your Name" required />
                    <x-ui.input
                        wire:model="owner_name"
                        id="owner_name"
                        class="mt-1"
                        placeholder="John Doe"
                        required
                    />
                    @error('owner_name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <x-ui.label for="email" value="Email" required />
                    <x-ui.input
                        wire:model="email"
                        id="email"
                        class="mt-1"
                        type="email"
                        placeholder="john@example.com"
                        required
                    />
                    <p class="mt-1 text-sm text-slate-500">You'll use this to login</p>
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <x-ui.label for="password" value="Password" required />
                    <x-ui.input
                        wire:model="password"
                        id="password"
                        class="mt-1"
                        type="password"
                        placeholder="••••••••"
                        required
                    />
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <x-ui.label for="password_confirmation" value="Confirm Password" required />
                    <x-ui.input
                        wire:model="password_confirmation"
                        id="password_confirmation"
                        class="mt-1"
                        type="password"
                        placeholder="••••••••"
                        required
                    />
                    @error('password_confirmation')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-200">
                <a href="{{ route('landing') }}">
                    <x-ui.button type="button" variant="ghost">
                        Cancel
                    </x-ui.button>
                </a>
                <x-ui.button type="submit" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="register">Create My Store</span>
                    <span wire:loading wire:target="register" class="flex items-center gap-2">
                        <svg class="animate-spin h-4 w-4" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Creating...
                    </span>
                </x-ui.button>
            </div>
        </form>

        <div class="text-center mt-6 pt-6 border-t border-slate-200">
            <p class="text-sm text-slate-600">
                Already have an account?
                <a href="{{ route('login') }}" class="font-medium text-slate-900 hover:text-slate-700 transition-colors">
                    Login here
                </a>
            </p>
        </div>
    </div>
</div>
