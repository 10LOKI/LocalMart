{{-- TODO: Replace with real data from DB --}}
@php
    $orderStats = [
        [
            'title' => 'Total Orders',
            'value' => '1,284',
            'change' => '+8.1%',
            'changeType' => 'up',
            'icon' => 'orders',
            'note' => 'This month',
        ],
        [
            'title' => 'Pending Orders',
            'value' => '18',
            'change' => '+2.3%',
            'changeType' => 'up',
            'icon' => 'pending',
            'note' => 'Awaiting payment',
        ],
        [
            'title' => 'Revenue',
            'value' => '$84,230',
            'change' => '+12.4%',
            'changeType' => 'up',
            'icon' => 'revenue',
            'note' => 'Gross sales',
        ],
        [
            'title' => 'Avg Order Value',
            'value' => '$65.34',
            'change' => '-1.2%',
            'changeType' => 'down',
            'icon' => 'avg-order',
            'note' => 'Per transaction',
        ],
    ];

    $orders = [
        [
            'id' => 'LM-1053',
            'customer' => 'Emma Wilson',
            'email' => 'emma.wilson@example.com',
            'date' => 'Feb 5, 2026',
            'items' => 3,
            'amount' => '$247.50',
            'status' => 'delivered',
            'payment' => 'Card',
            'shipping' => 'Express',
        ],
        [
            'id' => 'LM-1052',
            'customer' => 'James Chen',
            'email' => 'james.chen@example.com',
            'date' => 'Feb 4, 2026',
            'items' => 2,
            'amount' => '$128.75',
            'status' => 'paid',
            'payment' => 'Card',
            'shipping' => 'Standard',
        ],
        [
            'id' => 'LM-1051',
            'customer' => 'Sarah Martinez',
            'email' => 'sarah.martinez@example.com',
            'date' => 'Feb 3, 2026',
            'items' => 5,
            'amount' => '$312.00',
            'status' => 'paid',
            'payment' => 'PayPal',
            'shipping' => 'Standard',
        ],
        [
            'id' => 'LM-1050',
            'customer' => 'Michael Johnson',
            'email' => 'michael.j@example.com',
            'date' => 'Feb 3, 2026',
            'items' => 1,
            'amount' => '$45.99',
            'status' => 'pending',
            'payment' => 'Card',
            'shipping' => 'Standard',
        ],
        [
            'id' => 'LM-1049',
            'customer' => 'Lisa Anderson',
            'email' => 'lisa.anderson@example.com',
            'date' => 'Feb 2, 2026',
            'items' => 4,
            'amount' => '$189.50',
            'status' => 'delivered',
            'payment' => 'Card',
            'shipping' => 'Express',
        ],
        [
            'id' => 'LM-1048',
            'customer' => 'Robert Taylor',
            'email' => 'robert.taylor@example.com',
            'date' => 'Feb 1, 2026',
            'items' => 2,
            'amount' => '$92.30',
            'status' => 'cancelled',
            'payment' => 'Card',
            'shipping' => 'Standard',
        ],
        [
            'id' => 'LM-1047',
            'customer' => 'Jessica Brown',
            'email' => 'jessica.brown@example.com',
            'date' => 'Jan 31, 2026',
            'items' => 6,
            'amount' => '$425.75',
            'status' => 'delivered',
            'payment' => 'PayPal',
            'shipping' => 'Express',
        ],
        [
            'id' => 'LM-1046',
            'customer' => 'David Lee',
            'email' => 'david.lee@example.com',
            'date' => 'Jan 30, 2026',
            'items' => 3,
            'amount' => '$167.40',
            'status' => 'paid',
            'payment' => 'Card',
            'shipping' => 'Standard',
        ],
    ];

    $statusVariants = [
        'pending' => 'warning',
        'paid' => 'info',
        'delivered' => 'success',
        'cancelled' => 'danger',
    ];

    $shippingVariants = [
        'Standard' => 'neutral',
        'Express' => 'info',
        'Priority' => 'success',
    ];
