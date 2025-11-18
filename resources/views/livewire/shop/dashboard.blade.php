<div>
    <div class="mb-6">
        <h1 class="text-3xl font-bold">Dashboard</h1>
        <p class="text-gray-600">Welcome to your shop dashboard</p>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <x-stat
            title="Total Products"
            :value="$stats['total_products']"
            icon="o-cube"
            color="text-primary"
        />
        <x-stat
            title="Total Orders"
            :value="$stats['total_orders']"
            icon="o-shopping-bag"
            color="text-secondary"
        />
        <x-stat
            title="Pending Orders"
            :value="$stats['pending_orders']"
            icon="o-clock"
            color="text-warning"
        />
        <x-stat
            title="Total Revenue"
            value="${{ number_format($stats['total_revenue'], 2) }}"
            icon="o-currency-dollar"
            color="text-success"
        />
    </div>

    {{-- Recent Orders --}}
    <x-card title="Recent Orders">
        <x-table :headers="['Order #', 'Customer', 'Total', 'Status', 'Date']" :rows="$stats['recent_orders']">
            @scope('cell_order_number', $order)
                <a href="{{ route('shop.orders.show', $order) }}" class="link link-primary">
                    {{ $order->order_number }}
                </a>
            @endscope

            @scope('cell_customer_name', $order)
                {{ $order->customer_name }}
            @endscope

            @scope('cell_total', $order)
                ${{ number_format($order->total, 2) }}
            @endscope

            @scope('cell_status', $order)
                <x-badge :value="$order->status" class="badge-{{ $order->status === 'pending' ? 'warning' : 'success' }}" />
            @endscope

            @scope('cell_created_at', $order)
                {{ $order->created_at->diffForHumans() }}
            @endscope
        </x-table>
    </x-card>
</div>
