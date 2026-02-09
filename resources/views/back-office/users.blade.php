{{-- TODO: Replace with real data from DB --}}
@php
    $userStats = [
        [
            'title' => 'Total Users',
            'value' => '4,823',
            'change' => '+5.2%',
            'changeType' => 'up',
            'icon' => 'users',
            'note' => 'Registered users',
        ],
        [
            'title' => 'Active Users',
            'value' => '3,247',
            'change' => '+8.1%',
            'changeType' => 'up',
            'icon' => 'active',
            'note' => 'This month',
        ],
        [
            'title' => 'New Users',
            'value' => '342',
            'change' => '+12.3%',
            'changeType' => 'up',
            'icon' => 'new',
            'note' => 'This month',
        ],
        [
            'title' => 'Suspended',
            'value' => '23',
            'change' => '-2.1%',
            'changeType' => 'down',
            'icon' => 'suspended',
            'note' => 'Flagged users',
        ],
    ];

    $users = [
        [
            'id' => 'USR-4823',
            'name' => 'Emma Wilson',
            'email' => 'emma.wilson@example.com',
            'phone' => '+1 (555) 123-4567',
            'role' => 'customer',
            'status' => 'active',
            'joined' => 'Jan 15, 2025',
            'lastLogin' => 'Feb 5, 2026',
            'orders' => 12,
            'totalSpent' => '$1,245.67',
            'avatar' => 'EW',
            'verified' => true,
        ],
        [
            'id' => 'USR-4822',
            'name' => 'James Chen',
            'email' => 'james.chen@example.com',
            'phone' => '+1 (555) 234-5678',
            'role' => 'seller',
            'status' => 'active',
            'joined' => 'Dec 10, 2024',
            'lastLogin' => 'Feb 4, 2026',
            'orders' => 0,
            'totalSpent' => '$0.00',
            'avatar' => 'JC',
            'verified' => true,
        ],
        [
            'id' => 'USR-4821',
            'name' => 'Sarah Martinez',
            'email' => 'sarah.martinez@example.com',
            'phone' => '+1 (555) 345-6789',
            'role' => 'customer',
            'status' => 'active',
            'joined' => 'Nov 20, 2024',
            'lastLogin' => 'Feb 3, 2026',
            'orders' => 28,
            'totalSpent' => '$3,456.89',
            'avatar' => 'SM',
            'verified' => true,
        ],
        [
            'id' => 'USR-4820',
            'name' => 'Michael Johnson',
            'email' => 'michael.j@example.com',
            'phone' => '+1 (555) 456-7890',
            'role' => 'admin',
            'status' => 'active',
            'joined' => 'Sep 5, 2024',
            'lastLogin' => 'Feb 5, 2026',
            'orders' => 5,
            'totalSpent' => '$567.89',
            'avatar' => 'MJ',
            'verified' => true,
        ],
        [
            'id' => 'USR-4819',
            'name' => 'Lisa Anderson',
            'email' => 'lisa.anderson@example.com',
            'phone' => '+1 (555) 567-8901',
            'role' => 'customer',
            'status' => 'inactive',
            'joined' => 'Oct 1, 2024',
            'lastLogin' => 'Jan 12, 2026',
            'orders' => 3,
            'totalSpent' => '$234.56',
            'avatar' => 'LA',
            'verified' => false,
        ],
        [
            'id' => 'USR-4818',
            'name' => 'Robert Taylor',
            'email' => 'robert.taylor@example.com',
            'phone' => '+1 (555) 678-9012',
            'role' => 'customer',
            'status' => 'suspended',
            'joined' => 'Aug 15, 2024',
            'lastLogin' => 'Jan 20, 2026',
            'orders' => 0,
            'totalSpent' => '$0.00',
            'avatar' => 'RT',
            'verified' => true,
        ],
        [
            'id' => 'USR-4817',
            'name' => 'Jessica Brown',
            'email' => 'jessica.brown@example.com',
            'phone' => '+1 (555) 789-0123',
            'role' => 'moderator',
            'status' => 'active',
            'joined' => 'Sep 20, 2024',
            'lastLogin' => 'Feb 5, 2026',
            'orders' => 7,
            'totalSpent' => '$678.90',
            'avatar' => 'JB',
            'verified' => true,
        ],
        [
            'id' => 'USR-4816',
            'name' => 'David Lee',
            'email' => 'david.lee@example.com',
            'phone' => '+1 (555) 890-1234',
            'role' => 'seller',
            'status' => 'active',
            'joined' => 'Oct 25, 2024',
            'lastLogin' => 'Feb 2, 2026',
            'orders' => 0,
            'totalSpent' => '$0.00',
            'avatar' => 'DL',
            'verified' => true,
        ],
    ];

    $statusVariants = [
        'active' => 'success',
        'inactive' => 'neutral',
        'suspended' => 'danger',
    ];

    $roleVariants = [
        'customer' => 'info',
        'seller' => 'warning',
        'admin' => 'danger',
        'moderator' => 'success',
    ];

    $avatarColors = [
        'EW' => 'bg-blue-500',
        'JC' => 'bg-emerald-500',
        'SM' => 'bg-purple-500',
        'MJ' => 'bg-amber-500',
        'LA' => 'bg-rose-500',
        'RT' => 'bg-cyan-500',
        'JB' => 'bg-lime-500',
        'DL' => 'bg-indigo-500',
    ];
