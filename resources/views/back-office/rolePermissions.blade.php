{{-- TODO: Replace with real data from DB --}}
@php
    $roleStats = [
        [
            'title' => 'Total Roles',
            'value' => '5',
            'change' => '+0.0%',
            'changeType' => 'up',
            'icon' => 'roles',
            'note' => 'Active roles',
        ],
        [
            'title' => 'Permissions',
            'value' => '28',
            'change' => '+4.3%',
            'changeType' => 'up',
            'icon' => 'permissions',
            'note' => 'System permissions',
        ],
        [
            'title' => 'Users with Admin',
            'value' => '3',
            'change' => '+1.0%',
            'changeType' => 'up',
            'icon' => 'admin',
            'note' => 'Admin users',
        ],
        [
            'title' => 'Last Update',
            'value' => 'Today',
            'change' => 'Just now',
            'changeType' => 'up',
            'icon' => 'update',
            'note' => 'Permissions updated',
        ],
    ];

    $roles = [
        [
            'id' => 'ROLE-001',
            'name' => 'Admin',
            'description' => 'Full system access and control',
            'users' => 3,
            'color' => 'red',
            'permissions' => ['view.all', 'create.all', 'edit.all', 'delete.all', 'manage.users', 'manage.roles', 'manage.permissions'],
            'created' => 'Sep 1, 2024',
            'updated' => 'Feb 4, 2026',
        ],
        [
            'id' => 'ROLE-002',
            'name' => 'Seller',
            'description' => 'Can manage own products and orders',
            'users' => 45,
            'color' => 'amber',
            'permissions' => ['view.own', 'create.products', 'edit.own', 'delete.own', 'view.orders'],
            'created' => 'Sep 5, 2024',
            'updated' => 'Feb 2, 2026',
        ],
        [
            'id' => 'ROLE-003',
            'name' => 'Moderator',
            'description' => 'Can moderate content and users',
            'users' => 5,
            'color' => 'emerald',
            'permissions' => ['view.all', 'edit.reviews', 'delete.reviews', 'suspend.users', 'view.reports'],
            'created' => 'Sep 10, 2024',
            'updated' => 'Jan 28, 2026',
        ],
        [
            'id' => 'ROLE-004',
            'name' => 'Customer',
            'description' => 'Regular customer account',
            'users' => 4223,
            'color' => 'blue',
            'permissions' => ['view.catalog', 'create.reviews', 'place.orders', 'view.own.orders', 'manage.account'],
            'created' => 'Sep 15, 2024',
            'updated' => 'Feb 3, 2026',
        ],
        [
            'id' => 'ROLE-005',
            'name' => 'Guest',
            'description' => 'Limited anonymous access',
            'users' => 0,
            'color' => 'slate',
            'permissions' => ['view.catalog'],
            'created' => 'Sep 20, 2024',
            'updated' => 'Jan 15, 2026',
        ],
    ];

    $allPermissions = [
        // View
        ['name' => 'view.catalog', 'category' => 'View', 'description' => 'View product catalog'],
        ['name' => 'view.all', 'category' => 'View', 'description' => 'View all content'],
        ['name' => 'view.own', 'category' => 'View', 'description' => 'View own content'],
        ['name' => 'view.orders', 'category' => 'View', 'description' => 'View orders'],
        ['name' => 'view.own.orders', 'category' => 'View', 'description' => 'View own orders'],
        ['name' => 'view.reports', 'category' => 'View', 'description' => 'View reports'],

        // Create
        ['name' => 'create.all', 'category' => 'Create', 'description' => 'Create any content'],
        ['name' => 'create.products', 'category' => 'Create', 'description' => 'Create products'],
        ['name' => 'create.reviews', 'category' => 'Create', 'description' => 'Create reviews'],
        ['name' => 'place.orders', 'category' => 'Create', 'description' => 'Place orders'],

        // Edit
        ['name' => 'edit.all', 'category' => 'Edit', 'description' => 'Edit any content'],
        ['name' => 'edit.own', 'category' => 'Edit', 'description' => 'Edit own content'],
        ['name' => 'edit.reviews', 'category' => 'Edit', 'description' => 'Edit reviews'],

        // Delete
        ['name' => 'delete.all', 'category' => 'Delete', 'description' => 'Delete any content'],
        ['name' => 'delete.own', 'category' => 'Delete', 'description' => 'Delete own content'],
        ['name' => 'delete.reviews', 'category' => 'Delete', 'description' => 'Delete reviews'],

        // Manage
        ['name' => 'manage.users', 'category' => 'Manage', 'description' => 'Manage users'],
        ['name' => 'manage.roles', 'category' => 'Manage', 'description' => 'Manage roles'],
        ['name' => 'manage.permissions', 'category' => 'Manage', 'description' => 'Manage permissions'],
        ['name' => 'manage.account', 'category' => 'Manage', 'description' => 'Manage own account'],

        // Moderation
        ['name' => 'suspend.users', 'category' => 'Moderation', 'description' => 'Suspend users'],
        ['name' => 'ban.users', 'category' => 'Moderation', 'description' => 'Ban users'],
        ['name' => 'approve.content', 'category' => 'Moderation', 'description' => 'Approve content'],
        ['name' => 'reject.content', 'category' => 'Moderation', 'description' => 'Reject content'],
    ];

    $colorMap = [
        'red' => 'bg-red-100 text-red-700 border-red-200',
        'amber' => 'bg-amber-100 text-amber-700 border-amber-200',
        'emerald' => 'bg-emerald-100 text-emerald-700 border-emerald-200',
        'blue' => 'bg-blue-100 text-blue-700 border-blue-200',
        'slate' => 'bg-slate-100 text-slate-700 border-slate-200',
    ];
