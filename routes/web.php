<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Central App Routes
|--------------------------------------------------------------------------
|
| These routes are for the main platform (not tenant-specific)
| Users register their stores here
|
*/

// Landing Page
Route::get('/', App\Livewire\Central\Landing::class)->name('landing');

// Store Registration (Public)
Route::get('/register-store', App\Livewire\Central\RegisterStore::class)->name('register.store');

// Auth Routes
require __DIR__.'/auth.php';

// Central Dashboard (Authenticated Users)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', App\Livewire\Central\Dashboard::class)->name('dashboard');
    Route::get('/my-stores', App\Livewire\Central\MyStores::class)->name('my-stores');
});
