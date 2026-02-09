{{-- TODO: Replace with real data from DB --}}
@php
    $categoryStats = [
        [
            'title' => 'Total Categories',
            'value' => '12',
            'change' => '+2.1%',
            'changeType' => 'up',
            'icon' => 'category',
            'note' => 'Active categories',
        ],
        [
            'title' => 'Total Products',
            'value' => '3,482',
            'change' => '+8.3%',
            'changeType' => 'up',
            'icon' => 'products',
            'note' => 'Across all categories',
        ],
        [
            'title' => 'Avg Products/Category',
            'value' => '290',
            'change' => '+1.5%',
            'changeType' => 'up',
            'icon' => 'avg',
            'note' => 'Per category',
        ],
        [
            'title' => 'Category Health',
            'value' => '94%',
            'change' => '+3.2%',
            'changeType' => 'up',
            'icon' => 'health',
            'note' => 'Overall rating',
        ],
    ];

    $categories = [
        [
            'id' => 'CAT-001',
            'name' => 'Breakfast & Cereals',
            'description' => 'Morning staples and grain-based products',
            'slug' => 'breakfast-cereals',
            'products' => 287,
            'image' => 'breakfast.jpg',
            'color' => 'orange',
            'status' => 'active',
            'visibility' => 'public',
            'featured' => true,
            'created' => 'Jan 15, 2025',
            'updated' => 'Feb 4, 2026',
        ],
        [
            'id' => 'CAT-002',
            'name' => 'Beverages & Coffee',
            'description' => 'Drinks and coffee products',
            'slug' => 'beverages-coffee',
            'products' => 156,
            'image' => 'beverages.jpg',
            'color' => 'blue',
            'status' => 'active',
            'visibility' => 'public',
            'featured' => true,
            'created' => 'Jan 10, 2025',
            'updated' => 'Feb 2, 2026',
        ],
        [
            'id' => 'CAT-003',
            'name' => 'Coffee Gear & Equipment',
            'description' => 'Coffee brewing equipment and accessories',
            'slug' => 'coffee-gear',
            'products' => 89,
            'image' => 'gear.jpg',
            'color' => 'amber',
            'status' => 'active',
            'visibility' => 'public',
            'featured' => false,
            'created' => 'Feb 1, 2025',
            'updated' => 'Feb 3, 2026',
        ],
        [
            'id' => 'CAT-004',
            'name' => 'Snacks & Protein',
            'description' => 'Healthy snacks and protein bars',
            'slug' => 'snacks-protein',
            'products' => 234,
            'image' => 'snacks.jpg',
            'color' => 'emerald',
            'status' => 'active',
            'visibility' => 'public',
            'featured' => false,
            'created' => 'Jan 20, 2025',
            'updated' => 'Feb 5, 2026',
        ],
        [
            'id' => 'CAT-005',
            'name' => 'Pantry Essentials',
            'description' => 'Kitchen staples and pantry items',
            'slug' => 'pantry-essentials',
            'products' => 445,
            'image' => 'pantry.jpg',
            'color' => 'purple',
            'status' => 'active',
            'visibility' => 'public',
            'featured' => false,
            'created' => 'Dec 20, 2024',
            'updated' => 'Feb 1, 2026',
        ],
        [
            'id' => 'CAT-006',
            'name' => 'Health & Wellness',
            'description' => 'Health supplements and wellness products',
            'slug' => 'health-wellness',
            'products' => 178,
            'image' => 'wellness.jpg',
            'color' => 'rose',
            'status' => 'active',
            'visibility' => 'public',
            'featured' => true,
            'created' => 'Jan 5, 2025',
            'updated' => 'Feb 4, 2026',
        ],
        [
            'id' => 'CAT-007',
            'name' => 'Organic & Natural',
            'description' => 'Certified organic and natural products',
            'slug' => 'organic-natural',
            'products' => 312,
            'image' => 'organic.jpg',
            'color' => 'lime',
            'status' => 'active',
            'visibility' => 'public',
            'featured' => false,
            'created' => 'Jan 25, 2025',
            'updated' => 'Feb 3, 2026',
        ],
        [
            'id' => 'CAT-008',
            'name' => 'Local Favorites',
            'description' => 'Products from local suppliers',
            'slug' => 'local-favorites',
            'products' => 198,
            'image' => 'local.jpg',
            'color' => 'cyan',
            'status' => 'active',
            'visibility' => 'public',
            'featured' => false,
            'created' => 'Feb 10, 2025',
            'updated' => 'Feb 5, 2026',
        ],
    ];

    $statusVariants = [
        'active' => 'success',
        'inactive' => 'neutral',
        'draft' => 'warning',
        'archived' => 'danger',
    ];

    $visibilityVariants = [
        'public' => 'success',
        'private' => 'warning',
        'hidden' => 'danger',
    ];

    $colorMap = [
        'orange' => 'bg-orange-100 text-orange-700 border-orange-200',
        'blue' => 'bg-blue-100 text-blue-700 border-blue-200',
        'amber' => 'bg-amber-100 text-amber-700 border-amber-200',
        'emerald' => 'bg-emerald-100 text-emerald-700 border-emerald-200',
        'purple' => 'bg-purple-100 text-purple-700 border-purple-200',
        'rose' => 'bg-rose-100 text-rose-700 border-rose-200',
        'lime' => 'bg-lime-100 text-lime-700 border-lime-200',
        'cyan' => 'bg-cyan-100 text-cyan-700 border-cyan-200',
    ];

    $bgColorMap = [
        'orange' => 'bg-orange-50',
        'blue' => 'bg-blue-50',
        'amber' => 'bg-amber-50',
        'emerald' => 'bg-emerald-50',
        'purple' => 'bg-purple-50',
        'rose' => 'bg-rose-50',
        'lime' => 'bg-lime-50',
        'cyan' => 'bg-cyan-50',
    ];
