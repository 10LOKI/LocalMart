<div class="p-6">
    <h1 class="text-2xl mb-4">Categories</h1>
    <a href="/categories/create" class="bg-blue-500 text-white px-4 py-2 rounded">Add</a>

    <table class="w-full mt-4 border">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border">Name</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $cat)
            <tr>
                <td class="p-2 border">{{ $cat->name }}</td>
                <td class="p-2 border">
                    <a href="/categories/edit/{{ $cat->id }}" class="text-blue-500">Edit</a>
                    <button wire:click="delete({{ $cat->id }})" class="text-red-500 ml-2">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>