{{-- TODO: Replace with real data from DB --}}
@php
    $paymentStats = [
        [
            'title' => 'Total Revenue',
            'value' => '$84,230',
            'change' => '+12.4%',
            'changeType' => 'up',
            'icon' => 'revenue',
            'note' => 'This month',
        ],
        [
            'title' => 'Pending Payments',
            'value' => '$12,450',
            'change' => '+2.1%',
            'changeType' => 'up',
            'icon' => 'pending',
            'note' => 'Awaiting processing',
        ],
        [
            'title' => 'Success Rate',
            'value' => '99.2%',
            'change' => '+0.5%',
            'changeType' => 'up',
            'icon' => 'rate',
            'note' => 'Payment success',
        ],
        [
            'title' => 'Failed Payments',
            'value' => '34',
            'change' => '-3.2%',
            'changeType' => 'down',
            'icon' => 'failed',
            'note' => 'Requires action',
        ],
    ];

    $payments = [
        [
            'id' => 'PAY-84230',
            'orderId' => 'LM-1053',
            'customer' => 'Emma Wilson',
            'amount' => '$247.50',
            'method' => 'Credit Card',
            'currency' => 'USD',
            'date' => 'Feb 5, 2026',
            'time' => '2:35 PM',
            'status' => 'completed',
            'gateway' => 'Stripe',
            'last4' => '4242',
            'fee' => '$7.43',
        ],
        [
            'id' => 'PAY-84229',
            'orderId' => 'LM-1052',
            'customer' => 'James Chen',
            'amount' => '$128.75',
            'method' => 'Debit Card',
            'currency' => 'USD',
            'date' => 'Feb 4, 2026',
            'time' => '4:20 PM',
            'status' => 'completed',
            'gateway' => 'Stripe',
            'last4' => '5555',
            'fee' => '$3.86',
        ],
        [
            'id' => 'PAY-84228',
            'orderId' => 'LM-1051',
            'customer' => 'Sarah Martinez',
            'amount' => '$312.00',
            'method' => 'PayPal',
            'currency' => 'USD',
            'date' => 'Feb 3, 2026',
            'time' => '11:45 AM',
            'status' => 'completed',
            'gateway' => 'PayPal',
            'last4' => 'xxxx',
            'fee' => '$9.36',
        ],
        [
            'id' => 'PAY-84227',
            'orderId' => 'LM-1050',
            'customer' => 'Michael Johnson',
            'amount' => '$45.99',
            'method' => 'Apple Pay',
            'currency' => 'USD',
            'date' => 'Feb 3, 2026',
            'time' => '3:15 PM',
            'status' => 'pending',
            'gateway' => 'Stripe',
            'last4' => '5678',
            'fee' => '$1.38',
        ],
        [
            'id' => 'PAY-84226',
            'orderId' => 'LM-1049',
            'customer' => 'Lisa Anderson',
            'amount' => '$189.50',
            'method' => 'Credit Card',
            'currency' => 'USD',
            'date' => 'Feb 2, 2026',
            'time' => '10:20 AM',
            'status' => 'completed',
            'gateway' => 'Stripe',
            'last4' => '1234',
            'fee' => '$5.69',
        ],
        [
            'id' => 'PAY-84225',
            'orderId' => 'LM-1048',
            'customer' => 'Robert Taylor',
            'amount' => '$92.30',
            'method' => 'Google Pay',
            'currency' => 'USD',
            'date' => 'Feb 1, 2026',
            'time' => '5:45 PM',
            'status' => 'failed',
            'gateway' => 'Stripe',
            'last4' => '9999',
            'fee' => '$2.77',
        ],
        [
            'id' => 'PAY-84224',
            'orderId' => 'LM-1047',
            'customer' => 'Jessica Brown',
            'amount' => '$425.75',
            'method' => 'Bank Transfer',
            'currency' => 'USD',
            'date' => 'Jan 31, 2026',
            'time' => '9:00 AM',
            'status' => 'completed',
            'gateway' => 'Wire',
            'last4' => 'xxxx',
            'fee' => '$12.77',
        ],
        [
            'id' => 'PAY-84223',
            'orderId' => 'LM-1046',
            'customer' => 'David Lee',
            'amount' => '$167.40',
            'method' => 'Credit Card',
            'currency' => 'USD',
            'date' => 'Jan 30, 2026',
            'time' => '2:30 PM',
            'status' => 'completed',
            'gateway' => 'Stripe',
            'last4' => '8765',
            'fee' => '$5.02',
        ],
    ];

    $statusVariants = [
        'completed' => 'success',
        'pending' => 'warning',
        'failed' => 'danger',
        'refunded' => 'info',
    ];

    $methodIcons = [
        'Credit Card' => '💳',
        'Debit Card' => '💳',
        'PayPal' => '🅿️',
        'Apple Pay' => '🍎',
        'Google Pay' => '🔵',
        'Bank Transfer' => '🏦',
    ];
