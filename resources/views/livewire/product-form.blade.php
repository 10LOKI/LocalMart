<div class="p-6 max-w-2xl">
    <h1 class="text-2xl mb-4">{{ $productId ? 'Edit' : 'Create' }} Product</h1>

    <form wire:submit.prevent="save">
        <input type="text" wire:model="name" placeholder="Name" class="border p-2 w-full rounded mb-2">
        @error('name') <span class="text-red-500">{{ $message }}</span> @enderror

        <textarea wire:model="description" placeholder="Description" class="border p-2 w-full rounded mb-2"></textarea>
        @error('description') <span class="text-red-500">{{ $message }}</span> @enderror

        <select wire:model="category_id" class="border p-2 w-full rounded mb-2">
            <option value="">Select Category</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
        @error('category_id') <span class="text-red-500">{{ $message }}</span> @enderror

        <input type="number" step="0.01" wire:model="price" placeholder="Price" class="border p-2 w-full rounded mb-2">
        @error('price') <span class="text-red-500">{{ $message }}</span> @enderror

        <input type="number" wire:model="stock" placeholder="Stock" class="border p-2 w-full rounded mb-2">
        @error('stock') <span class="text-red-500">{{ $message }}</span> @enderror

        <input type="file" wire:model="image" class="border p-2 w-full rounded mb-2">
        @error('image') <span class="text-red-500">{{ $message }}</span> @enderror

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
        <a href="/products" class="ml-2">Cancel</a>
    </form>
</div>