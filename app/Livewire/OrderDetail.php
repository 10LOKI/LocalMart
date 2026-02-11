<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\User;
use Livewire\Attributes\Layout;
#[Layout('layouts.app')]

class OrderDetail extends Component
{
    public $order;
    public $status;

    public function mount($id)
    {
        $this->order = Order::with('items.product')->find($id);
        $this->status = $this->order->status;
    }

    public function updateStatus()
    {
        $this->order->update(['status' => $this->status]);
        session()->flash('message', 'Status updated');
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
        return view('livewire.order-detail');
    }
}