@endphp

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Orders - LocalMart Dashboard</title>

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
                    <h1 class="text-3xl font-bold text-slate-900">Orders</h1>
                    <p class="mt-2 text-sm text-slate-500">Manage and track all customer orders</p>
                </div>
                <button class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M12 5v14" />
                        <path d="M5 12h14" />
                    </svg>
                    New Order
                </button>
            </section>

            <!-- Stats Cards -->
            <section class="mb-6 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                @foreach ($orderStats as $card)
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
                                @case('orders')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M6 6h14l-1.5 9H6L4 4H2" />
                                        <circle cx="9" cy="20" r="1.5" />
                                        <circle cx="18" cy="20" r="1.5" />
                                    </svg>
                                    @break
                                @case('pending')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <circle cx="12" cy="12" r="9" />
                                        <path d="M12 6v6l4 2" />
                                    </svg>
                                    @break
                                @case('revenue')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M4 18h16" />
                                        <path d="M6 14l4-4 3 3 5-6" />
                                        <path d="M15 7h4v4" />
                                    </svg>
                                    @break
                                @case('avg-order')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm0-14c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6z" />
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
                            <input type="text" placeholder="Search by order ID or customer..." class="flex-1 bg-transparent text-sm focus:outline-none text-slate-900 placeholder-slate-500">
                        </div>

                        <div class="flex gap-2 flex-wrap">
                            <label class="flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2.5">
                                <svg class="h-4 w-4 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <rect x="3" y="5" width="18" height="16" rx="2" />
                                    <path d="M16 3v4" />
                                    <path d="M8 3v4" />
                                    <path d="M3 11h18" />
                                </svg>
                                <select class="bg-transparent text-sm font-medium text-slate-600 focus:outline-none">
                                    <option>All Dates</option>
                                    <option>Today</option>
                                    <option>This Week</option>
                                    <option>This Month</option>
                                    <option>Last Month</option>
                                </select>
                            </label>

                            <label class="flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2.5">
                                <svg class="h-4 w-4 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <path d="M12 3l9 16H3L12 3Z" />
                                </svg>
                                <select class="bg-transparent text-sm font-medium text-slate-600 focus:outline-none">
                                    <option>All Status</option>
                                    <option>Pending</option>
                                    <option>Paid</option>
                                    <option>Delivered</option>
                                    <option>Cancelled</option>
                                </select>
                            </label>

                            <label class="flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2.5">
                                <svg class="h-4 w-4 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <path d="M3 6h18" />
                                    <path d="M8 6v12" />
                                    <path d="M16 6v12" />
                                    <path d="M6 9v6" />
                                    <path d="M12 9v6" />
                                    <path d="M18 9v6" />
                                </svg>
                                <select class="bg-transparent text-sm font-medium text-slate-600 focus:outline-none">
                                    <option>All Shipping</option>
                                    <option>Standard</option>
                                    <option>Express</option>
                                    <option>Priority</option>
                                </select>
                            </label>
                        </div>
                    </div>
                </x-chart-card>
            </section>

            <!-- Orders Table -->
            <section>
                <x-chart-card title="Recent Orders" subtitle="Complete list of all orders">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                            <tr class="border-b border-slate-200 text-left text-xs font-semibold uppercase tracking-[0.1em] text-slate-500">
                                <th class="px-4 py-4">Order ID</th>
                                <th class="px-4 py-4">Customer</th>
                                <th class="px-4 py-4">Date</th>
                                <th class="px-4 py-4">Items</th>
                                <th class="px-4 py-4">Amount</th>
                                <th class="px-4 py-4">Status</th>
                                <th class="px-4 py-4">Payment</th>
                                <th class="px-4 py-4">Shipping</th>
                                <th class="px-4 py-4 text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200">
                            @foreach ($orders as $order)
                                <tr class="transition hover:bg-slate-50 group">
                                    <!-- Order ID -->
                                    <td class="px-4 py-4">
                                        <a href="#" class="text-sm font-semibold text-blue-600 hover:text-blue-700">
                                            {{ $order['id'] }}
                                        </a>
                                    </td>

                                    <!-- Customer -->
                                    <td class="px-4 py-4">
                                        <div class="flex flex-col gap-1">
                                            <p class="text-sm font-semibold text-slate-900">{{ $order['customer'] }}</p>
                                            <p class="text-xs text-slate-500">{{ $order['email'] }}</p>
                                        </div>
                                    </td>

                                    <!-- Date -->
                                    <td class="px-4 py-4">
                                        <p class="text-sm text-slate-500">{{ $order['date'] }}</p>
                                    </td>

                                    <!-- Items -->
                                    <td class="px-4 py-4">
                                                    <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-slate-100 text-sm font-semibold text-slate-600">
                                                        {{ $order['items'] }}
                                                    </span>
                                    </td>

                                    <!-- Amount -->
                                    <td class="px-4 py-4">
                                        <p class="text-sm font-semibold text-slate-900">{{ $order['amount'] }}</p>
                                    </td>

                                    <!-- Status -->
                                    <td class="px-4 py-4">
                                        <x-status-badge
                                            variant="{{ $statusVariants[$order['status']] ?? 'neutral' }}"
                                            size="sm"
                                        >
                                            {{ ucfirst($order['status']) }}
                                        </x-status-badge>
                                    </td>

                                    <!-- Payment -->
                                    <td class="px-4 py-4">
                                        <p class="text-sm text-slate-600">{{ $order['payment'] }}</p>
                                    </td>

                                    <!-- Shipping -->
                                    <td class="px-4 py-4">
                                        <x-status-badge
                                            variant="{{ $shippingVariants[$order['shipping']] ?? 'neutral' }}"
                                            size="sm"
                                        >
                                            {{ $order['shipping'] }}
                                        </x-status-badge>
                                    </td>

                                    <!-- Actions -->
                                    <td class="px-4 py-4 text-right">
                                        <div class="flex items-center justify-end gap-2 opacity-0 transition group-hover:opacity-100">
                                            <button
                                                class="inline-flex items-center justify-center h-8 w-8 rounded-lg text-slate-500 hover:bg-slate-100 hover:text-slate-700 transition"
                                                title="View Details"
                                            >
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                    <circle cx="12" cy="12" r="3" />
                                                </svg>
                                            </button>
                                            <button
                                                class="inline-flex items-center justify-center h-8 w-8 rounded-lg text-slate-500 hover:bg-slate-100 hover:text-slate-700 transition"
                                                title="Edit Order"
                                            >
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z" />
                                                </svg>
                                            </button>
                                            <div class="relative group/dropdown">
                                                <button
                                                    class="inline-flex items-center justify-center h-8 w-8 rounded-lg text-slate-500 hover:bg-slate-100 hover:text-slate-700 transition"
                                                    title="More Actions"
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
                                                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                                                            <polyline points="7 10 12 15 17 10" />
                                                                            <line x1="12" y1="15" x2="12" y2="3" />
                                                                        </svg>
                                                                        Download Invoice
                                                                    </span>
                                                    </button>
                                                    <button class="block w-full px-4 py-2 text-left text-sm text-slate-700 hover:bg-slate-50">
                                                                    <span class="flex items-center gap-2">
                                                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                                                                        </svg>
                                                                        Send Notification
                                                                    </span>
                                                    </button>
                                                    <button class="block w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50 last:rounded-b-lg">
                                                                    <span class="flex items-center gap-2">
                                                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                                            <polyline points="3 6 5 4 21 4 23 6" />
                                                                            <path d="M19 8v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8m3 0V6a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                                                            <line x1="10" y1="12" x2="10" y2="17" />
                                                                            <line x1="14" y1="12" x2="14" y2="17" />
                                                                        </svg>
                                                                        Delete Order
                                                                    </span>
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
                                <option>100</option>
                            </select>
                            <p class="text-xs text-slate-500">of 1,284 orders</p>
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
                            <button class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 text-slate-600 transition hover:border-slate-300 hover:text-slate-900">128</button>
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
