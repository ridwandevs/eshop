<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-base-200">
            <!-- Navigation -->
            <div class="navbar bg-base-100 shadow-lg">
                <div class="container mx-auto">
                    <div class="flex-1">
                        <a href="{{ route('landing') }}" class="btn btn-ghost text-xl">
                            {{ config('app.name') }}
                        </a>
                    </div>
                    <div class="flex-none gap-2">
                        @auth
                            <a href="{{ route('dashboard') }}" class="btn btn-ghost">
                                Dashboard
                            </a>
                            <a href="{{ route('my-stores') }}" class="btn btn-ghost">
                                My Stores
                            </a>
                            <div class="dropdown dropdown-end">
                                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar placeholder">
                                    <div class="bg-neutral text-neutral-content w-10 rounded-full">
                                        <span class="text-xl">{{ substr(auth()->user()->name, 0, 1) }}</span>
                                    </div>
                                </div>
                                <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                                    <li><a href="{{ route('profile') }}">Profile</a></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="w-full text-left">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-ghost">Login</a>
                            <a href="{{ route('register.store') }}" class="btn btn-primary">Get Started</a>
                        @endauth
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <main class="container mx-auto px-4 py-8">
                <x-toast />
                {{ $slot }}
            </main>

            <!-- Footer -->
            <footer class="footer footer-center bg-base-100 text-base-content p-10 mt-20">
                <aside>
                    <p class="font-bold">{{ config('app.name') }}</p>
                    <p>Create your online store in minutes</p>
                    <p>Copyright © {{ date('Y') }} - All rights reserved</p>
                </aside>
            </footer>
        </div>
    </body>
</html>
