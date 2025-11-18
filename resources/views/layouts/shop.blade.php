<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Shop Dashboard' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-nav sticky full-width>
        <x-slot:brand>
            <label for="main-drawer" class="lg:hidden mr-3">
                <x-icon name="o-bars-3" class="cursor-pointer" />
            </label>
            <div class="text-xl font-bold">My Shop</div>
        </x-slot:brand>
        <x-slot:actions>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-button label="Logout" type="submit" class="btn-ghost btn-sm" />
            </form>
        </x-slot:actions>
    </x-nav>

    <x-main with-nav full-width>
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-200">
            <x-menu activate-by-route>
                <x-menu-item title="Dashboard" icon="o-home" link="{{ route('shop.dashboard') }}" />
                <x-menu-sub title="Products" icon="o-cube">
                    <x-menu-item title="All Products" icon="o-list-bullet" link="{{ route('shop.products.index') }}" />
                    <x-menu-item title="Add Product" icon="o-plus-circle" link="{{ route('shop.products.create') }}" />
                    <x-menu-item title="Categories" icon="o-tag" link="{{ route('shop.categories.index') }}" />
                </x-menu-sub>
                <x-menu-item title="Orders" icon="o-shopping-bag" link="{{ route('shop.orders.index') }}" />
                <x-menu-item title="Customers" icon="o-users" link="{{ route('shop.customers.index') }}" />
                <x-menu-item title="Settings" icon="o-cog-6-tooth" link="{{ route('shop.settings.index') }}" />
            </x-menu>
        </x-slot:sidebar>

        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-main>
</body>
</html>
