<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {

    // Storefront Routes (Customer Facing)
    Route::get('/', \App\Livewire\Storefront\Home::class)->name('home');
    Route::get('/products', \App\Livewire\Storefront\ProductList::class)->name('products.index');
    Route::get('/products/{slug}', \App\Livewire\Storefront\ProductDetail::class)->name('products.show');
    Route::get('/category/{slug}', \App\Livewire\Storefront\CategoryProducts::class)->name('category.show');
    Route::get('/cart', \App\Livewire\Storefront\CartPage::class)->name('cart');
    Route::get('/checkout', \App\Livewire\Storefront\Checkout::class)->name('checkout');
    Route::get('/order/{orderNumber}', \App\Livewire\Storefront\OrderConfirmation::class)->name('order.confirmation');

    // Auth Routes (for shop owners/staff)
    Route::middleware(['guest'])->group(function () {
        Route::get('/login', \App\Livewire\Auth\Login::class)->name('login');
    });

    Route::middleware(['auth'])->group(function () {
        Route::post('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
    });

    // Shop Admin Routes (Shop Owner Dashboard)
    Route::prefix('shop')->name('shop.')->middleware(['auth'])->group(function () {
        Route::get('/dashboard', \App\Livewire\Shop\Dashboard::class)->name('dashboard');

        // Products
        Route::get('/products', \App\Livewire\Shop\Products\Index::class)->name('shop.products.index');
        Route::get('/products/create', \App\Livewire\Shop\Products\Create::class)->name('shop.products.create');
        Route::get('/products/{product}/edit', \App\Livewire\Shop\Products\Edit::class)->name('shop.products.edit');

        // Categories
        Route::get('/categories', \App\Livewire\Shop\Categories\Index::class)->name('shop.categories.index');

        // Orders
        Route::get('/orders', \App\Livewire\Shop\Orders\Index::class)->name('shop.orders.index');
        Route::get('/orders/{order}', \App\Livewire\Shop\Orders\Show::class)->name('shop.orders.show');

        // Customers
        Route::get('/customers', \App\Livewire\Shop\Customers\Index::class)->name('shop.customers.index');

        // Settings
        Route::get('/settings', \App\Livewire\Shop\Settings\Index::class)->name('shop.settings.index');
    });
});
