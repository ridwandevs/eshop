<div>
    <!-- Hero Section -->
    <div class="hero min-h-[80vh]">
        <div class="hero-content text-center">
            <div class="max-w-4xl">
                <h1 class="text-5xl md:text-7xl font-bold mb-6">
                    Create Your Online Store in Minutes
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-gray-600">
                    Launch your ecommerce business with our easy-to-use platform. No coding required.
                </p>
                <div class="flex gap-4 justify-center">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg">
                            Go to Dashboard
                        </a>
                    @else
                        <a href="{{ route('register.store') }}" class="btn btn-primary btn-lg">
                            Get Started Free
                        </a>
                        <a href="{{ route('login') }}" class="btn btn-outline btn-lg">
                            Login
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-20">
        <h2 class="text-4xl font-bold text-center mb-12">Everything You Need to Sell Online</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body items-center text-center">
                    <x-icon name="o-shopping-bag" class="w-16 h-16 text-primary mb-4" />
                    <h3 class="card-title">Product Management</h3>
                    <p>Easily add and manage your products with images, variants, and inventory tracking.</p>
                </div>
            </div>

            <div class="card bg-base-100 shadow-xl">
                <div class="card-body items-center text-center">
                    <x-icon name="o-shopping-cart" class="w-16 h-16 text-primary mb-4" />
                    <h3 class="card-title">Shopping Cart</h3>
                    <p>Seamless shopping experience with a fully functional cart and checkout system.</p>
                </div>
            </div>

            <div class="card bg-base-100 shadow-xl">
                <div class="card-body items-center text-center">
                    <x-icon name="o-chart-bar" class="w-16 h-16 text-primary mb-4" />
                    <h3 class="card-title">Order Management</h3>
                    <p>Track and manage all your orders in one place with real-time updates.</p>
                </div>
            </div>

            <div class="card bg-base-100 shadow-xl">
                <div class="card-body items-center text-center">
                    <x-icon name="o-cube" class="w-16 h-16 text-primary mb-4" />
                    <h3 class="card-title">Categories</h3>
                    <p>Organize your products with categories for easy navigation.</p>
                </div>
            </div>

            <div class="card bg-base-100 shadow-xl">
                <div class="card-body items-center text-center">
                    <x-icon name="o-user-group" class="w-16 h-16 text-primary mb-4" />
                    <h3 class="card-title">Customer Management</h3>
                    <p>Keep track of your customers and their purchase history.</p>
                </div>
            </div>

            <div class="card bg-base-100 shadow-xl">
                <div class="card-body items-center text-center">
                    <x-icon name="o-paint-brush" class="w-16 h-16 text-primary mb-4" />
                    <h3 class="card-title">Customizable Design</h3>
                    <p>Make your store unique with customizable themes and branding.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="hero bg-primary text-primary-content rounded-2xl py-20 my-20">
        <div class="hero-content text-center">
            <div class="max-w-2xl">
                <h2 class="text-4xl font-bold mb-4">Ready to Start Selling?</h2>
                <p class="text-xl mb-8">Join thousands of successful online stores</p>
                @guest
                    <a href="{{ route('register.store') }}" class="btn btn-lg bg-white text-primary hover:bg-gray-100">
                        Create Your Store Now
                    </a>
                @endguest
            </div>
        </div>
    </div>
</div>
