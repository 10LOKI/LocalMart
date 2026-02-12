<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\User;
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
        logger('Update status called with: ' . $this->status);
        
        $this->validate([
            'status' => 'required|in:on_hold,paid,delivered'
        ]);

        $order = Order::findOrFail($this->orderId);
        $order->status = $this->status;
        $order->save();
        
        logger('Order status updated to: ' . $order->status);
        
        session()->flash('message', 'Order status updated successfully!');
    }

    public function cancelOrder()
    {
        if (!auth()->user()->hasRole('customer') || $this->order->user_id !== auth()->id()) {
            session()->flash('error', 'Unauthorized action');
            return;
        }

        if ($this->order->status === 'cancelled') {
            session()->flash('error', 'Order already cancelled');
            return;
        }

        foreach ($this->order->items as $item) {
            $item->product->increment('stock', $item->quantity);
        }

        $this->order->update(['status' => 'cancelled']);
        $this->status = 'cancelled';

        session()->flash('message', 'Order cancelled successfully. Stock has been restored.');
    }
    public function render()
    {
        $order = Order::with(['items.product', 'user'])->findOrFail($this->orderId);
        return view('livewire.order-detail', ['order' => $order]);
    }
}
