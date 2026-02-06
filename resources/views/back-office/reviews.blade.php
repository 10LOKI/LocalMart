{{-- TODO: Replace with real data from DB --}}
@php
    $reviewStats = [
        [
            'title' => 'Total Reviews',
            'value' => '2,847',
            'change' => '+12.5%',
            'changeType' => 'up',
            'icon' => 'reviews',
            'note' => 'This month',
        ],
        [
            'title' => 'Avg Rating',
            'value' => '4.7/5',
            'change' => '+0.3',
            'changeType' => 'up',
            'icon' => 'rating',
            'note' => 'Customer satisfaction',
        ],
        [
            'title' => 'Pending Reviews',
            'value' => '42',
            'change' => '-8.2%',
            'changeType' => 'down',
            'icon' => 'pending',
            'note' => 'Awaiting moderation',
        ],
        [
            'title' => 'Reported Reviews',
            'value' => '12',
            'change' => '+2.1%',
            'changeType' => 'up',
            'icon' => 'flag',
            'note' => 'Flagged content',
        ],
    ];

    $reviews = [
        [
            'id' => 'REV-2847',
            'product' => 'Organic Maple Granola',
            'customer' => 'Emma Wilson',
            'email' => 'emma.wilson@example.com',
            'rating' => 5,
            'title' => 'Best breakfast cereal ever!',
            'comment' => 'Absolutely love this granola. Perfect crunch and the taste is amazing. Highly recommend!',
            'date' => 'Feb 5, 2026',
            'status' => 'published',
            'verified' => true,
            'helpful' => 124,
            'unhelpful' => 3,
        ],
        [
            'id' => 'REV-2846',
            'product' => 'Cold Brew Concentrate',
            'customer' => 'James Chen',
            'email' => 'james.chen@example.com',
            'rating' => 4,
            'title' => 'Great product, good value',
            'comment' => 'Good cold brew concentrate. Makes great coffee. Could use better packaging.',
            'date' => 'Feb 4, 2026',
            'status' => 'published',
            'verified' => true,
            'helpful' => 89,
            'unhelpful' => 5,
        ],
        [
            'id' => 'REV-2845',
            'product' => 'Ceramic Pour-Over Kit',
            'customer' => 'Sarah Martinez',
            'email' => 'sarah.martinez@example.com',
            'rating' => 5,
            'title' => 'Perfect pour-over experience',
            'comment' => 'Excellent quality ceramic kit. Makes the perfect cup of coffee every time.',
            'date' => 'Feb 3, 2026',
            'status' => 'published',
            'verified' => true,
            'helpful' => 156,
            'unhelpful' => 2,
        ],
        [
            'id' => 'REV-2844',
            'product' => 'Almond Protein Bars',
            'customer' => 'Michael Johnson',
            'email' => 'michael.j@example.com',
            'rating' => 3,
            'title' => 'Decent snack, could be better',
            'comment' => 'These protein bars are okay. Taste could be improved, but good macros.',
            'date' => 'Feb 2, 2026',
            'status' => 'published',
            'verified' => true,
            'helpful' => 45,
            'unhelpful' => 12,
        ],
        [
            'id' => 'REV-2843',
            'product' => 'Artisan Honey Blend',
            'customer' => 'Lisa Anderson',
            'email' => 'lisa.anderson@example.com',
            'rating' => 5,
            'title' => 'Premium quality honey',
            'comment' => 'This honey is absolutely delicious. Pure, natural, and worth every penny!',
            'date' => 'Feb 1, 2026',
            'status' => 'pending',
            'verified' => true,
            'helpful' => 0,
            'unhelpful' => 0,
        ],
        [
            'id' => 'REV-2842',
            'product' => 'Organic Maple Granola',
            'customer' => 'Robert Taylor',
            'email' => 'robert.taylor@example.com',
            'rating' => 2,
            'title' => 'Not as good as expected',
            'comment' => 'Disappointed with the quality. Not worth the price.',
            'date' => 'Jan 31, 2026',
            'status' => 'rejected',
            'verified' => true,
            'helpful' => 34,
            'unhelpful' => 89,
        ],
        [
            'id' => 'REV-2841',
            'product' => 'Cold Brew Concentrate',
            'customer' => 'Jessica Brown',
            'email' => 'jessica.brown@example.com',
            'rating' => 5,
            'title' => 'Best cold brew on the market',
            'comment' => 'This concentrate is incredible. So smooth and perfect flavor.',
            'date' => 'Jan 30, 2026',
            'status' => 'published',
            'verified' => true,
            'helpful' => 201,
            'unhelpful' => 1,
        ],
        [
            'id' => 'REV-2840',
            'product' => 'Health Supplement Bundle',
            'customer' => 'David Lee',
            'email' => 'david.lee@example.com',
            'rating' => 4,
            'title' => 'Good supplements, great value',
            'comment' => 'Quality supplements at a reasonable price. Will buy again.',
            'date' => 'Jan 29, 2026',
            'status' => 'flagged',
            'verified' => false,
            'helpful' => 67,
            'unhelpful' => 23,
        ],
    ];

    $statusVariants = [
        'published' => 'success',
        'pending' => 'warning',
        'rejected' => 'danger',
        'flagged' => 'info',
    ];

    $ratingColors = [
        5 => 'text-emerald-600 bg-emerald-50',
        4 => 'text-blue-600 bg-blue-50',
        3 => 'text-amber-600 bg-amber-50',
        2 => 'text-orange-600 bg-orange-50',
        1 => 'text-red-600 bg-red-50',
    ];
