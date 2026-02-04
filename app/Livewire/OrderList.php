<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use Livewire\Attributes\Layout;
#[Layout('layouts.app')]

class OrderList extends Component
{
    public function render()
    {
        $query = Order::with('user');
        
        if (auth()->user()->hasRole('customer')) {
            $query->where('user_id', auth()->id());
        }

        return view('livewire.order-list', [
            'orders' => $query->latest()->get()
        ]);
    }
}