@endphp

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Users - LocalMart Dashboard</title>

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
                    <h1 class="text-3xl font-bold text-slate-900">Users</h1>
                    <p class="mt-2 text-sm text-slate-500">Manage user accounts and permissions</p>
                </div>
                <button class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M12 5v14" />
                        <path d="M5 12h14" />
                    </svg>
                    Add User
                </button>
            </section>

            <!-- Stats Cards -->
            <section class="mb-6 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                @foreach ($userStats as $card)
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
                                @case('users')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                        <circle cx="9" cy="7" r="4" />
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                    </svg>
                                    @break
                                @case('active')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                                    </svg>
                                    @break
                                @case('new')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z" />
                                    </svg>
                                    @break
                                @case('suspended')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <circle cx="12" cy="12" r="10" />
                                        <line x1="8" y1="12" x2="16" y2="12" />
                                    </svg>
                                    @break
                            @endswitch
                        </x-slot>
                    </x-stat-card>
                @endforeach
            </section>

            <!-- Filters and Search -->
            <section class="mb-6">
                <div class="rounded-2xl border border-slate-200 bg-white px-6 py-4">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div class="flex flex-1 items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2.5">
                            <svg class="h-5 w-5 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                <circle cx="11" cy="11" r="8" />
                                <path d="m21 21-4.35-4.35" />
                            </svg>
                            <input type="text" placeholder="Search by name, email or ID..." class="flex-1 bg-transparent text-sm focus:outline-none text-slate-900 placeholder-slate-500">
                        </div>

                        <div class="flex gap-2 flex-wrap">
                            <label class="flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2.5">
                                <svg class="h-4 w-4 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <path d="M12 3l9 16H3L12 3Z" />
                                </svg>
                                <select class="bg-transparent text-sm font-medium text-slate-600 focus:outline-none">
                                    <option>All Roles</option>
                                    <option>Admin</option>
                                    <option>Seller</option>
                                    <option>Moderator</option>
                                    <option>Customer</option>
                                </select>
                            </label>

                            <label class="flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2.5">
                                <svg class="h-4 w-4 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z" />
                                </svg>
                                <select class="bg-transparent text-sm font-medium text-slate-600 focus:outline-none">
                                    <option>All Status</option>
                                    <option>Active</option>
                                    <option>Inactive</option>
                                    <option>Suspended</option>
                                </select>
                            </label>

                            <label class="flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2.5">
                                <svg class="h-4 w-4 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <rect x="3" y="5" width="18" height="16" rx="2" />
                                    <path d="M16 3v4" />
                                    <path d="M8 3v4" />
                                    <path d="M3 11h18" />
                                </svg>
                                <select class="bg-transparent text-sm font-medium text-slate-600 focus:outline-none">
                                    <option>Joined Anytime</option>
                                    <option>This Month</option>
                                    <option>Last 3 Months</option>
                                    <option>Last 6 Months</option>
                                </select>
                            </label>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Users Table -->
            <section>
                <x-chart-card title="All Users" subtitle="User management and access control">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                            <tr class="border-b border-slate-200 text-left text-xs font-semibold uppercase tracking-[0.1em] text-slate-500">
                                <th class="px-4 py-4">User</th>
                                <th class="px-4 py-4">Email</th>
                                <th class="px-4 py-4">Role</th>
                                <th class="px-4 py-4">Status</th>
                                <th class="px-4 py-4">Orders</th>
                                <th class="px-4 py-4">Spent</th>
                                <th class="px-4 py-4">Joined</th>
                                <th class="px-4 py-4">Last Login</th>
                                <th class="px-4 py-4 text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200">
                            @foreach ($users as $user)
                                <tr class="transition hover:bg-slate-50 group">
                                    <!-- User -->
                                    <td class="px-4 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="h-10 w-10 rounded-full {{ $avatarColors[$user['avatar']] ?? 'bg-slate-300' }} flex items-center justify-center text-xs font-bold text-white">
                                                {{ $user['avatar'] }}
                                            </div>
                                            <div>
                                                <p class="text-sm font-semibold text-slate-900">{{ $user['name'] }}</p>
                                                <p class="text-xs text-slate-500">{{ $user['id'] }}</p>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Email -->
                                    <td class="px-4 py-4">
                                        <p class="text-sm text-slate-600">{{ $user['email'] }}</p>
                                    </td>

                                    <!-- Role -->
                                    <td class="px-4 py-4">
                                        <x-status-badge
                                            variant="{{ $roleVariants[$user['role']] ?? 'neutral' }}"
                                            size="sm"
                                        >
                                            {{ ucfirst($user['role']) }}
                                        </x-status-badge>
                                    </td>

                                    <!-- Status -->
                                    <td class="px-4 py-4">
                                        <div class="flex items-center gap-2">
                                            <x-status-badge
                                                variant="{{ $statusVariants[$user['status']] ?? 'neutral' }}"
                                                size="sm"
                                            >
                                                {{ ucfirst($user['status']) }}
                                            </x-status-badge>
                                            @if ($user['verified'])
                                                <svg class="h-4 w-4 text-emerald-600" viewBox="0 0 24 24" fill="currentColor">
                                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z" />
                                                </svg>
                                            @endif
                                        </div>
                                    </td>

                                    <!-- Orders -->
                                    <td class="px-4 py-4">
                                                    <span class="inline-flex h-6 w-12 items-center justify-center rounded-full bg-slate-100 text-xs font-semibold text-slate-600">
                                                        {{ $user['orders'] }}
                                                    </span>
                                    </td>

                                    <!-- Spent -->
                                    <td class="px-4 py-4">
                                        <p class="text-sm font-semibold text-slate-900">{{ $user['totalSpent'] }}</p>
                                    </td>

                                    <!-- Joined -->
                                    <td class="px-4 py-4">
                                        <p class="text-xs text-slate-500">{{ $user['joined'] }}</p>
                                    </td>

                                    <!-- Last Login -->
                                    <td class="px-4 py-4">
                                        <p class="text-xs text-slate-500">{{ $user['lastLogin'] }}</p>
                                    </td>

                                    <!-- Actions -->
                                    <td class="px-4 py-4 text-right">
                                        <div class="flex items-center justify-end gap-2 opacity-0 transition group-hover:opacity-100">
                                            <button
                                                class="inline-flex items-center justify-center h-8 w-8 rounded-lg text-slate-500 hover:bg-slate-100 hover:text-slate-700 transition"
                                                title="View"
                                            >
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                    <circle cx="12" cy="12" r="3" />
                                                </svg>
                                            </button>
                                            <button
                                                class="inline-flex items-center justify-center h-8 w-8 rounded-lg text-slate-500 hover:bg-slate-100 hover:text-slate-700 transition"
                                                title="Edit"
                                            >
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z" />
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
                                                        View Orders
                                                    </button>
                                                    <button class="block w-full px-4 py-2 text-left text-sm text-slate-700 hover:bg-slate-50">
                                                        Change Role
                                                    </button>
                                                    <button class="block w-full px-4 py-2 text-left text-sm text-slate-700 hover:bg-slate-50">
                                                        Reset Password
                                                    </button>
                                                    <button class="block w-full px-4 py-2 text-left text-sm text-slate-700 hover:bg-slate-50">
                                                        Resend Verification
                                                    </button>
                                                    <button class="block w-full px-4 py-2 text-left text-red-600 hover:bg-red-50 last:rounded-b-lg">
                                                        Delete User
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
                            <p class="text-xs text-slate-500">Showing 8 of 4,823 users</p>
                        </div>

                        <div class="flex items-center gap-1">
                            <button class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 text-slate-600 transition hover:border-slate-300 hover:text-slate-900">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                            <button class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 bg-blue-50 text-sm font-semibold text-blue-600">1</button>
                            <button class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 text-slate-600 transition hover:border-slate-300 hover:text-slate-900">2</button>
                            <button class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 text-slate-600 transition hover:border-slate-300 hover:text-slate-900">3</button>
                            <span class="px-2 text-xs text-slate-500">...</span>
                            <button class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 text-slate-600 transition hover:border-slate-300 hover:text-slate-900">603</button>
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
