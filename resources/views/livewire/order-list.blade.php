<div class="p-6">
    <h1 class="text-2xl mb-4">Orders</h1>

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border">Order #</th>
                <th class="p-2 border">Customer</th>
                <th class="p-2 border">Total</th>
                <th class="p-2 border">Status</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td class="p-2 border">{{ $order->order_number }}</td>
                <td class="p-2 border">{{ $order->user->name }}</td>
                <td class="p-2 border">${{ $order->total }}</td>
                <td class="p-2 border">{{ $order->status }}</td>
                <td class="p-2 border">
                    <a href="/orders/{{ $order->id }}" class="text-blue-500">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>