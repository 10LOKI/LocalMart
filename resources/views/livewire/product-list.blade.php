<div class="p-6">
    <h1 class="text-2xl mb-4">Products</h1>
    <a href="/products/create" class="bg-blue-500 text-white px-4 py-2 rounded">Add</a>

    <table class="w-full mt-4 border">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border">Name</th>
                <th class="p-2 border">Category</th>
                <th class="p-2 border">Price</th>
                <th class="p-2 border">Stock</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $p)
            <tr>
                <td class="p-2 border">{{ $p->name }}</td>
                <td class="p-2 border">{{ $p->category->name }}</td>
                <td class="p-2 border">${{ $p->price }}</td>
                <td class="p-2 border">{{ $p->stock }}</td>
                <td class="p-2 border">
                    <a href="/products/edit/{{ $p->id }}" class="text-blue-500">Edit</a>
                    <button wire:click="delete({{ $p->id }})" class="text-red-500 ml-2">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>