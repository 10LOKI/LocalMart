{{-- TODO: Replace with real data from DB --}}
@php
    $notificationStats = [
        [
            'title' => 'Total Sent',
            'value' => '12,847',
            'change' => '+15.2%',
            'changeType' => 'up',
            'icon' => 'sent',
            'note' => 'This month',
        ],
        [
            'title' => 'Pending',
            'value' => '234',
            'change' => '+3.1%',
            'changeType' => 'up',
            'icon' => 'pending',
            'note' => 'In queue',
        ],
        [
            'title' => 'Open Rate',
            'value' => '42.5%',
            'change' => '+2.8%',
            'changeType' => 'up',
            'icon' => 'rate',
            'note' => 'Average',
        ],
        [
            'title' => 'Failed',
            'value' => '12',
            'change' => '-1.2%',
            'changeType' => 'down',
            'icon' => 'failed',
            'note' => 'This month',
        ],
    ];

    $notifications = [
        [
            'id' => 'NOTIF-12847',
            'type' => 'order',
            'title' => 'New Order Placed',
            'message' => 'Emma Wilson placed order #LM-1053 for $247.50',
            'recipient' => 'Admin Group',
            'sentAt' => 'Feb 5, 2026 2:35 PM',
            'openedAt' => 'Feb 5, 2026 2:42 PM',
            'status' => 'delivered',
            'channel' => 'email',
            'opens' => 3,
        ],
        [
            'id' => 'NOTIF-12846',
            'type' => 'review',
            'title' => 'New Review Submitted',
            'message' => '5-star review on Cold Brew Concentrate awaiting moderation',
            'recipient' => 'Moderators',
            'sentAt' => 'Feb 5, 2026 1:15 PM',
            'openedAt' => 'Feb 5, 2026 1:32 PM',
            'status' => 'delivered',
            'channel' => 'email',
            'opens' => 5,
        ],
        [
            'id' => 'NOTIF-12845',
            'type' => 'payment',
            'title' => 'Payment Received',
            'message' => 'Payment of $500.00 received for seller account James Chen',
            'recipient' => 'James Chen',
            'sentAt' => 'Feb 4, 2026 4:20 PM',
            'openedAt' => 'Feb 4, 2026 4:45 PM',
            'status' => 'delivered',
            'channel' => 'email',
            'opens' => 1,
        ],
        [
            'id' => 'NOTIF-12844',
            'type' => 'user',
            'title' => 'Account Verification',
            'message' => 'Please verify your email address to complete registration',
            'recipient' => 'Lisa Anderson',
            'sentAt' => 'Feb 4, 2026 10:00 AM',
            'openedAt' => null,
            'status' => 'pending',
            'channel' => 'email',
            'opens' => 0,
        ],
        [
            'id' => 'NOTIF-12843',
            'type' => 'product',
            'title' => 'Product Status Changed',
            'message' => 'Your product "Organic Maple Granola" is now published',
            'recipient' => 'Jessica Brown',
            'sentAt' => 'Feb 3, 2026 3:50 PM',
            'openedAt' => 'Feb 3, 2026 4:10 PM',
            'status' => 'delivered',
            'channel' => 'push',
            'opens' => 1,
        ],
        [
            'id' => 'NOTIF-12842',
            'type' => 'system',
            'title' => 'System Maintenance',
            'message' => 'Scheduled maintenance on Feb 10 from 2 AM to 4 AM UTC',
            'recipient' => 'All Users',
            'sentAt' => 'Feb 2, 2026 9:00 AM',
            'openedAt' => 'Feb 2, 2026 9:15 AM',
            'status' => 'delivered',
            'channel' => 'email',
            'opens' => 2847,
        ],
        [
            'id' => 'NOTIF-12841',
            'type' => 'order',
            'title' => 'Order Shipped',
            'message' => 'Your order #LM-1052 has been shipped',
            'recipient' => 'James Chen',
            'sentAt' => 'Feb 1, 2026 11:30 AM',
            'openedAt' => 'Feb 1, 2026 11:45 AM',
            'status' => 'delivered',
            'channel' => 'email',
            'opens' => 1,
        ],
        [
            'id' => 'NOTIF-12840',
            'type' => 'promo',
            'title' => 'Special Offer',
            'message' => '20% off on selected items this weekend only',
            'recipient' => 'Customers',
            'sentAt' => 'Jan 31, 2026 6:00 PM',
            'openedAt' => 'Jan 31, 2026 7:20 PM',
            'status' => 'failed',
            'channel' => 'sms',
            'opens' => 412,
        ],
    ];

    $statusVariants = [
        'delivered' => 'success',
        'pending' => 'warning',
        'failed' => 'danger',
    ];

    $channelColors = [
        'email' => 'bg-blue-100 text-blue-700',
        'push' => 'bg-emerald-100 text-emerald-700',
        'sms' => 'bg-purple-100 text-purple-700',
    ];

    $typeIcons = [
        'order' => '📦',
        'review' => '⭐',
        'payment' => '💳',
        'user' => '👤',
        'product' => '🛍️',
        'system' => '⚙️',
        'promo' => '🎉',
    ];
