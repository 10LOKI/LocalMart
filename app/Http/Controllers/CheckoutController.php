<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Cart;
use App\Models\Order;
use App\Notifications\NewOrderNotification;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout');
    }

    public function checkout(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Sample Product',
                    ],
                    'unit_amount' => 2000, // Amount in cents ($20)
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('checkout.cancel'),
        ]);

        return redirect($session->url);
    }

    public function success(Request $request)
    {
        $sessionId = $request->get('session_id');
        
        if (!$sessionId) {
            return redirect()->route('cart');
        }

        Stripe::setApiKey(config('services.stripe.secret'));
        $session = \Stripe\Checkout\Session::retrieve($sessionId);

        $cart = Cart::find($session->metadata->cart_id);

        if (!$cart || $cart->status === 'ordered') {
            return redirect()->route('orders.index')->with('message', 'Order already processed');
        }

        DB::beginTransaction();
        try {
            $total = $cart->items->sum(fn($item) => $item->price * $item->quantity);

            $order = Order::create([
                'user_id' => $cart->user_id,
                'order_number' => 'ORD-' . strtoupper(uniqid()),
                'total' => $total,
                'status' => 'paid',
                'address' => auth()->user()->address ?? 'Default Address',
            ]);

            foreach ($cart->items as $item) {
                $item->product->decrement('stock', $item->quantity);
                $order->items()->create([
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                ]);
            }

            $cart->update(['status' => 'ordered']);

            DB::commit();

            // Send emails (non-blocking)
            try {
                $order->user->notify(new NewOrderNotification($order));
                $sellers = $order->items->pluck('product.seller')->unique()->filter();
                foreach ($sellers as $seller) {
                    $seller->notify(new NewOrderNotification($order));
                }
            } catch (\Exception $e) {
                \Log::warning('Email notification failed: ' . $e->getMessage());
            }

            return redirect()->route('orders.show', $order->id)
                ->with('message', 'Payment successful! Order #' . $order->order_number);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('cart')->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function cancel()
    {
        return "Payment canceled.";
    }
}