@endphp

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Reviews - LocalMart Dashboard</title>

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
                    <h1 class="text-3xl font-bold text-slate-900">Reviews</h1>
                    <p class="mt-2 text-sm text-slate-500">Manage customer reviews and ratings</p>
                </div>
            </section>

            <!-- Stats Cards -->
            <section class="mb-6 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                @foreach ($reviewStats as $card)
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
                                @case('reviews')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                    </svg>
                                    @break
                                @case('rating')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M12 3l2.8 5.6 6.2.9-4.5 4.3 1 6.1-5.5-2.9-5.5 2.9 1-6.1L3 9.5l6.2-.9L12 3Z" />
                                    </svg>
                                    @break
                                @case('pending')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <circle cx="12" cy="12" r="9" />
                                        <path d="M12 6v6l4 2" />
                                    </svg>
                                    @break
                                @case('flag')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z" />
                                        <line x1="4" y1="22" x2="4" y2="15" />
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
                            <input type="text" placeholder="Search by customer, product or review ID..." class="flex-1 bg-transparent text-sm focus:outline-none text-slate-900 placeholder-slate-500">
                        </div>

                        <div class="flex gap-2 flex-wrap">
                            <label class="flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2.5">
                                <svg class="h-4 w-4 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <path d="M12 3l9 16H3L12 3Z" />
                                </svg>
                                <select class="bg-transparent text-sm font-medium text-slate-600 focus:outline-none">
                                    <option>All Status</option>
                                    <option>Published</option>
                                    <option>Pending</option>
                                    <option>Rejected</option>
                                    <option>Flagged</option>
                                </select>
                            </label>

                            <label class="flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2.5">
                                <svg class="h-4 w-4 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <path d="M12 3l2.8 5.6 6.2.9-4.5 4.3 1 6.1-5.5-2.9-5.5 2.9 1-6.1L3 9.5l6.2-.9L12 3Z" />
                                </svg>
                                <select class="bg-transparent text-sm font-medium text-slate-600 focus:outline-none">
                                    <option>All Ratings</option>
                                    <option>5 Stars</option>
                                    <option>4 Stars</option>
                                    <option>3 Stars</option>
                                    <option>2 Stars</option>
                                    <option>1 Star</option>
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
                                    <option>This Week</option>
                                    <option>This Month</option>
                                    <option>Last 3 Months</option>
                                </select>
                            </label>
                        </div>
                    </div>
                </x-chart-card>
            </section>

            <!-- Reviews List -->
            <section>
                <x-chart-card title="All Reviews" subtitle="Customer feedback and ratings">
                    <div class="space-y-4">
                        @foreach ($reviews as $review)
                            <div class="rounded-xl border border-slate-200 bg-white p-6 transition hover:shadow-md hover:border-slate-300 group">
                                <!-- Header -->
                                <div class="flex items-start justify-between gap-4 mb-4">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-3 mb-2">
                                            <!-- Avatar -->
                                            <div class="h-10 w-10 rounded-full {{ ['bg-blue-100', 'bg-emerald-100', 'bg-purple-100', 'bg-amber-100', 'bg-rose-100', 'bg-cyan-100', 'bg-lime-100'][array_rand(['bg-blue-100', 'bg-emerald-100', 'bg-purple-100', 'bg-amber-100', 'bg-rose-100', 'bg-cyan-100', 'bg-lime-100'])] }} flex items-center justify-center text-sm font-semibold text-slate-600">
                                                {{ substr($review['customer'], 0, 1) }}
                                            </div>
                                            <div>
                                                <p class="text-sm font-semibold text-slate-900">{{ $review['customer'] }}</p>
                                                <p class="text-xs text-slate-500">{{ $review['email'] }}</p>
                                            </div>
                                        </div>

                                        <!-- Rating Stars -->
                                        <div class="flex items-center gap-3 mt-2">
                                            <div class="flex items-center gap-1">
                                                @for ($i = 0; $i < 5; $i++)
                                                    <svg class="h-4 w-4 {{ $i < $review['rating'] ? 'text-amber-400' : 'text-slate-300' }}" viewBox="0 0 24 24" fill="currentColor">
                                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                                    </svg>
                                                @endfor
                                            </div>
                                            <span class="text-xs font-semibold {{ $ratingColors[$review['rating']] ?? 'text-slate-600 bg-slate-50' }} px-2 py-1 rounded-full">
                                                        {{ $review['rating'] }}/5
                                                    </span>
                                            @if ($review['verified'])
                                                <span class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-2 py-1 rounded-full flex items-center gap-1">
                                                            <svg class="h-3 w-3" viewBox="0 0 24 24" fill="currentColor">
                                                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z" />
                                                            </svg>
                                                            Verified Purchase
                                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Status Badge -->
                                    <x-status-badge
                                        variant="{{ $statusVariants[$review['status']] ?? 'neutral' }}"
                                        size="sm"
                                    >
                                        {{ ucfirst($review['status']) }}
                                    </x-status-badge>
                                </div>

                                <!-- Review Title & Content -->
                                <div class="mb-4">
                                    <h4 class="text-sm font-semibold text-slate-900 mb-2">{{ $review['title'] }}</h4>
                                    <p class="text-sm text-slate-600 line-clamp-3">{{ $review['comment'] }}</p>
                                </div>

                                <!-- Footer -->
                                <div class="flex items-center justify-between pt-4 border-t border-slate-200">
                                    <div class="flex items-center gap-6 text-xs text-slate-500">
                                        <div class="flex items-center gap-2">
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M4 7l8-4 8 4v10l-8 4-8-4V7Z" />
                                            </svg>
                                            <span class="font-medium">{{ $review['product'] }}</span>
                                        </div>
                                        <span>{{ $review['date'] }}</span>
                                    </div>

                                    <div class="flex items-center gap-2 opacity-0 transition group-hover:opacity-100">
                                        <button
                                            class="inline-flex items-center justify-center h-8 w-8 rounded-lg text-slate-500 hover:bg-slate-100 hover:text-slate-700 transition"
                                            title="Helpful"
                                        >
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M14 10h4.764a2 2 0 0 1 1.789 2.894l-3.646 7.23a2 2 0 0 1-1.789 1.106H5a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2h2.25a2 2 0 0 0 1.6-.8l2.704-3.38a2 2 0 0 0 .3-2.83l-.704-1.05A2 2 0 0 0 9.761 2H9a2 2 0 0 0-2 2v2" />
                                            </svg>
                                        </button>

                                        <button
                                            class="inline-flex items-center justify-center h-8 w-8 rounded-lg text-slate-500 hover:bg-slate-100 hover:text-slate-700 transition"
                                            title="Approve"
                                        >
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <polyline points="20 6 9 17 4 12" />
                                            </svg>
                                        </button>

                                        <button
                                            class="inline-flex items-center justify-center h-8 w-8 rounded-lg text-slate-500 hover:bg-red-50 hover:text-red-600 transition"
                                            title="Reject"
                                        >
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <line x1="18" y1="6" x2="6" y2="18" />
                                                <line x1="6" y1="6" x2="18" y2="18" />
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
                                                    View Full Review
                                                </button>
                                                <button class="block w-full px-4 py-2 text-left text-sm text-slate-700 hover:bg-slate-50">
                                                    Reply to Review
                                                </button>
                                                <button class="block w-full px-4 py-2 text-left text-sm text-slate-700 hover:bg-slate-50">
                                                    Contact Customer
                                                </button>
                                                <button class="block w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50 last:rounded-b-lg">
                                                    Delete Review
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Helpful Stats -->
                                <div class="mt-4 flex items-center gap-4 text-xs text-slate-500 pt-4 border-t border-slate-100">
                                    <span>👍 {{ $review['helpful'] }} found helpful</span>
                                    <span>👎 {{ $review['unhelpful'] }} found unhelpful</span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6 flex items-center justify-between border-t border-slate-200 pt-6">
                        <p class="text-xs text-slate-500">Showing 8 of 2,847 reviews</p>
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
                            <button class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 text-slate-600 transition hover:border-slate-300 hover:text-slate-900">356</button>
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
