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
        <option value="price_low">Price: Low to High</option