@endphp

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Categories - LocalMart Dashboard</title>

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
                    <h1 class="text-3xl font-bold text-slate-900">Categories</h1>
                    <p class="mt-2 text-sm text-slate-500">Organize and manage product categories</p>
                </div>
                <button class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M12 5v14" />
                        <path d="M5 12h14" />
                    </svg>
                    New Category
                </button>
            </section>

            <!-- Stats Cards -->
            <section class="mb-6 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                @foreach ($categoryStats as $card)
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
                                @case('category')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <rect x="3" y="3" width="8" height="8" />
                                        <rect x="13" y="3" width="8" height="8" />
                                        <rect x="3" y="13" width="8" height="8" />
                                        <rect x="13" y="13" width="8" height="8" />
                                    </svg>
                                    @break
                                @case('products')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M4 7l8-4 8 4v10l-8 4-8-4V7Z" />
                                    </svg>
                                    @break
                                @case('avg')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z" />
                                    </svg>
                                    @break
                                @case('health')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                                    </svg>
                                    @break
                            @endswitch
                        </x-slot>
                    </x-stat-card>
                @endforeach
            </section>

            <!-- Filters and Search -->
            <section class="mb-6">
                <x-chart-card class="px-6 py-4">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div class="flex flex-1 items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2.5">
                            <svg class="h-5 w-5 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                <circle cx="11" cy="11" r="8" />
                                <path d="m21 21-4.35-4.35" />
                            </svg>
                            <input type="text" placeholder="Search by category name or slug..." class="flex-1 bg-transparent text-sm focus:outline-none text-slate-900 placeholder-slate-500">
                        </div>

                        <div class="flex gap-2 flex-wrap">
                            <label class="flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2.5">
                                <svg class="h-4 w-4 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <path d="M12 3l9 16H3L12 3Z" />
                                </svg>
                                <select class="bg-transparent text-sm font-medium text-slate-600 focus:outline-none">
                                    <option>All Status</option>
                                    <option>Active</option>
                                    <option>Inactive</option>
                                    <option>Draft</option>
                                </select>
                            </label>

                            <label class="flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2.5">
                                <svg class="h-4 w-4 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <path d="M3 10h18M3 14h18" />
                                </svg>
                                <select class="bg-transparent text-sm font-medium text-slate-600 focus:outline-none">
                                    <option>All Visibility</option>
                                    <option>Public</option>
                                    <option>Private</option>
                                    <option>Hidden</option>
                                </select>
                            </label>

                            <label class="flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2.5">
                                <svg class="h-4 w-4 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <path d="M3 4a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4z" />
                                    <path d="M16 2v4M8 2v4M3 10h18" />
                                </svg>
                                <select class="bg-transparent text-sm font-medium text-slate-600 focus:outline-none">
                                    <option>All Featured</option>
                                    <option>Featured</option>
                                    <option>Not Featured</option>
                                </select>
                            </label>
                        </div>
                    </div>
                </x-chart-card>
            </section>

            <!-- Categories Grid -->
            <section>
                <x-chart-card title="All Categories" subtitle="Complete list of product categories">
                    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        @foreach ($categories as $category)
                            <div class="rounded-2xl border border-slate-100 bg-white transition hover:shadow-lg hover:border-slate-200 overflow-hidden group">
                                <!-- Category Image/Placeholder -->
                                <div class="relative aspect-video {{ $bgColorMap[$category['color']] ?? 'bg-slate-100' }} flex items-center justify-center overflow-hidden">
                                    <svg class="h-16 w-16 text-slate-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                        <rect x="3" y="3" width="8" height="8" />
                                        <rect x="13" y="3" width="8" height="8" />
                                        <rect x="3" y="13" width="8" height="8" />
                                        <rect x="13" y="13" width="8" height="8" />
                                    </svg>

                                    <!-- Featured Badge -->
                                    @if ($category['featured'])
                                        <div class="absolute top-2 right-2">
                                                    <span class="inline-flex items-center gap-1 rounded-full bg-amber-100 px-2 py-1 text-xs font-semibold text-amber-700 border border-amber-200">
                                                        <svg class="h-3 w-3" viewBox="0 0 24 24" fill="currentColor">
                                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                                        </svg>
                                                        Featured
                                                    </span>
                                        </div>
                                    @endif
                                </div>

                                <!-- Category Info -->
                                <div class="p-4">
                                    <!-- Category Name -->
                                    <h3 class="text-sm font-semibold text-slate-900 line-clamp-2">
                                        {{ $category['name'] }}
                                    </h3>

                                    <!-- Description -->
                                    <p class="mt-2 text-xs text-slate-500 line-clamp-2">
                                        {{ $category['description'] }}
                                    </p>

                                    <!-- Slug -->
                                    <p class="mt-2 text-xs text-slate-400 font-mono">
                                        /{{ $category['slug'] }}
                                    </p>

                                    <!-- Stats -->
                                    <div class="mt-3 flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <svg class="h-4 w-4 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                                <path d="M4 7l8-4 8 4v10l-8 4-8-4V7Z" />
                                            </svg>
                                            <span class="text-xs font-semibold text-slate-600">{{ $category['products'] }} items</span>
                                        </div>
                                    </div>

                                    <!-- Status & Visibility -->
                                    <div class="mt-3 flex gap-2">
                                        <x-status-badge
                                            variant="{{ $statusVariants[$category['status']] ?? 'neutral' }}"
                                            size="xs"
                                        >
                                            {{ ucfirst($category['status']) }}
                                        </x-status-badge>

                                        <x-status-badge
                                            variant="{{ $visibilityVariants[$category['visibility']] ?? 'neutral' }}"
                                            size="xs"
                                        >
                                            {{ ucfirst($category['visibility']) }}
                                        </x-status-badge>
                                    </div>

                                    <!-- Timestamps -->
                                    <div class="mt-3 flex flex-col gap-1 text-xs text-slate-400">
                                        <p>Created: {{ $category['created'] }}</p>
                                        <p>Updated: {{ $category['updated'] }}</p>
                                    </div>

                                    <!-- Actions -->
                                    <div class="mt-4 flex gap-2 opacity-0 transition group-hover:opacity-100">
                                        <button class="flex-1 rounded-lg bg-blue-50 py-2 text-xs font-semibold text-blue-600 transition hover:bg-blue-100">
                                            Edit
                                        </button>
                                        <button class="rounded-lg bg-slate-100 p-2 text-slate-600 transition hover:bg-slate-200" title="View Products">
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                <circle cx="12" cy="12" r="3" />
                                            </svg>
                                        </button>
                                        <div class="relative group/dropdown">
                                            <button
                                                class="rounded-lg bg-slate-100 p-2 text-slate-600 transition hover:bg-slate-200"
                                                title="More actions"
                                            >
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor">
                                                    <circle cx="12" cy="5" r="2" />
                                                    <circle cx="12" cy="12" r="2" />
                                                    <circle cx="12" cy="19" r="2" />
                                                </svg>
                                            </button>
                                            <div class="absolute right-0 top-full mt-1 hidden min-w-48 rounded-lg border border-slate-200 bg-white shadow-lg group-hover/dropdown:block z-10">
                                                <button class="block w-full px-4 py-2 text-left text-sm text-slate-700 hover:bg-slate-50 first:rounded-t-lg">
                                                            <span class="flex items-center gap-2">
                                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                                    <path d="M12 5v14M5 12h14" />
                                                                </svg>
                                                                View Products
                                                            </span>
                                                </button>
                                                <button class="block w-full px-4 py-2 text-left text-sm text-slate-700 hover:bg-slate-50">
                                                            <span class="flex items-center gap-2">
                                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z" />
                                                                </svg>
                                                                Edit Details
                                                            </span>
                                                </button>
                                                <button class="block w-full px-4 py-2 text-left text-sm text-slate-700 hover:bg-slate-50">
                                                            <span class="flex items-center gap-2">
                                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                                                                    <line x1="9" y1="9" x2="15" y2="9" />
                                                                    <line x1="9" y1="15" x2="15" y2="15" />
                                                                </svg>
                                                                Duplicate
                                                            </span>
                                                </button>
                                                <button class="block w-full px-4 py-2 text-left text-sm text-slate-700 hover:bg-slate-50">
                                                            <span class="flex items-center gap-2">
                                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                                    <path d="M3 6h18" />
                                                                    <path d="M8 6v12" />
                                                                    <path d="M16 6v12" />
                                                                    <path d="M6 9v6" />
                                                                    <path d="M12 9v6" />
                                                                    <path d="M18 9v6" />
                                                                </svg>
                                                                Manage Images
                                                            </span>
                                                </button>
                                                <button class="block w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50 last:rounded-b-lg">
                                                            <span class="flex items-center gap-2">
                                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                                    <polyline points="3 6 5 4 21 4 23 6" />
                                                                    <path d="M19 8v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8m3 0V6a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                                                </svg>
                                                                Delete Category
                                                            </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </x-chart-card>
            </section>

            <!-- Category Statistics Table -->
            <section class="mt-6">
                <x-chart-card title="Category Performance" subtitle="Detailed analytics per category">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                            <tr class="border-b border-slate-200 text-left text-xs font-semibold uppercase tracking-[0.1em] text-slate-500">
                                <th class="px-4 py-4">Category</th>
                                <th class="px-4 py-4">Products</th>
                                <th class="px-4 py-4">Status</th>
                                <th class="px-4 py-4">Visibility</th>
                                <th class="px-4 py-4">Featured</th>
                                <th class="px-4 py-4 text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200">
                            @foreach ($categories as $category)
                                <tr class="transition hover:bg-slate-50 group">
                                    <!-- Category Name -->
                                    <td class="px-4 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="h-10 w-10 rounded-lg {{ $bgColorMap[$category['color']] ?? 'bg-slate-100' }} flex items-center justify-center flex-shrink-0">
                                                <svg class="h-5 w-5 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                                    <rect x="3" y="3" width="8" height="8" />
                                                    <rect x="13" y="3" width="8" height="8" />
                                                    <rect x="3" y="13" width="8" height="8" />
                                                    <rect x="13" y="13" width="8" height="8" />
                                                </svg>
                                            </div>
                                            <div class="flex flex-col gap-1">
                                                <p class="text-sm font-semibold text-slate-900">{{ $category['name'] }}</p>
                                                <p class="text-xs text-slate-500">{{ $category['slug'] }}</p>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Products Count -->
                                    <td class="px-4 py-4">
                                                    <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-slate-100 text-sm font-semibold text-slate-600">
                                                        {{ $category['products'] }}
                                                    </span>
                                    </td>

                                    <!-- Status -->
                                    <td class="px-4 py-4">
                                        <x-status-badge
                                            variant="{{ $statusVariants[$category['status']] ?? 'neutral' }}"
                                            size="sm"
                                        >
                                            {{ ucfirst($category['status']) }}
                                        </x-status-badge>
                                    </td>

                                    <!-- Visibility -->
                                    <td class="px-4 py-4">
                                        <x-status-badge
                                            variant="{{ $visibilityVariants[$category['visibility']] ?? 'neutral' }}"
                                            size="sm"
                                        >
                                            {{ ucfirst($category['visibility']) }}
                                        </x-status-badge>
                                    </td>

                                    <!-- Featured -->
                                    <td class="px-4 py-4">
                                        <div class="flex items-center justify-center">
                                            @if ($category['featured'])
                                                <div class="flex items-center gap-1 text-amber-600">
                                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor">
                                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                                    </svg>
                                                    <span class="text-xs font-semibold">Yes</span>
                                                </div>
                                            @else
                                                <span class="text-xs font-semibold text-slate-400">No</span>
                                            @endif
                                        </div>
                                    </td>

                                    <!-- Actions -->
                                    <td class="px-4 py-4 text-right">
                                        <div class="flex items-center justify-end gap-2 opacity-0 transition group-hover:opacity-100">
                                            <button
                                                class="inline-flex items-center justify-center h-8 w-8 rounded-lg text-slate-500 hover:bg-slate-100 hover:text-slate-700 transition"
                                                title="Edit"
                                            >
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z" />
                                                </svg>
                                            </button>
                                            <button
                                                class="inline-flex items-center justify-center h-8 w-8 rounded-lg text-slate-500 hover:bg-slate-100 hover:text-slate-700 transition"
                                                title="View Products"
                                            >
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                    <circle cx="12" cy="12" r="3" />
                                                </svg>
                                            </button>
                                            <div class="relative group/dropdown">
                                                <button
                                                    class="inline-flex items-center justify-center h-8 w-8 rounded-lg text-slate-500 hover:bg-slate-100 hover:text-slate-700 transition"
                                                    title="More"
                                                >
                                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor">
                                                        <circle cx="12" cy="5" r="2" />
                                                        <circle cx="12" cy="12" r="2" />
                                                        <circle cx="12" cy="19" r="2" />
                                                    </svg>
                                                </button>
                                                <div class="absolute right-0 top-full mt-1 hidden min-w-48 rounded-lg border border-slate-200 bg-white shadow-lg group-hover/dropdown:block z-10">
                                                    <button class="block w-full px-4 py-2 text-left text-sm text-slate-700 hover:bg-slate-50 first:rounded-t-lg">
                                                        Duplicate
                                                    </button>
                                                    <button class="block w-full px-4 py-2 text-left text-sm text-slate-700 hover:bg-slate-50">
                                                        Manage Images
                                                    </button>
                                                    <button class="block w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50 last:rounded-b-lg">
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6 flex items-center justify-between border-t border-slate-200 pt-6">
                        <div class="flex items-center gap-2">
                            <p class="text-xs text-slate-500">Showing</p>
                            <select class="rounded border border-slate-200 bg-white px-2 py-1 text-xs font-medium text-slate-600 focus:outline-none">
                                <option>10</option>
                                <option>25</option>
                                <option>50</option>
                            </select>
                            <p class="text-xs text-slate-500">of 12 categories</p>
                        </div>

                        <div class="flex items-center gap-1">
                            <button class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 text-slate-600 transition hover:border-slate-300 hover:text-slate-900">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                            <button class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 bg-blue-50 text-sm font-semibold text-blue-600">1</button>
                            <button class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 text-slate-600 transition hover:border-slate-300 hover:text-slate-900">2</button>
                            <button class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 text-slate-600 transition hover:border-slate-300 hover:text-slate-900">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M9 19l7-7-7-7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </x-chart-card>
            </section>
        </main>
    </div>
</div>
</body>
</html>
