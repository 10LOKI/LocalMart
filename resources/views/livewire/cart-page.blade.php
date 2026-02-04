<div class="p-6">
    <h1 class="text-2xl mb-4">Cart</h1>

    @if($cart && $cart->items->count())
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 border">Product</th>
                    <th class="p-2 border">Price</th>
                    <th class="p-2 border">Quantity</th>
                    <th class="p-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart->items as $item)
                <tr>
                    <td class="p-2 border">{{ $item->product->name }}</td>
                    <td class="p-2 border">${{ $item->product->price }}</td>
                    <td class="p-2 border">{{ $item->quantity }}</td>
                    <td class="p-2 border">
                        <button wire:click="remove({{ $item->id }})" class="text-red-500">Remove</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <p class="mt-4"><strong>Total: ${{ $total }}</strong></p>
    @else
        <p>Your cart is empty</p>
    @endif
</div>