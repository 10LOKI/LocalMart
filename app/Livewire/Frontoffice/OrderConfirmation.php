<?php

namespace App\Livewire\Frontoffice;

use App\Models\Order;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class OrderConfirmation extends Component
{
    public $order;

    public function mount($order)
    {
        $this->order = Order::with(['items.product'])->findOrFail($order);

        if ($this->order->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }
    }

    public function render()
    {
        return view('livewire.frontoffice.order-confirmation');
    }
}
