<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Services\RealtimeNotificationService;
use Livewire\Attributes\Layout;

#[Layout('layouts.backoffice')]
class OrderDetail extends Component
{
    public $orderId;
    public $status;

    public function mount($id)
    {
        $this->orderId = $id;
        $order = Order::findOrFail($id);
        $this->status = $order->status;
    }

    public function updateStatus()
    {
        $this->validate([
            'status' => 'required|in:on_hold,paid,delivered,cancelled'
        ]);

        $order = Order::findOrFail($this->orderId);
        $previousStatus = $order->status;
        $order->status = $this->status;
        $order->save();

        if ($previousStatus !== $order->status) {
            app(RealtimeNotificationService::class)->sendToUser(
                $order->user_id,
                'Order status updated',
                "Order {$order->order_number} is now " . str_replace('_', ' ', $order->status) . '.',
                'info',
                ['order_id' => $order->id, 'status' => $order->status]
            );
        }

        session()->flash('message', 'Order status updated successfully!');
    }

    public function cancelOrder()
    {
        $order = Order::with('items.product')->findOrFail($this->orderId);

        if (! auth()->user()->hasRole('customer') || $order->user_id !== auth()->id()) {
            session()->flash('error', 'Unauthorized action');
            return;
        }

        if ($order->status === 'cancelled') {
            session()->flash('error', 'Order already cancelled');
            return;
        }

        foreach ($order->items as $item) {
            $item->product->increment('stock', $item->quantity);
        }

        $order->update(['status' => 'cancelled']);
        $this->status = 'cancelled';

        app(RealtimeNotificationService::class)->sendToRoles(
            ['admin', 'seller'],
            'Order cancelled',
            "Order {$order->order_number} has been cancelled by customer.",
            'warning',
            ['order_id' => $order->id]
        );

        session()->flash('message', 'Order cancelled successfully. Stock has been restored.');
    }
    public function render()
    {
        $order = Order::with(['items.product', 'user'])->findOrFail($this->orderId);
        return view('livewire.order-detail', ['order' => $order]);
    }
}
