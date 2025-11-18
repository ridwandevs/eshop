<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <body class="font-sans antialiased bg-white">
        <div class="min-h-screen flex flex-col">
            <!-- Navigation -->
            <nav class="sticky top-0 z-50 border-b border-slate-200 bg-white/95 backdrop-blur supports-[backdrop-filter]:bg-white/60">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex h-16 items-center justify-between">
                        <!-- Logo -->
                        <div class="flex items-center">
                            <a href="{{ route('landing') }}" class="text-xl font-bold text-slate-900 hover:text-slate-700 transition-colors">
                                {{ config('app.name') }}
                            </a>
                        </div>

                        <!-- Navigation Items -->
                        <div class="flex items-center gap-4">
                            @auth
                                <a href="{{ route('dashboard') }}">
                                    <x-ui.button variant="ghost">
                                        Dashboard
                                    </x-ui.button>
                                </a>
                                <a href="{{ route('my-stores') }}">
                                    <x-ui.button variant="ghost">
                                        My Stores
                                    </x-ui.button>
                                </a>

                                <!-- User Dropdown -->
                                <div class="relative" x-data="{ open: false }" @click.away="open = false">
                                    <button @click="open = !open" class="flex items-center gap-2 rounded-full border border-slate-200 p-1 hover:border-slate-300 transition-colors">
                                        <div class="w-8 h-8 rounded-full bg-slate-900 text-white flex items-center justify-center text-sm font-medium">
                                            {{ substr(auth()->user()->name, 0, 1) }}
                                        </div>
                                    </button>

                                    <div x-show="open"
                                         x-transition:enter="transition ease-out duration-100"
                                         x-transition:enter-start="transform opacity-0 scale-95"
                                         x-transition:enter-end="transform opacity-100 scale-100"
                                         x-transition:leave="transition ease-in duration-75"
                                         x-transition:leave-start="transform opacity-100 scale-100"
                                         x-transition:leave-end="transform opacity-0 scale-95"
                                         class="absolute right-0 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                         style="display: none;">
                                        <div class="py-1">
                                            <div class="px-4 py-2 border-b border-slate-200">
                                                <p class="text-sm font-medium text-slate-900">{{ auth()->user()->name }}</p>
                                                <p class="text-sm text-slate-500 truncate">{{ auth()->user()->email }}</p>
                                            </div>
                                            <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100">
                                                Profile
                                            </a>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-slate-700 hover:bg-slate-100">
                                                    Logout
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <a href="{{ route('login') }}">
                                    <x-ui.button variant="ghost">
                                        Login
                                    </x-ui.button>
                                </a>
                                <a href="{{ route('register.store') }}">
                                    <x-ui.button>
                                        Get Started
                                    </x-ui.button>
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main class="flex-1">
                {{ $slot }}
            </main>
        </div>

        <!-- Toast Notifications -->
        <x-toast />

        @livewireScripts
    </body>
</html>
