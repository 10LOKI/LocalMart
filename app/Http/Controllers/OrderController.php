<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\RealtimeNotificationService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(private readonly RealtimeNotificationService $notifications)
    {
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:on_hold,paid,delivered,cancelled'
        ]);

        $order = Order::findOrFail($id);
        $previousStatus = $order->status;
        $order->status = $request->status;
        $order->save();

        if ($previousStatus !== $order->status) {
            $this->notifications->sendToUser(
                $order->user_id,
                'Order status updated',
                "Order {$order->order_number} is now " . str_replace('_', ' ', $order->status) . '.',
                'info',
                ['order_id' => $order->id, 'status' => $order->status]
            );
        }

        return redirect()->back()->with('message', 'Order status updated successfully!');
    }
}