@endphp

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Notifications - LocalMart Dashboard</title>

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
                    <h1 class="text-3xl font-bold text-slate-900">Notifications</h1>
                    <p class="mt-2 text-sm text-slate-500">Manage system and user notifications</p>
                </div>
                <button class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M12 5v14" />
                        <path d="M5 12h14" />
                    </svg>
                    Send Notification
                </button>
            </section>

            <!-- Stats Cards -->
            <section class="mb-6 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                @foreach ($notificationStats as $card)
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
                                @case('sent')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
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
                                        <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z" />
                                        <polyline points="13 2 13 9 20 9" />
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
                            <input type="text" placeholder="Search notifications..." class="flex-1 bg-transparent text-sm focus:outline-none text-slate-900 placeholder-slate-500">
                        </div>

                        <div class="flex gap-2 flex-wrap">
                            <label class="flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2.5">
                                <svg class="h-4 w-4 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <path d="M12 3l9 16H3L12 3Z" />
                                </svg>
                                <select class="bg-transparent text-sm font-medium text-slate-600 focus:outline-none">
                                    <option>All Types</option>
                                    <option>Order</option>
                                    <option>Review</option>
                                    <option>Payment</option>
                                    <option>User</option>
                                    <option>Product</option>
                                    <option>System</option>
                                    <option>Promo</option>
                                </select>
                            </label>

                            <label class="flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2.5">
                                <svg class="h-4 w-4 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <circle cx="12" cy="12" r="1" />
                                </svg>
                                <select class="bg-transparent text-sm font-medium text-slate-600 focus:outline-none">
                                    <option>All Status</option>
                                    <option>Delivered</option>
                                    <option>Pending</option>
                                    <option>Failed</option>
                                </select>
                            </label>

                            <label class="flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2.5">
                                <svg class="h-4 w-4 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <path d="M3 12h2m14 0h2M6.22 6.22l1.41 1.41m9.74 0l1.41-1.41M6.22 17.78l1.41-1.41m9.74 0l1.41 1.41M12 2v2m0 16v2" />
                                </svg>
                                <select class="bg-transparent text-sm font-medium text-slate-600 focus:outline-none">
                                    <option>All Channels</option>
                                    <option>Email</option>
                                    <option>Push</option>
                                    <option>SMS</option>
                                </select>
                            </label>
                        </div>
                    </div>
                </x-chart-card>
            </section>

            <!-- Notifications List -->
            <section>
                <x-chart-card title="Notification Log" subtitle="Recent notifications sent and pending">
                    <div class="space-y-3">
                        @foreach ($notifications as $notification)
                            <div class="rounded-lg border border-slate-200 bg-white p-4 transition hover:shadow-md hover:border-slate-300 group">
                                <div class="flex items-start gap-4">
                                    <!-- Type Icon -->
                                    <div class="text-2xl flex-shrink-0">
                                        {{ $typeIcons[$notification['type']] ?? '📩' }}
                                    </div>

                                    <!-- Content -->
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-start justify-between gap-4 mb-2">
                                            <div>
                                                <h4 class="text-sm font-semibold text-slate-900">{{ $notification['title'] }}</h4>
                                                <p class="text-sm text-slate-600 mt-1">{{ $notification['message'] }}</p>
                                            </div>
                                            <x-status-badge
                                                variant="{{ $statusVariants[$notification['status']] ?? 'neutral' }}"
                                                size="sm"
                                            >
                                                {{ ucfirst($notification['status']) }}
                                            </x-status-badge>
                                        </div>

                                        <!-- Meta Info -->
                                        <div class="flex flex-wrap items-center gap-4 text-xs text-slate-500 mt-3 pt-3 border-t border-slate-100">
                                            <div class="flex items-center gap-2">
                                                        <span class="font-medium {{ $channelColors[$notification['channel']] ?? 'bg-slate-100 text-slate-700' }} px-2 py-1 rounded">
                                                            {{ ucfirst($notification['channel']) }}
                                                        </span>
                                            </div>
                                            <div>📤 {{ $notification['sentAt'] }}</div>
                                            <div>👥 {{ $notification['recipient'] }}</div>
                                            <div class="flex items-center gap-1">
                                                👁️ {{ $notification['opens'] }} {{ $notification['opens'] === 1 ? 'open' : 'opens' }}
                                            </div>
                                            @if ($notification['openedAt'])
                                                <div class="text-emerald-600">✓ Opened {{ $notification['openedAt'] }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Actions -->
                                    <div class="flex items-center gap-2 opacity-0 transition group-hover:opacity-100 flex-shrink-0">
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
                                            title="Resend"
                                        >
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8" />
                                                <path d="M21 3v5h-5" />
                                                <path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16" />
                                                <path d="M3 21v-5h5" />
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
                                                    View Full Details
                                                </button>
                                                <button class="block w-full px-4 py-2 text-left text-sm text-slate-700 hover:bg-slate-50">
                                                    View Analytics
                                                </button>
                                                <button class="block w-full px-4 py-2 text-left text-slate-700 hover:bg-slate-50">
                                                    Duplicate Template
                                                </button>
                                                <button class="block w-full px-4 py-2 text-left text-red-600 hover:bg-red-50 last:rounded-b-lg">
                                                    Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6 flex items-center justify-between border-t border-slate-200 pt-6">
                        <p class="text-xs text-slate-500">Showing 8 of 12,847 notifications</p>
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
                            <button class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 text-slate-600 transition hover:border-slate-300 hover:text-slate-900">1606</button>
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