@endphp

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Roles & Permissions - LocalMart Dashboard</title>

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
                    <h1 class="text-3xl font-bold text-slate-900">Roles & Permissions</h1>
                    <p class="mt-2 text-sm text-slate-500">Manage user roles and system permissions</p>
                </div>
                <button class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M12 5v14" />
                        <path d="M5 12h14" />
                    </svg>
                    New Role
                </button>
            </section>

            <!-- Stats Cards -->
            <section class="mb-6 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                @foreach ($roleStats as $card)
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
                                @case('roles')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                        <circle cx="9" cy="7" r="4" />
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                    </svg>
                                    @break
                                @case('permissions')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                                    </svg>
                                    @break
                                @case('admin')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M12 3l9 2v9c0 7-9 11-9 11s-9-4-9-11V5l9-2z" />
                                        <path d="M10 17l-3-3 1-1 2 2 4-4 1 1-5 5z" />
                                    </svg>
                                    @break
                                @case('update')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M21.5 2v6h-6M2.5 22v-6h6M2 11.5a10 10 0 0 1 18.8-4.3M22 12.5a10 10 0 0 1-18.8 4.2" />
                                    </svg>
                                    @break
                            @endswitch
                        </x-slot>
                    </x-stat-card>
                @endforeach
            </section>

            <!-- Tabs -->
            <section class="mb-6">
                <div class="border-b border-slate-200">
                    <div class="flex gap-8 px-6 py-4">
                        <button class="text-sm font-semibold text-blue-600 border-b-2 border-blue-600 pb-4 -mb-4">Roles</button>
                        <button class="text-sm font-semibold text-slate-600 hover:text-slate-900">Permissions</button>
                    </div>
                </div>
            </section>

            <!-- Roles Section -->
            <section>
                <x-chart-card title="System Roles" subtitle="Manage user roles and assign permissions">
                    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($roles as $role)
                            <div class="rounded-lg border border-slate-200 bg-white transition hover:shadow-md hover:border-slate-300 overflow-hidden group">
                                <!-- Header -->
                                <div class="p-4 {{ $colorMap[$role['color']] ?? 'bg-slate-100' }}">
                                    <div class="flex items-start justify-between">
                                        <div>
                                            <h3 class="text-sm font-semibold">{{ $role['name'] }}</h3>
                                            <p class="mt-1 text-xs text-slate-600">{{ $role['description'] }}</p>
                                        </div>
                                        <span class="text-xs font-bold rounded-full h-6 w-6 flex items-center justify-center bg-white/50">
                                                    {{ $role['users'] }}
                                                </span>
                                    </div>
                                </div>

                                <!-- Permissions -->
                                <div class="p-4 border-t border-slate-200">
                                    <p class="text-xs font-semibold text-slate-500 mb-3">Permissions ({{ count($role['permissions']) }})</p>
                                    <div class="space-y-2">
                                        @foreach (array_slice($role['permissions'], 0, 3) as $permission)
                                            <div class="flex items-center gap-2">
                                                <svg class="h-3 w-3 text-emerald-600" viewBox="0 0 24 24" fill="currentColor">
                                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z" />
                                                </svg>
                                                <span class="text-xs text-slate-600">{{ $permission }}</span>
                                            </div>
                                        @endforeach
                                        @if (count($role['permissions']) > 3)
                                            <p class="text-xs text-slate-500 mt-2">+{{ count($role['permissions']) - 3 }} more</p>
                                        @endif
                                    </div>
                                </div>

                                <!-- Footer -->
                                <div class="p-4 bg-slate-50 border-t border-slate-200 flex items-center justify-between">
                                    <div class="text-xs text-slate-500">
                                        <p>Updated {{ $role['updated'] }}</p>
                                    </div>
                                    <div class="flex gap-2 opacity-0 transition group-hover:opacity-100">
                                        <button class="inline-flex items-center justify-center h-8 w-8 rounded-lg text-slate-500 hover:bg-white hover:text-slate-700 transition">
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z" />
                                            </svg>
                                        </button>
                                        @if ($role['name'] !== 'Admin' && $role['name'] !== 'Customer')
                                            <button class="inline-flex items-center justify-center h-8 w-8 rounded-lg text-slate-500 hover:bg-red-50 hover:text-red-600 transition">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <polyline points="3 6 5 4 21 4 23 6" />
                                                    <path d="M19 8v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8m3 0V6a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                                </svg>
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </x-chart-card>
            </section>

            <!-- Permissions Reference -->
            <section class="mt-6">
                <x-chart-card title="Available Permissions" subtitle="Complete list of system permissions">
                    <div class="space-y-6">
                        @php
                            $groupedPermissions = collect($allPermissions)->groupBy('category');
                        @endphp

                        @foreach ($groupedPermissions as $category => $permissions)
                            <div>
                                <h4 class="text-sm font-semibold text-slate-900 mb-3 flex items-center gap-2">
                                    <span class="h-2 w-2 rounded-full bg-blue-600"></span>
                                    {{ $category }}
                                </h4>
                                <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
                                    @foreach ($permissions as $permission)
                                        <div class="flex items-start gap-3 p-3 rounded-lg bg-slate-50 border border-slate-200 hover:border-slate-300 transition">
                                            <svg class="h-4 w-4 text-blue-600 flex-shrink-0 mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <circle cx="12" cy="12" r="10" />
                                                <path d="M8 12h8" />
                                            </svg>
                                            <div>
                                                <p class="text-xs font-semibold text-slate-900">{{ $permission['name'] }}</p>
                                                <p class="text-xs text-slate-500">{{ $permission['description'] }}</p>
                                            </div>
                                        </div>
                                    @endforeach
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
