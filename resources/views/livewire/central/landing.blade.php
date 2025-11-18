<div class="min-h-screen">
    <!-- Hero Section -->
    <section class="relative overflow-hidden border-b border-slate-200">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-50 to-white"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 sm:py-32">
            <div class="text-center max-w-4xl mx-auto">
                <div class="inline-flex items-center rounded-full border border-slate-200 bg-white px-3 py-1 text-sm mb-8">
                    <span class="text-slate-600">Launch your store in minutes</span>
                </div>

                <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold tracking-tight text-slate-900 mb-6">
                    Create Your Online Store
                    <span class="block text-slate-600 mt-2">in Minutes</span>
                </h1>

                <p class="text-xl text-slate-600 mb-10 max-w-2xl mx-auto">
                    Launch your ecommerce business with our easy-to-use platform.
                    Everything you need to sell online. No coding required.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    @auth
                        <a href="{{ route('dashboard') }}">
                            <x-ui.button size="lg" class="w-full sm:w-auto">
                                Go to Dashboard
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </x-ui.button>
                        </a>
                    @else
                        <a href="{{ route('register.store') }}">
                            <x-ui.button size="lg" class="w-full sm:w-auto">
                                Get Started Free
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </x-ui.button>
                        </a>
                        <a href="{{ route('login') }}">
                            <x-ui.button variant="outline" size="lg" class="w-full sm:w-auto">
                                Login
                            </x-ui.button>
                        </a>
                    @endauth
                </div>

                <!-- Stats -->
                <div class="mt-16 grid grid-cols-3 gap-8 border-t border-slate-200 pt-12">
                    <div>
                        <div class="text-3xl font-bold text-slate-900">10k+</div>
                        <div class="text-sm text-slate-600 mt-1">Active Stores</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-slate-900">50k+</div>
                        <div class="text-sm text-slate-600 mt-1">Products Sold</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-slate-900">99.9%</div>
                        <div class="text-sm text-slate-600 mt-1">Uptime</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-24 sm:py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-slate-900 mb-4">
                    Everything You Need to Sell Online
                </h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                    A complete ecommerce solution with all the features you need to grow your business
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="relative group">
                    <div class="h-full rounded-lg border border-slate-200 bg-white p-8 hover:border-slate-300 hover:shadow-lg transition-all duration-200">
                        <div class="w-12 h-12 rounded-lg bg-slate-900 flex items-center justify-center mb-5">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-slate-900 mb-3">Product Management</h3>
                        <p class="text-slate-600">
                            Easily add and manage your products with images, variants, and inventory tracking.
                        </p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="relative group">
                    <div class="h-full rounded-lg border border-slate-200 bg-white p-8 hover:border-slate-300 hover:shadow-lg transition-all duration-200">
                        <div class="w-12 h-12 rounded-lg bg-slate-900 flex items-center justify-center mb-5">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-slate-900 mb-3">Shopping Cart</h3>
                        <p class="text-slate-600">
                            Seamless shopping experience with a fully functional cart and checkout system.
                        </p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="relative group">
                    <div class="h-full rounded-lg border border-slate-200 bg-white p-8 hover:border-slate-300 hover:shadow-lg transition-all duration-200">
                        <div class="w-12 h-12 rounded-lg bg-slate-900 flex items-center justify-center mb-5">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-slate-900 mb-3">Order Management</h3>
                        <p class="text-slate-600">
                            Track and manage all your orders in one place with real-time updates.
                        </p>
                    </div>
                </div>

                <!-- Feature 4 -->
                <div class="relative group">
                    <div class="h-full rounded-lg border border-slate-200 bg-white p-8 hover:border-slate-300 hover:shadow-lg transition-all duration-200">
                        <div class="w-12 h-12 rounded-lg bg-slate-900 flex items-center justify-center mb-5">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-slate-900 mb-3">Categories</h3>
                        <p class="text-slate-600">
                            Organize your products with categories for easy navigation.
                        </p>
                    </div>
                </div>

                <!-- Feature 5 -->
                <div class="relative group">
                    <div class="h-full rounded-lg border border-slate-200 bg-white p-8 hover:border-slate-300 hover:shadow-lg transition-all duration-200">
                        <div class="w-12 h-12 rounded-lg bg-slate-900 flex items-center justify-center mb-5">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-slate-900 mb-3">Customer Management</h3>
                        <p class="text-slate-600">
                            Keep track of your customers and their purchase history.
                        </p>
                    </div>
                </div>

                <!-- Feature 6 -->
                <div class="relative group">
                    <div class="h-full rounded-lg border border-slate-200 bg-white p-8 hover:border-slate-300 hover:shadow-lg transition-all duration-200">
                        <div class="w-12 h-12 rounded-lg bg-slate-900 flex items-center justify-center mb-5">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-slate-900 mb-3">Customizable Design</h3>
                        <p class="text-slate-600">
                            Make your store unique with customizable themes and branding.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 sm:py-32 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative overflow-hidden rounded-2xl bg-slate-900 px-6 py-20 sm:px-12 sm:py-24 lg:px-16">
                <div class="absolute inset-0 bg-gradient-to-br from-slate-800 to-slate-900"></div>
                <div class="relative text-center max-w-2xl mx-auto">
                    <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-white mb-4">
                        Ready to Start Selling?
                    </h2>
                    <p class="text-xl text-slate-300 mb-8">
                        Join thousands of successful online stores
                    </p>
                    @guest
                        <a href="{{ route('register.store') }}">
                            <x-ui.button size="lg" class="bg-white text-slate-900 hover:bg-slate-100">
                                Create Your Store Now
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </x-ui.button>
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="border-t border-slate-200 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <p class="text-center text-slate-600 text-sm">
                © {{ date('Y') }} eShop. All rights reserved.
            </p>
        </div>
    </footer>
</div>
