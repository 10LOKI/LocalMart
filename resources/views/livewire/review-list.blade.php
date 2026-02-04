<div class="p-6">
    <h1 class="text-2xl mb-4">Reviews</h1>

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border">Product</th>
                <th class="p-2 border">User</th>
                <th class="p-2 border">Rating</th>
                <th class="p-2 border">Comment</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)
            <tr>
                <td class="p-2 border">{{ $review->product->name }}</td>
                <td class="p-2 border">{{ $review->user->name }}</td>
                <td class="p-2 border">{{ $review->rating }}/5</td>
                <td class="p-2 border">{{ $review->comment }}</td>
                <td class="p-2 border">
                    <button wire:click="delete({{ $review->id }})" class="text-red-500">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>