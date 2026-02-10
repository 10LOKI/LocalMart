<?php

namespace App\Livewire\Frontoffice;

use Livewire\Component;
use App\Models\Order;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class OrderList extends Component
{
    public function render()
    {
        return view('livewire.frontoffice.order-list', [
            'orders' => Order::where('user_id', auth()->id())->latest()->get()
        ]);
    }
}
