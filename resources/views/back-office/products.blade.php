{{-- TODO: Replace with real data from DB --}}
@php
    $productStats = [
        [
            'title' => 'Total Products',
            'value' => '3,482',
            'change' => '+3.2%',
            'changeType' => 'up',
            'icon' => 'products',
            'note' => 'Active SKUs',
        ],
        [
            'title' => 'Low Stock Items',
            'value' => '64',
            'change' => '-4.5%',
            'changeType' => 'down',
            'icon' => 'stock',
            'note' => 'Needs reorder',
        ],
        [
            'title' => 'Categories',
            'value' => '12',
            'change' => '+2.1%',
            'changeType' => 'up',
            'icon' => 'category',
            'note' => 'Active categories',
        ],
        [
            'title' => 'Avg Rating',
            'value' => '4.8/5',
            'change' => '+0.2',
            'changeType' => 'up',
            'icon' => 'rating',
            'note' => 'Customer reviews',
        ],
    ];

    $products = [
        [
            'id' => 'PRD-001',
            'name' => 'Organic Maple Granola',
            'category' => 'Breakfast',
            'sku' => 'LM-OG-112',
            'stock' => 12,
            'price' => '$12.99',
            'rating' => 4.8,
            'reviews' => 142,
            'status' => 'active',
        ],
        [
            'id' => 'PRD-002',
            'name' => 'Cold Brew Concentrate',
            'category' => 'Beverages',
            'sku' => 'LM-CB-209',
            'stock' => 8,
            'price' => '$18.50',
            'rating' => 4.9,
            'reviews' => 98,
            'status' => 'active',
        ],
        [
            'id' => 'PRD-003',
            'name' => 'Ceramic Pour-Over Kit',
            'category' => 'Coffee Gear',
            'sku' => 'LM-CK-057',
            'stock' => 6,
            'price' => '$34.99',
            'rating' => 4.7,
            'reviews' => 67,
            'status' => 'active',
        ],
        [
            'id' => 'PRD-004',
            'name' => 'Almond Protein Bars',
            'category' => 'Snacks',
            'sku' => 'LM-AP-443',
            'stock' => 14,
            'price' => '$8.99',
            'rating' => 4.5,
            'reviews' => 234,
            'status' => 'active',
        ],
        [
            'id' => 'PRD-005',
            'name' => 'Artisan Honey Blend',
            'category' => 'Pantry',
            'sku' => 'LM-HB-501',
            'stock' => 0,
            'price' => '$16.99',
            'rating' => 4.9,
            'reviews' => 156,
            'status' => 'out-of-stock',
        ],
    ];

    $statusVariants = [
        'active' => 'success',
        'inactive' => 'neutral',
        'out-of-stock' => 'danger',
        'draft' => 'warning',
    ];

    $categoryColors = [
        'Breakfast' => 'bg-orange-100 text-orange-700',
        'Beverages' => 'bg-blue-100 text-blue-700',
        'Coffee Gear' => 'bg-amber-100 text-amber-700',
        'Snacks' => 'bg-emerald-100 text-emerald-700',
        'Pantry' => 'bg-purple-100 text-purple-700',
    ];
