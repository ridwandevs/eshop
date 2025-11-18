<?php

namespace App\Livewire\Storefront;

use App\Models\Order;
use App\Models\Customer;
use App\Services\CartService;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use App\Traits\Toast;

#[Layout('layouts.storefront')]
#[Title('Checkout')]
class Checkout extends Component
{
    use Toast;

    public $cart;

    #[Validate('required|min:3')]
    public $name = '';

    #[Validate('required|email')]
    public $email = '';

    #[Validate('nullable')]
    public $phone = '';

    #[Validate('required')]
    public $address = '';

    #[Validate('required')]
    public $city = '';

    #[Validate('nullable')]
    public $state = '';

    #[Validate('required')]
    public $country = '';

    #[Validate('required')]
    public $postal_code = '';

    #[Validate('nullable')]
    public $notes = '';

    public function mount()
    {
        $cartService = app(CartService::class);
        $this->cart = $cartService->getCart();

        if ($this->cart->items->count() === 0) {
            return redirect()->route('cart');
        }
    }

    public function placeOrder()
    {
        $this->validate();

        // Find or create customer
        $customer = Customer::firstOrCreate(
            ['email' => $this->email],
            [
                'name' => $this->name,
                'phone' => $this->phone,
                'address' => $this->address,
                'city' => $this->city,
                'state' => $this->state,
                'country' => $this->country,
                'postal_code' => $this->postal_code,
            ]
        );

        // Calculate totals
        $subtotal = $this->cart->total;
        $shipping = 0; // Free shipping for MVP
        $tax = 0;
        $total = $subtotal + $shipping + $tax;

        // Create order
        $order = Order::create([
            'customer_id' => $customer->id,
            'customer_name' => $this->name,
            'customer_email' => $this->email,
            'customer_phone' => $this->phone,
            'shipping_address' => $this->address,
            'shipping_city' => $this->city,
            'shipping_state' => $this->state,
            'shipping_country' => $this->country,
            'shipping_postal_code' => $this->postal_code,
            'subtotal' => $subtotal,
            'tax' => $tax,
            'shipping_fee' => $shipping,
            'total' => $total,
            'status' => 'pending',
            'payment_status' => 'pending',
            'payment_method' => 'cod', // Cash on delivery for MVP
            'notes' => $this->notes,
        ]);

        // Create order items
        foreach ($this->cart->items as $item) {
            $order->items()->create([
                'product_id' => $item->product_id,
                'variant_id' => $item->variant_id,
                'product_name' => $item->product->name,
                'variant_name' => $item->variant ? $item->variant->name : null,
                'quantity' => $item->quantity,
                'price' => $item->price,
                'subtotal' => $item->subtotal,
            ]);

            // Update stock
            if ($item->product->track_stock) {
                $item->product->decrement('stock', $item->quantity);
            }
        }

        // Clear cart
        $cartService = app(CartService::class);
        $cartService->clear();

        $this->success('Order placed successfully!');

        return redirect()->route('order.confirmation', $order->order_number);
    }

    public function render()
    {
        return view('livewire.storefront.checkout');
    }
}
