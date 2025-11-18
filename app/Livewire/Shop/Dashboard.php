<?php

namespace App\Livewire\Shop;

use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.shop')]
class Dashboard extends Component
{
    public function render()
    {
        $stats = [
            'total_products' => Product::count(),
            'total_orders' => Order::count(),
            'pending_orders' => Order::where('status', 'pending')->count(),
            'total_customers' => Customer::count(),
            'total_revenue' => Order::where('payment_status', 'paid')->sum('total'),
            'recent_orders' => Order::with('customer')->latest()->take(5)->get(),
        ];

        return view('livewire.shop.dashboard', compact('stats'));
    }
}
