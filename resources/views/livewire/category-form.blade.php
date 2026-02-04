<div class="p-6 max-w-md">
    <h1 class="text-2xl mb-4">{{ $categoryId ? 'Edit' : 'Create' }} Category</h1>

    <form wire:submit.prevent="save">
        <input type="text" wire:model="name" placeholder="Name" class="border p-2 w-full rounded mb-2">
        @error('name') <span class="text-red-500">{{ $message }}</span> @enderror

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
        <a href="/categories" class="ml-2">Cancel</a>
    </form>
</div>