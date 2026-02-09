<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use Livewire\Attributes\Layout;
#[Layout('layouts.backoffice')]

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

    public function render()
    {
        return view('livewire.order-detail');
    }
}