@endphp

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Payments - LocalMart Dashboard</title>

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
                    <h1 class="text-3xl font-bold text-slate-900">Payments</h1>
                    <p class="mt-2 text-sm text-slate-500">Track transactions and payment status</p>
                </div>
                <button class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M12 5v14" />
                        <path d="M5 12h14" />
                    </svg>
                    Refund Payment
                </button>
            </section>

            <!-- Stats Cards -->
            <section class="mb-6 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                @foreach ($paymentStats as $card)
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
                                @case('revenue')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2" />
                                        <line x1="1" y1="10" x2="23" y2="10" />
                                    </svg>
                                    @break
                                @case('pending')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <circle cx="12" cy="12" r="9" />
                                        <path d="M12 6v6l4 2" />
                                    </svg>
                                    @break
                                @case('rate')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M4 18h16" />
                                        <path d="M6 14l4-4 3 3 5-6" />
                                        <path d="M15 7h4v4" />
                                    </svg>
                                    @break
                                @case('failed')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <circle cx="12" cy="12" r="10" />
                                        <line x1="15" y1="9" x2="9" y2="15" />
                                        <line x1="9" y1="9" x2="15" y2="15" />
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
                            <input type="text" placeholder="Search by customer, order ID or payment ID..." class="flex-1 bg-transparent text-sm focus:outline-none text-slate-900 placeholder-slate-500">
                        </div>

                        <div class="flex gap-2 flex-wrap">
                            <label class="flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2.5">
                                <svg class="h-4 w-4 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <path d="M12 3l9 16H3L12 3Z" />
                                </svg>
                                <select class="bg-transparent text-sm font-medium text-slate-600 focus:outline-none">
                                    <option>All Status</option>
                                    <option>Completed</option>
                                    <option>Pending</option>
                                    <option>Failed</option>
                                    <option>Refunded</option>
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
                                    <option>All Time</option>
                                    <option>Today</option>
                                    <option>This Week</option>
                                    <option>This Month</option>
                                    <option>Last 3 Months</option>
                                </select>
                            </label>

                            <label class="flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2.5">
                                <svg class="h-4 w-4 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <circle cx="12" cy="12" r="1" />
                                </svg>
                                <select class="bg-transparent text-sm font-medium text-slate-600 focus:outline-none">
                                    <option>All Methods</option>
                                    <option>Credit Card</option>
                                    <option>Debit Card</option>
                                    <option>PayPal</option>
                                    <option>Apple Pay</option>
                                    <option>Google Pay</option>
                                    <option>Bank Transfer</option>
                                </select>
                            </label>
                        </div>
                    </div>
                </x-chart-card>
            </section>

            <!-- Payments Table -->
            <section>
                <x-chart-card title="Payment Transactions" subtitle="All payment records and status">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                            <tr class="border-b border-slate-200 text-left text-xs font-semibold uppercase tracking-[0.1em] text-slate-500">
                                <th class="px-4 py-4">Payment ID</th>
                                <th class="px-4 py-4">Customer</th>
                                <th class="px-4 py-4">Order</th>
                                <th class="px-4 py-4">Amount</th>
                                <th class="px-4 py-4">Method</th>
                                <th class="px-4 py-4">Date & Time</th>
                                <th class="px-4 py-4">Status</th>
                                <th class="px-4 py-4">Fee</th>
                                <th class="px-4 py-4 text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200">
                            @foreach ($payments as $payment)
                                <tr class="transition hover:bg-slate-50 group">
                                    <!-- Payment ID -->
                                    <td class="px-4 py-4">
                                        <p class="text-sm font-semibold text-blue-600">{{ $payment['id'] }}</p>
                                    </td>

                                    <!-- Customer -->
                                    <td class="px-4 py-4">
                                        <p class="text-sm font-semibold text-slate-900">{{ $payment['customer'] }}</p>
                                    </td>

                                    <!-- Order -->
                                    <td class="px-4 py-4">
                                        <p class="text-sm text-slate-600">{{ $payment['orderId'] }}</p>
                                    </td>

                                    <!-- Amount -->
                                    <td class="px-4 py-4">
                                        <p class="text-sm font-bold text-slate-900">{{ $payment['amount'] }}</p>
                                    </td>

                                    <!-- Method -->
                                    <td class="px-4 py-4">
                                        <div class="flex items-center gap-2">
                                            <span class="text-sm">{{ $methodIcons[$payment['method']] ?? '💳' }}</span>
                                            <span class="text-xs text-slate-600">{{ $payment['method'] }}</span>
                                            @if ($payment['last4'] !== 'xxxx')
                                                <span class="text-xs text-slate-500">•••{{ $payment['last4'] }}</span>
                                            @endif
                                        </div>
                                    </td>

                                    <!-- Date & Time -->
                                    <td class="px-4 py-4">
                                        <div class="flex flex-col">
                                            <p class="text-xs text-slate-600">{{ $payment['date'] }}</p>
                                            <p class="text-xs text-slate-500">{{ $payment['time'] }}</p>
                                        </div>
                                    </td>

                                    <!-- Status -->
                                    <td class="px-4 py-4">
                                        <x-status-badge
                                            variant="{{ $statusVariants[$payment['status']] ?? 'neutral' }}"
                                            size="sm"
                                        >
                                            {{ ucfirst($payment['status']) }}
                                        </x-status-badge>
                                    </td>

                                    <!-- Fee -->
                                    <td class="px-4 py-4">
                                        <p class="text-sm text-slate-600">{{ $payment['fee'] }}</p>
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

                                            @if ($payment['status'] === 'completed')
                                                <button
                                                    class="inline-flex items-center justify-center h-8 w-8 rounded-lg text-slate-500 hover:bg-slate-100 hover:text-slate-700 transition"
                                                    title="Refund"
                                                >
                                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        <path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8" />
                                                        <path d="M21 3v5h-5" />
                                                        <path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16" />
                                                        <path d="M3 21v-5h5" />
                                                    </svg>
                                                </button>
                                            @endif

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
                                                        View Receipt
                                                    </button>
                                                    <button class="block w-full px-4 py-2 text-left text-sm text-slate-700 hover:bg-slate-50">
                                                        Download Invoice
                                                    </button>
                                                    <button class="block w-full px-4 py-2 text-left text-slate-700 hover:bg-slate-50">
                                                        Send Receipt Email
                                                    </button>
                                                    @if ($payment['status'] !== 'failed')
                                                        <button class="block w-full px-4 py-2 text-left text-red-600 hover:bg-red-50 last:rounded-b-lg">
                                                            Request Refund
                                                        </button>
                                                    @endif
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
                            <p class="text-xs text-slate-500">Showing 8 of 84,230 payments</p>
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
                            <button class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 text-slate-600 transition hover:border-slate-300 hover:text-slate-900">10529</button>
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
