<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
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

    public function render()
    {
        $order = Order::with(['items.product', 'user'])->findOrFail($this->orderId);
        return view('livewire.order-detail', ['order' => $order]);
    }
}
