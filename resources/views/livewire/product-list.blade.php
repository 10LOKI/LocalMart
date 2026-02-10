<div class="py-6">
    @if(session('message'))
        <div class="mb-4 rounded-lg bg-green-50 p-4 text-green-800">
            {{ session('message') }}
        </div>
    @endif

    <!-- Header with Add Button -->
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold text-slate-900">Products</h1>
        <a href="{{ route('backoffice.products.create') }}" class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700">
            + Add Product
        </a>
    </div>

    <!-- Filters -->
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center">
        <div class="flex flex-1 items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2.5">
            <svg class="h-5 w-5 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                <circle cx="11" cy="11" r="8" />
                <path d="m21 21-4.35-4.35" />
            </svg>
            <input type="text" wire:model.live="search" placeholder="Search products..." class="flex-1 bg-transparent text-sm focus:outline-none text-slate-900 placeholder-slate-500">
        </div>

        <select wire:model.live="selectedCategory" class="rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-sm font-medium text-slate-600 focus:outline-none">
            <option value="">All Categories</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <select wire:model.live="sortBy" class="rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-sm font-medium text-slate-600 focus:outline-none">
            <option value="newest">Newest First</option>
            <option value="price_low">Price: Low to High</option>
            <option value="price_high">Price: High to Low</option>
            <option value="name">Name A-Z</option>
        </select>
    </div>

    <!-- Products Table -->
    <div class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow">
        <table class="min-w-full divide-y divide-slate-200">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">Product</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">Price</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">Stock</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 bg-white">
                @forelse($products as $product)
                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                @if($product->photos && $product->photos->count() > 0)
                                    <img src="{{ Storage::url($product->photos->first()->image) }}" alt="{{ $product->name }}" class="h-10 w-10 rounded object-cover">
                                @else
                                    <div class="flex h-10 w-10 items-center justify-center rounded bg-slate-200">
                                        <svg class="h-6 w-6 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M4 7l8-4 8 4v10l-8 4-8-4V7Z" />
                                        </svg>
                                    </div>
                                @endif
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-slate-900">{{ $product->name }}</div>
                                    <div class="text-sm text-slate-500">{{ Str::limit($product->description, 50) }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-900">
                            {{ $product->category->name ?? 'N/A' }}
                        </td>
                        <td class="px-6 py-4 text-sm font-semibold text-slate-900">
                            ${{ number_format($product->price, 2) }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex rounded-full px-2 py-1 text-xs font-semibold {{ $product->stock <= 10 ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                {{ $product->stock }} units
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <div class="flex gap-2">
                                <a href="{{ route('backoffice.products.edit', $product->id) }}" class="text-blue-600 hover:text-blue-900">
                                    Edit
                                </a>
                                <button wire:click="delete({{ $product->id }})" onclick="return confirm('Are you sure you want to delete this product?')" class="text-red-600 hover:text-red-900">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-sm text-slate-500">
                            No products found. <a href="{{ route('backoffice.products.create') }}" class="text-blue-600 hover:text-blue-900">Add your first product</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