@endphp

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Products - LocalMart Dashboard</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=manrope:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen font-['Manrope'] text-slate-900 antialiased">
<div x-data="{ sidebarOpen: false }" class="relative min-h-screen bg-slate-50 [background-image:radial-gradient(900px_circle_at_8%_0%,rgba(56,189,248,0.12),transparent_55%),radial-gradient(800px_circle_at_92%_18%,rgba(249,115,22,0.12),transparent_55%)] lg:flex">
    @include('back-office.partials.sidebar')

    <div class="flex-1 min-w-0">
        @include('back-office.partials.navbar')

        <main class="px-6 pb-12 pt-0 lg:px-10">
            <!-- Header -->
            <section class="mb-8 flex items-center justify-between pt-6">
                <div>
                    <h1 class="text-3xl font-bold text-slate-900">Products</h1>
                    <p class="mt-2 text-sm text-slate-500">Manage your product catalog</p>
                </div>
                <button class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M12 5v14" />
                        <path d="M5 12h14" />
                    </svg>
                    Add Product
                </button>
            </section>

            <!-- Stats Cards -->
            <section class="mb-6 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                @foreach ($productStats as $card)
                    <x-stat-card
                        class="animate-lm-fade-up {{ 'lm-delay-' . ($loop->index + 1) }}"
                        title="{{ $card['title'] }}"
                        value="{{ $card['value'] }}"
                        change="{{ $card['change'] }}"
                        changeType="{{ $card['changeType'] }}"
                        note="{{ $card['note'] }}"
                    >
                        <x-slot name="icon">
                            @switch($card['icon'])
                                @case('products')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M4 7l8-4 8 4v10l-8 4-8-4V7Z" />
                                    </svg>
                                    @break
                                @case('stock')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M12 3l9 16H3L12 3Z" />
                                    </svg>
                                    @break
                                @case('category')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <rect x="3" y="3" width="8" height="8" />
                                        <rect x="13" y="3" width="8" height="8" />
                                        <rect x="3" y="13" width="8" height="8" />
                                        <rect x="13" y="13" width="8" height="8" />
                                    </svg>
                                    @break
                                @case('rating')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M12 3l2.8 5.6 6.2.9-4.5 4.3 1 6.1-5.5-2.9-5.5 2.9 1-6.1L3 9.5l6.2-.9L12 3Z" />
                                    </svg>
                                    @break
                            @endswitch
                        </x-slot>
                    </x-stat-card>
                @endforeach
            </section>

            <!-- Filters -->
            <section class="mb-6">
                <x-chart-card class="px-6 py-4">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div class="flex flex-1 items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2.5">
                            <svg class="h-5 w-5 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                <circle cx="11" cy="11" r="8" />
                                <path d="m21 21-4.35-4.35" />
                            </svg>
                            <input type="text" placeholder="Search by product name or SKU..." class="flex-1 bg-transparent text-sm focus:outline-none text-slate-900 placeholder-slate-500">
                        </div>

                        <div class="flex gap-2 flex-wrap">
                            <label class="flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2.5">
                                <svg class="h-4 w-4 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <rect x="3" y="3" width="8" height="8" />
                                </svg>
                                <select class="bg-transparent text-sm font-medium text-slate-600 focus:outline-none">
                                    <option>All Categories</option>
                                    <option>Breakfast</option>
                                    <option>Beverages</option>
                                    <option>Coffee Gear</option>
                                    <option>Snacks</option>
                                    <option>Pantry</option>
                                </select>
                            </label>

                            <label class="flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2.5">
                                <svg class="h-4 w-4 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <path d="M12 3l9 16H3L12 3Z" />
                                </svg>
                                <select class="bg-transparent text-sm font-medium text-slate-600 focus:outline-none">
                                    <option>All Status</option>
                                    <option>Active</option>
                                    <option>Inactive</option>
                                    <option>Out of Stock</option>
                                </select>
                            </label>
                        </div>
                    </div>
                </x-chart-card>
            </section>

            <!-- Products Grid -->
            <section>
                <x-chart-card title="Products Catalog">
                    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        @foreach ($products as $product)
                            <div class="rounded-lg border border-slate-200 bg-white transition hover:shadow-md hover:border-slate-300 overflow-hidden group">
                                <!-- Product Image Placeholder -->
                                <div class="aspect-square bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center">
                                    <svg class="h-12 w-12 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                        <path d="M4 7l8-4 8 4v10l-8 4-8-4V7Z" />
                                    </svg>
                                </div>

                                <!-- Product Info -->
                                <div class="p-4">
                                    <!-- Category Badge -->
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold {{ $categoryColors[$product['category']] ?? 'bg-slate-100 text-slate-700' }}">
                                                {{ $product['category'] }}
                                            </span>

                                    <!-- Product Name -->
                                    <h3 class="mt-3 text-sm font-semibold text-slate-900 line-clamp-2">
                                        {{ $product['name'] }}
                                    </h3>

                                    <!-- SKU -->
                                    <p class="mt-1 text-xs text-slate-500">{{ $product['sku'] }}</p>

                                    <!-- Rating -->
                                    <div class="mt-3 flex items-center gap-2">
                                        <div class="flex items-center gap-0.5">
                                            @for ($i = 0; $i < 5; $i++)
                                                <svg class="h-3.5 w-3.5 {{ $i < floor($product['rating']) ? 'text-amber-400' : 'text-slate-300' }}" viewBox="0 0 24 24" fill="currentColor">
                                                    <path d="M12 3l2.8 5.6 6.2.9-4.5 4.3 1 6.1-5.5-2.9-5.5 2.9 1-6.1L3 9.5l6.2-.9L12 3Z" />
                                                </svg>
                                            @endfor
                                        </div>
                                        <span class="text-xs text-slate-500">({{ $product['reviews'] }})</span>
                                    </div>

                                    <!-- Price & Stock -->
                                    <div class="mt-3 flex items-center justify-between">
                                        <p class="text-sm font-bold text-slate-900">{{ $product['price'] }}</p>
                                        <span class="inline-flex h-6 w-6 items-center justify-center rounded-full text-xs font-semibold {{ $product['stock'] <= 10 ? 'bg-red-100 text-red-700' : 'bg-emerald-100 text-emerald-700' }}">
                                                    {{ $product['stock'] }}
                                                </span>
                                    </div>

                                    <!-- Status -->
                                    <div class="mt-3">
                                        <x-status-badge variant="{{ $statusVariants[$product['status']] ?? 'neutral' }}" size="xs">
                                            {{ ucfirst(str_replace('-', ' ', $product['status'])) }}
                                        </x-status-badge>
                                    </div>

                                    <!-- Actions -->
                                    <div class="mt-3 flex gap-2 opacity-0 transition group-hover:opacity-100">
                                        <button class="flex-1 rounded-lg bg-blue-50 py-2 text-xs font-semibold text-blue-600 transition hover:bg-blue-100">
                                            Edit
                                        </button>
                                        <button class="rounded-lg bg-slate-100 p-2 text-slate-600 transition hover:bg-slate-200">
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <polyline points="3 6 5 4 21 4 23 6" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </x-chart-card>
            </section>
        </main>
    </div>
</div>
</body>
</html>
