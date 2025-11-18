<div>
    <div class="mb-8 flex justify-between items-center">
        <div>
            <h1 class="text-4xl font-bold">My Stores</h1>
            <p class="text-gray-600 mt-2">Manage all your online stores</p>
        </div>
        <a href="{{ route('register.store') }}" class="btn btn-primary">
            <x-icon name="o-plus" class="w-5 h-5" />
            Create New Store
        </a>
    </div>

    @if($stores->count() > 0)
        <div class="space-y-4">
            @foreach($stores as $store)
                <div class="card bg-base-100 shadow-xl" wire:key="store-{{ $store->id }}">
                    <div class="card-body">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <h3 class="card-title text-2xl">{{ $store->data['name'] ?? $store->id }}</h3>
                                <p class="text-gray-600 mt-2">
                                    <x-icon name="o-globe-alt" class="w-4 h-4 inline" />
                                    <a href="https://{{ $store->full_domain }}"
                                       target="_blank"
                                       class="link link-primary">
                                        {{ $store->full_domain }}
                                    </a>
                                </p>
                            </div>

                            <div class="dropdown dropdown-end">
                                <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                                    <x-icon name="o-ellipsis-vertical" class="w-5 h-5" />
                                </div>
                                <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                                    <li>
                                        <a href="https://{{ $store->full_domain }}/shop/dashboard" target="_blank">
                                            <x-icon name="o-cog-6-tooth" class="w-4 h-4" />
                                            Store Settings
                                        </a>
                                    </li>
                                    <li>
                                        <button
                                            wire:click="deleteStore('{{ $store->id }}')"
                                            wire:confirm="Are you sure you want to delete this store? This action cannot be undone."
                                            class="text-error">
                                            <x-icon name="o-trash" class="w-4 h-4" />
                                            Delete Store
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="divider my-2"></div>

                        <!-- Store Stats -->
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="stat bg-base-200 rounded-lg p-4">
                                <div class="stat-title text-xs">Status</div>
                                <div class="stat-value text-sm text-success">Active</div>
                            </div>
                            <div class="stat bg-base-200 rounded-lg p-4">
                                <div class="stat-title text-xs">Created</div>
                                <div class="stat-value text-sm">{{ $store->created_at->format('M d, Y') }}</div>
                            </div>
                            <div class="stat bg-base-200 rounded-lg p-4">
                                <div class="stat-title text-xs">Products</div>
                                <div class="stat-value text-sm">0</div>
                                <div class="stat-desc text-xs">Coming soon</div>
                            </div>
                            <div class="stat bg-base-200 rounded-lg p-4">
                                <div class="stat-title text-xs">Orders</div>
                                <div class="stat-value text-sm">0</div>
                                <div class="stat-desc text-xs">Coming soon</div>
                            </div>
                        </div>

                        <div class="card-actions justify-end mt-4">
                            <a href="https://{{ $store->full_domain }}"
                               target="_blank"
                               class="btn btn-ghost btn-sm">
                                <x-icon name="o-eye" class="w-4 h-4" />
                                View Storefront
                            </a>
                            <a href="https://{{ $store->full_domain }}/shop/products"
                               target="_blank"
                               class="btn btn-ghost btn-sm">
                                <x-icon name="o-cube" class="w-4 h-4" />
                                Manage Products
                            </a>
                            <a href="https://{{ $store->full_domain }}/shop/orders"
                               target="_blank"
                               class="btn btn-ghost btn-sm">
                                <x-icon name="o-shopping-cart" class="w-4 h-4" />
                                View Orders
                            </a>
                            <a href="https://{{ $store->full_domain }}/shop/dashboard"
                               target="_blank"
                               class="btn btn-primary btn-sm">
                                <x-icon name="o-arrow-top-right-on-square" class="w-4 h-4" />
                                Open Dashboard
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
                <p class="text-gray-600 mb-6">Create your first store to get started selling online</p>
                <div>
                    <a href="{{ route('register.store') }}" class="btn btn-primary btn-lg">
                        <x-icon name="o-plus" class="w-5 h-5" />
                        Create Your First Store
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>
