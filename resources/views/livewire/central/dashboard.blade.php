<div>
    <div class="mb-8">
        <h1 class="text-4xl font-bold">Welcome back, {{ auth()->user()->name }}!</h1>
        <p class="text-gray-600 mt-2">Manage your online stores from here</p>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="stats shadow">
            <div class="stat">
                <div class="stat-figure text-primary">
                    <x-icon name="o-shopping-bag" class="w-8 h-8" />
                </div>
                <div class="stat-title">Total Stores</div>
                <div class="stat-value text-primary">{{ $stores->count() }}</div>
            </div>
        </div>

        <div class="stats shadow">
            <div class="stat">
                <div class="stat-figure text-secondary">
                    <x-icon name="o-chart-bar" class="w-8 h-8" />
                </div>
                <div class="stat-title">Active Stores</div>
                <div class="stat-value text-secondary">{{ $stores->count() }}</div>
            </div>
        </div>

        <div class="stats shadow">
            <div class="stat">
                <div class="stat-figure text-accent">
                    <x-icon name="o-currency-dollar" class="w-8 h-8" />
                </div>
                <div class="stat-title">Total Revenue</div>
                <div class="stat-value text-accent">$0</div>
                <div class="stat-desc">Coming soon</div>
            </div>
        </div>
    </div>

    <!-- Stores -->
    <div class="mb-4 flex justify-between items-center">
        <h2 class="text-2xl font-bold">Your Stores</h2>
        <a href="{{ route('register.store') }}" class="btn btn-primary">
            <x-icon name="o-plus" class="w-5 h-5" />
            Create New Store
        </a>
    </div>

    @if($stores->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($stores as $store)
                <div class="card bg-base-100 shadow-xl" wire:key="store-{{ $store->id }}">
                    <div class="card-body">
                        <h3 class="card-title">{{ $store->data['name'] ?? $store->id }}</h3>
                        <p class="text-sm text-gray-600">
                            <x-icon name="o-globe-alt" class="w-4 h-4 inline" />
                            {{ $store->full_domain }}
                        </p>

                        <div class="divider my-2"></div>

                        <div class="flex gap-2 text-sm">
                            <div class="badge badge-outline">
                                <x-icon name="o-calendar" class="w-3 h-3 mr-1" />
                                Created {{ $store->created_at->diffForHumans() }}
                            </div>
                        </div>

                        <div class="card-actions justify-end mt-4">
                            <a href="https://{{ $store->full_domain }}/shop/dashboard"
                               target="_blank"
                               class="btn btn-primary btn-sm">
                                <x-icon name="o-arrow-top-right-on-square" class="w-4 h-4" />
                                Open Admin
                            </a>
                            <a href="https://{{ $store->full_domain }}"
                               target="_blank"
                               class="btn btn-ghost btn-sm">
                                <x-icon name="o-eye" class="w-4 h-4" />
                                View Store
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body text-center py-20">
                <x-icon name="o-shopping-bag" class="w-24 h-24 text-gray-400 mx-auto mb-4" />
                <h3 class="text-2xl font-semibold mb-2">No stores yet</h3>
                <p class="text-gray-600 mb-6">Create your first store to get started</p>
                <div>
                    <a href="{{ route('register.store') }}" class="btn btn-primary">
                        <x-icon name="o-plus" class="w-5 h-5" />
                        Create Your First Store
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>
