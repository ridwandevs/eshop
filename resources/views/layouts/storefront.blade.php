<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Shop' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-nav sticky full-width>
        <x-slot:brand>
            <a href="{{ route('home') }}" class="text-xl font-bold">My Shop</a>
        </x-slot:brand>
        <x-slot:middle class="!justify-end">
            <x-input placeholder="Search products..." class="input-sm" />
        </x-slot:middle>
        <x-slot:actions>
            <a href="{{ route('cart') }}" class="btn btn-ghost btn-sm">
                <x-icon name="o-shopping-cart" class="w-5 h-5" />
                @livewire('storefront.cart-counter')
            </a>
            <a href="{{ route('login') }}" class="btn btn-ghost btn-sm">Login</a>
        </x-slot:actions>
    </x-nav>

    <div class="container mx-auto px-4 py-8">
        {{ $slot }}
    </div>

    <footer class="footer footer-center p-10 bg-base-200 text-base-content mt-20">
        <div>
            <p class="font-bold">My Shop</p>
            <p>Copyright © {{ date('Y') }} - All rights reserved</p>
        </div>
    </footer>
</body>
</html>
