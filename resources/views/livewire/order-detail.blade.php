<div class="p-6">
    <h1 class="text-2xl mb-4">Order {{ $order->order_number }}</h1>

    @if(session('message'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">{{ session('message') }}</div>
    @endif

    <div class="mb-4">
        <p><strong>Customer:</strong> {{ $order->user->name }}</p>
        <p><strong>Total:</strong> ${{ $order->total }}</p>
        <p><strong>Address:</strong> {{ $order->address }}</p>
    </div>

    @can('update order status')
    <div class="mb-4">
        <select wire:model="status" class="border p-2 rounded">
            <option value="on_hold">On Hold</option>
            <option value="paid">Paid</option>
            <option value="delivered">Delivered</option>
        </select>
        <button wire:click="updateStatus" class="bg-blue-500 text-white px-4 py-2 rounded ml-2">Update</button>
    </div>
    @endcan

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border">Product</th>
                <th class="p-2 border">Price</th>
                <th class="p-2 border">Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td class="p-2 border">{{ $item->product->name }}</td>
                <td class="p-2 border">${{ $item->price }}</td>
                <td class="p-2 border">{{ $item->quantity }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>