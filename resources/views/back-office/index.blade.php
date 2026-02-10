<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>LocalMart Dashboard</title>

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
                    <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-5">
                        @foreach ($kpis as $card)
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
                                                <path d="M4 18h16" />
                                                <path d="M6 14l4-4 3 3 5-6" />
                                                <path d="M15 7h4v4" />
                                            </svg>
                                            @break
                                        @case('orders')
                                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                                <path d="M6 6h14l-1.5 9H6L4 4H2" />
                                                <circle cx="9" cy="20" r="1.5" />
                                                <circle cx="18" cy="20" r="1.5" />
                                            </svg>
                                            @break
                                        @case('products')
                                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                                <path d="M4 7l8-4 8 4v10l-8 4-8-4V7Z" />
                                                <path d="M12 3v8" />
                                                <path d="M4 7l8 4 8-4" />
                                            </svg>
                                            @break
                                        @case('stock')
                                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                                <path d="M12 3l9 16H3L12 3Z" />
                                                <path d="M12 9v4" />
                                                <circle cx="12" cy="17" r="1" />
                                            </svg>
                                            @break
                                        @case('reviews')
                                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                                <path d="M12 3l2.8 5.6 6.2.9-4.5 4.3 1 6.1-5.5-2.9-5.5 2.9 1-6.1L3 9.5l6.2-.9L12 3Z" />
                                            </svg>
                                            @break
                                    @endswitch
                                </x-slot>
                            </x-stat-card>
                        @endforeach
                    </section>
                    <section class="mt-6 grid gap-6 lg:grid-cols-12">
                        <div class="lg:col-span-8">
                            <x-chart-card title="Sales Report" subtitle="This Month vs Last Month">
                                <x-slot name="action">
                                    {{-- TODO: wire filter logic (date range + category) --}}
                                    <label class="flex items-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-3 py-1.5">
                                        <svg class="h-4 w-4 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                            <rect x="3" y="5" width="18" height="16" rx="2" />
                                            <path d="M16 3v4" />
                                            <path d="M8 3v4" />
                                            <path d="M3 11h18" />
                                        </svg>
                                        <select class="bg-transparent text-xs font-semibold text-slate-600 focus:outline-none">
                                            <option>This Month</option>
                                            <option>Last Month</option>
                                            <option>Last 90 Days</option>
                                        </select>
                                    </label>
                                    <label class="flex items-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-3 py-1.5">
                                        <svg class="h-4 w-4 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                            <path d="M4 6h16" />
                                            <path d="M8 12h8" />
                                            <path d="M10 18h4" />
                                        </svg>
                                        <select class="bg-transparent text-xs font-semibold text-slate-600 focus:outline-none">
                                            <option>All Categories</option>
                                            <option>Grocery</option>
                                            <option>Home Goods</option>
                                            <option>Wellness</option>
                                        </select>
                                    </label>
                                </x-slot>

                                <div class="flex flex-wrap items-start justify-between gap-6">
                                    <div>
                                        <p class="text-xs font-semibold uppercase tracking-[0.25em] text-slate-500">Total Revenue</p>
                                        <p class="mt-2 text-3xl font-semibold text-slate-900">{{ $revenueSummary['value'] }}</p>
                                        <div class="mt-2 flex items-center gap-2 text-xs text-slate-500">
                                            <span class="inline-flex h-2 w-2 rounded-full {{ $revenueSummary['changeType'] === 'down' ? 'bg-rose-500' : 'bg-emerald-500' }}"></span>
                                            {{ $revenueSummary['change'] }} vs last month
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-4 rounded-2xl border border-slate-100 bg-slate-50 px-4 py-3 text-xs">
                                        <div>
                                            <p class="text-slate-500">Avg order</p>
                                            <p class="mt-1 text-sm font-semibold text-slate-900">{{ $avgOrderValue }}</p>
                                        </div>
                                        <div class="h-8 w-px bg-slate-200"></div>
                                        <div>
                                            <p class="text-slate-500">Paid rate</p>
                                            <p class="mt-1 text-sm font-semibold text-slate-900">{{ $paidRate }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6">
                                    <div class="relative h-56 rounded-2xl border border-slate-100 bg-gradient-to-br from-white via-slate-50 to-white">
                                        <svg class="absolute inset-0 h-full w-full" viewBox="0 0 600 240" fill="none">
                                            <defs>
                                                <linearGradient id="sales-fill" x1="0" x2="0" y1="0" y2="1">
                                                    <stop offset="0%" stop-color="rgba(56,189,248,0.35)" />
                                                    <stop offset="100%" stop-color="rgba(56,189,248,0)" />
                                                </linearGradient>
                                            </defs>
                                            <g stroke="#e2e8f0" stroke-width="1">
                                                <line x1="40" y1="40" x2="560" y2="40" />
                                                <line x1="40" y1="100" x2="560" y2="100" />
                                                <line x1="40" y1="160" x2="560" y2="160" />
                                            </g>
                                            <path d="M40 170 C 120 130, 200 150, 280 110 C 340 80, 420 120, 520 70" fill="url(#sales-fill)" />
                                            <path d="M40 170 C 120 130, 200 150, 280 110 C 340 80, 420 120, 520 70" stroke="#38bdf8" stroke-width="3" fill="none" />
                                            <path d="M40 190 C 120 170, 200 175, 280 140 C 340 120, 420 150, 520 120" stroke="#cbd5f5" stroke-width="2.5" stroke-dasharray="6 6" fill="none" />
                                            <g fill="#38bdf8">
                                                <circle cx="40" cy="170" r="4" />
                                                <circle cx="200" cy="150" r="4" />
                                                <circle cx="340" cy="80" r="4" />
                                                <circle cx="520" cy="70" r="4" />
                                            </g>
                                        </svg>
                                        <div class="absolute bottom-4 left-6 right-6 flex justify-between text-[10px] font-semibold uppercase tracking-[0.2em] text-slate-400">
                                            @foreach ($chartLabels as $label)
                                                <span>{{ $label }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="mt-4 flex flex-wrap items-center gap-4 text-xs text-slate-500">
                                        <div class="flex items-center gap-2">
                                            <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                                            This month
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="h-2 w-2 rounded-full bg-slate-300"></span>
                                            Last month
                                        </div>
                                    </div>
                                </div>
                            </x-chart-card>
                        </div>

                        <div class="lg:col-span-4">
                            <x-chart-card title="Orders Status" subtitle="Order pipeline">
                                <div class="flex flex-wrap items-center gap-6">
                                    <div class="relative h-40 w-40">
                                        <svg viewBox="0 0 120 120" class="h-full w-full">
                                            <g transform="rotate(-90 60 60)">
                                                <circle cx="60" cy="60" r="46" fill="none" stroke="#e2e8f0" stroke-width="12" />
                                                @php $offset = 0; @endphp
                                                @foreach ($statusBreakdown as $slice)
                                                    @php
                                                        $percent = $statusTotal ? round(($slice['value'] / $statusTotal) * 100, 1) : 0;
                                                        $dashOffset = 100 - $offset;
                                                        $offset += $percent;
                                                    @endphp
                                                    <circle
                                                        cx="60" cy="60" r="46" fill="none" stroke="{{ $slice['color'] }}"
                                                        stroke-width="12"
                                                        stroke-dasharray="{{ $percent }} {{ 100 - $percent }}"
                                                        stroke-dashoffset="{{ $dashOffset }}"
                                                        pathLength="100"
                                                        stroke-linecap="round"
                                                    />
                                                @endforeach
                                            </g>
                                        </svg>
                                        <div class="absolute inset-0 flex items-center justify-center">
                                            <div class="text-center">
                                                <p class="text-xs text-slate-500">Total</p>
                                                <p class="text-xl font-semibold text-slate-900">{{ $statusTotal }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-1 space-y-3 text-sm">
                                        @foreach ($statusBreakdown as $slice)
                                            <div class="flex items-center justify-between gap-4">
                                                <div class="flex items-center gap-2">
                                                    <span class="h-2.5 w-2.5 rounded-full" style="background-color: {{ $slice['color'] }}"></span>
                                                    <span class="text-slate-600">{{ $slice['label'] }}</span>
                                                </div>
                                                <span class="font-semibold text-slate-900">{{ $slice['value'] }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </x-chart-card>
                        </div>
                    </section>
                    <section class="mt-6 grid gap-6 lg:grid-cols-12">
                        <div class="lg:col-span-8 space-y-6">
                            <x-chart-card title="Stock Alerts" subtitle="Low inventory items">
                                {{-- TODO: gate this section by role/permission --}}
                                <div class="space-y-4">
                                    @if (count($stockAlerts))
                                        @foreach ($stockAlerts as $item)
                                            @php
                                                $isCritical = $item['stock'] <= 10;
                                                $badgeText = $isCritical ? 'Critical' : 'Low';
                                                $badgeVariant = $isCritical ? 'danger' : 'warning';
                                            @endphp
                                            <x-list-item
                                                title="{{ $item['product'] }}"
                                                subtitle="Category {{ $item['category'] }}"
                                                meta="{{ $item['stock'] }} left"
                                            >
                                                <x-slot name="icon">
                                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                                                        <path d="M12 3l9 16H3L12 3Z" />
                                                        <path d="M12 9v4" />
                                                        <circle cx="12" cy="17" r="1" />
                                                    </svg>
                                                </x-slot>
                                                <x-status-badge variant="{{ $badgeVariant }}" size="xs">{{ $badgeText }}</x-status-badge>
                                            </x-list-item>
                                        @endforeach
                                    @else
                                        <p class="text-sm text-slate-500">No low stock items yet.</p>
                                    @endif
                                </div>
                            </x-chart-card>

                            <x-chart-card title="Recent Activities" subtitle="Latest store updates">
                                {{-- TODO: gate this section by role/permission --}}
                                <div class="space-y-4">
                                    @if (count($activities))
                                        @foreach ($activities as $activity)
                                            <x-list-item
                                                title="{{ $activity['title'] }}"
                                                subtitle="{{ $activity['detail'] }}"
                                                meta="{{ $activity['time'] }}"
                                            >
                                                <x-slot name="icon">
                                                    @switch($activity['type'])
                                                        @case('order')
                                                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                                                                <path d="M6 6h14l-1.5 9H6L4 4H2" />
                                                                <circle cx="9" cy="20" r="1.5" />
                                                                <circle cx="18" cy="20" r="1.5" />
                                                            </svg>
                                                            @break
                                                        @case('status')
                                                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                                                                <path d="M6 12l4 4 8-8" />
                                                                <path d="M20 12a8 8 0 1 1-4-6" />
                                                            </svg>
                                                            @break
                                                        @case('review')
                                                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                                                                <path d="M12 3l2.8 5.6 6.2.9-4.5 4.3 1 6.1-5.5-2.9-5.5 2.9 1-6.1L3 9.5l6.2-.9L12 3Z" />
                                                            </svg>
                                                            @break
                                                        @case('product')
                                                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                                                                <path d="M4 7l8-4 8 4v10l-8 4-8-4V7Z" />
                                                                <path d="M4 7l8 4 8-4" />
                                                            </svg>
                                                            @break
                                                    @endswitch
                                                </x-slot>
                                                <span class="text-xs font-semibold text-slate-400">{{ $activity['time'] }}</span>
                                            </x-list-item>
                                        @endforeach
                                    @else
                                        <p class="text-sm text-slate-500">No recent activity yet.</p>
                                    @endif
                                </div>
                            </x-chart-card>
                        </div>

                        <div class="lg:col-span-4">
                            <x-chart-card title="Recent Orders" subtitle="Latest transactions">
                                {{-- TODO: gate this section by role/permission --}}
                                <x-table :headers="['Order', 'Customer', 'Date', 'Amount', 'Status']">
                                    @if (count($recentOrders))
                                        @foreach ($recentOrders as $order)
                                            <tr class="hover:bg-slate-50">
                                                <td class="px-4 py-3 text-xs font-semibold text-slate-500">{{ $order['id'] }}</td>
                                                <td class="px-4 py-3 text-sm font-semibold text-slate-900">{{ $order['customer'] }}</td>
                                                <td class="px-4 py-3 text-xs text-slate-500">{{ $order['date'] }}</td>
                                                <td class="px-4 py-3 text-sm font-semibold text-slate-900">{{ $order['amount'] }}</td>
                                                <td class="px-4 py-3">
                                                    <x-status-badge variant="{{ $statusVariants[$order['status']] ?? 'neutral' }}" size="xs">
                                                        {{ ucfirst(str_replace('_', ' ', $order['status'])) }}
                                                    </x-status-badge>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="px-4 py-6 text-center text-sm text-slate-500">
                                                No orders yet.
                                            </td>
                                        </tr>
                                    @endif
                                </x-table>
                                <div class="mt-4 flex justify-end">
                                    <button class="rounded-full border border-slate-200 px-4 py-2 text-xs font-semibold text-slate-600 transition hover:border-slate-300 hover:text-slate-900">
                                        View more
                                    </button>
                                </div>
                            </x-chart-card>
                        </div>
                    </section>
                </main>
            </div>
        </div>

        <script>
            window.localmartDashboard = {
                // TODO: replace with real API/DB data
                salesThisMonth: @json($salesSeries['thisMonth']),
                salesLastMonth: @json($salesSeries['lastMonth']),
                orderStatus: @json(array_column($statusBreakdown, 'value', 'label')),
            };
        </script>
    </body>
</html>
