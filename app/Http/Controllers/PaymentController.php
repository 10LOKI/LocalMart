<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Services\RealtimeNotificationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function __construct(private readonly RealtimeNotificationService $notifications)
    {
    }

    public function checkout(Order $order): RedirectResponse
    {
        $this->authorizeOrderAccess($order);

        if ($order->status === 'paid') {
            return redirect()->route($this->orderShowRouteName(), $order->id)
                ->with('message', 'This order is already paid.');
        }

        $payment = Payment::updateOrCreate(
            ['order_id' => $order->id],
            [
                'amount' => $order->total,
                'status' => 'pending',
            ]
        );

        if (config('services.stripe.fake_mode', true)) {
            $this->markOrderAsPaid($order, $payment, 'FAKE-' . strtoupper(uniqid()));

            return redirect()->route($this->orderShowRouteName(), $order->id)
                ->with('message', 'Payment completed in local test mode.');
        }

        $secretKey = (string) config('services.stripe.secret_key');
        if ($secretKey === '') {
            return redirect()->route($this->orderShowRouteName(), $order->id)
                ->with('error', 'Stripe is not configured. Set STRIPE_SECRET and STRIPE_KEY in your .env file.');
        }

        $amountInCents = (int) round($order->total * 100);
        $sessionResponse = Http::asForm()
            ->withToken($secretKey)
            ->post('https://api.stripe.com/v1/checkout/sessions', [
                'mode' => 'payment',
                'success_url' => route('payments.stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('payments.stripe.cancel', ['order' => $order->id]),
                'client_reference_id' => (string) $order->id,
                'metadata[order_id]' => (string) $order->id,
                'line_items[0][price_data][currency]' => config('services.stripe.currency', 'usd'),
                'line_items[0][price_data][product_data][name]' => 'Order ' . $order->order_number,
                'line_items[0][price_data][unit_amount]' => $amountInCents,
                'line_items[0][quantity]' => 1,
            ]);

        if (! $sessionResponse->successful() || ! $sessionResponse->json('url')) {
            $payment->update(['status' => 'failed']);

            return redirect()->route($this->orderShowRouteName(), $order->id)->with(
                'error',
                'Unable to start Stripe Checkout. Please try again.'
            );
        }

        $payment->update([
            'transaction_id' => (string) $sessionResponse->json('id'),
            'status' => 'pending',
        ]);

        return redirect()->away((string) $sessionResponse->json('url'));
    }

    public function stripeSuccess(Request $request): RedirectResponse
    {
        $sessionId = (string) $request->query('session_id');
        if ($sessionId === '') {
            return redirect()->route($this->orderIndexRouteName())->with('error', 'Missing Stripe session reference.');
        }

        $secretKey = (string) config('services.stripe.secret_key');
        if ($secretKey === '') {
            return redirect()->route($this->orderIndexRouteName())->with('error', 'Stripe is not configured.');
        }

        $sessionResponse = Http::withToken($secretKey)
            ->get('https://api.stripe.com/v1/checkout/sessions/' . $sessionId);

        if (! $sessionResponse->successful()) {
            return redirect()->route($this->orderIndexRouteName())->with('error', 'Could not validate Stripe payment.');
        }

        $session = $sessionResponse->json();
        $orderId = (int) ($session['metadata']['order_id'] ?? $session['client_reference_id'] ?? 0);
        $order = Order::findOrFail($orderId);
        $this->authorizeOrderAccess($order);

        $payment = Payment::firstOrCreate(
            ['order_id' => $order->id],
            ['amount' => $order->total]
        );

        if (($session['payment_status'] ?? null) !== 'paid') {
            $payment->update([
                'transaction_id' => $sessionId,
                'status' => 'failed',
            ]);

            return redirect()->route($this->orderShowRouteName(), $order->id)
                ->with('error', 'Payment was not completed.');
        }

        $this->markOrderAsPaid($order, $payment, $sessionId);

        return redirect()->route($this->orderShowRouteName(), $order->id)->with('message', 'Payment successful.');
    }

    public function stripeCancel(Request $request): RedirectResponse
    {
        $order = Order::findOrFail((int) $request->query('order'));
        $this->authorizeOrderAccess($order);

        if ($order->payment) {
            $order->payment->update(['status' => 'failed']);
        }

        $this->notifications->sendToUser(
            $order->user_id,
            'Payment cancelled',
            "Payment was cancelled for order {$order->order_number}.",
            'warning',
            ['order_id' => $order->id]
        );

        return redirect()->route($this->orderShowRouteName(), $order->id)->with('error', 'Payment cancelled.');
    }

    private function markOrderAsPaid(Order $order, Payment $payment, string $transactionId): void
    {
        $payment->update([
            'transaction_id' => $transactionId,
            'status' => 'completed',
            'amount' => $order->total,
        ]);

        $order->update(['status' => 'paid']);

        $this->notifications->sendToUser(
            $order->user_id,
            'Payment received',
            "Your payment for order {$order->order_number} was confirmed.",
            'success',
            ['order_id' => $order->id]
        );

        $this->notifications->sendToRoles(
            ['admin', 'seller'],
            'Order paid',
            "Order {$order->order_number} has been paid.",
            'success',
            ['order_id' => $order->id]
        );
    }

    private function authorizeOrderAccess(Order $order): void
    {
        if ($order->user_id !== auth()->id() && ! auth()->user()->hasAnyRole(['admin', 'seller', 'moderator'])) {
            abort(403);
        }
    }

    private function orderShowRouteName(): string
    {
        return auth()->user()->hasAnyRole(['admin', 'seller', 'moderator'])
            ? 'orders.show'
            : 'my-orders.show';
    }

    private function orderIndexRouteName(): string
    {
        return auth()->user()->hasAnyRole(['admin', 'seller', 'moderator'])
            ? 'orders.index'
            : 'my-orders.index';
    }
}
