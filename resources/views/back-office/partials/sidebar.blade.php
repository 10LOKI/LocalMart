<div x-cloak x-show="sidebarOpen" class="fixed inset-0 z-40 bg-slate-900/50 lg:hidden" @click="sidebarOpen = false" x-transition.opacity></div>

<aside
    x-cloak
    class="fixed inset-y-0 left-0 z-50 w-72 -translate-x-full border-r border-slate-200/80 bg-white/95 backdrop-blur transition-transform duration-300 lg:static lg:shrink-0 lg:translate-x-0"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
>
    <div class="flex h-full flex-col">
        <div class="px-6 pb-6 pt-7">
            <div class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-sky-500 to-indigo-500 text-white shadow-lg shadow-sky-500/30">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                        <path d="M4 7h16l-1 11a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2L4 7Z" />
                        <path d="M9 7V5a3 3 0 0 1 6 0v2" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-semibold text-slate-900">LocalMart</p>
                    <p class="text-xs text-slate-500">E-commerce Admin</p>
                </div>
            </div>
        </div>

        <nav class="flex-1 space-y-6 px-4 pb-6">
            <div>
                <p class="px-3 text-[11px] uppercase tracking-[0.3em] text-slate-400">Overview</p>
                <div class="mt-3 space-y-1">
                    <a href="{{route('backoffice.dashboard')}}" class="group flex items-center gap-3 rounded-xl bg-slate-900 px-3 py-2 text-sm font-semibold text-white shadow-sm shadow-slate-900/20" aria-current="page">
                        <svg class="h-5 w-5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                            <path d="M3 12l9-9 9 9" />
                            <path d="M5 10v10h14V10" />
                        </svg>
                        Dashboard
                    </a>
                    <a href="{{route('backoffice.orders.index')}}" class="group flex items-center gap-3 rounded-xl px-3 py-2 text-sm font-semibold text-slate-600 transition hover:bg-slate-100 hover:text-slate-900">
                        <svg class="h-5 w-5 text-slate-400 group-hover:text-slate-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                            <path d="M6 6h14l-1.5 9H6L4 4H2" />
                            <circle cx="9" cy="20" r="1.5" />
                            <circle cx="18" cy="20" r="1.5" />
                        </svg>
                        Orders
                    </a>
                    <a href="{{route('backoffice.products.index')}}" class="group flex items-center gap-3 rounded-xl px-3 py-2 text-sm font-semibold text-slate-600 transition hover:bg-slate-100 hover:text-slate-900">
                        <svg class="h-5 w-5 text-slate-400 group-hover:text-slate-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                            <path d="M4 7l8-4 8 4v10l-8 4-8-4V7Z" />
                            <path d="M4 7l8 4 8-4" />
                        </svg>
                        Products
                    </a>
                    <a href="{{route('backoffice.categories.index')}}" class="group flex items-center gap-3 rounded-xl px-3 py-2 text-sm font-semibold text-slate-600 transition hover:bg-slate-100 hover:text-slate-900">
                        <svg class="h-5 w-5 text-slate-400 group-hover:text-slate-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                            <path d="M4 7h12l4 4-8 8-8-8 4-4Z" />
                            <path d="M12 7v4" />
                        </svg>
                        Categories
                    </a>
                </div>
            </div>

            <div>
                <p class="px-3 text-[11px] uppercase tracking-[0.3em] text-slate-400">Engagement</p>
                <div class="mt-3 space-y-1">
                    <a href="{{route('backoffice.reviews.index')}}" class="group flex items-center gap-3 rounded-xl px-3 py-2 text-sm font-semibold text-slate-600 transition hover:bg-slate-100 hover:text-slate-900">
                        <svg class="h-5 w-5 text-slate-400 group-hover:text-slate-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                            <path d="M12 3l2.8 5.6 6.2.9-4.5 4.3 1 6.1-5.5-2.9-5.5 2.9 1-6.1L3 9.5l6.2-.9L12 3Z" />
                        </svg>
                        Reviews
                    </a>
                    <a href="{{route('backoffice.users.index')}}" class="group flex items-center gap-3 rounded-xl px-3 py-2 text-sm font-semibold text-slate-600 transition hover:bg-slate-100 hover:text-slate-900">
                        <svg class="h-5 w-5 text-slate-400 group-hover:text-slate-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                            <path d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z" />
                            <path d="M4 21c2-4 6-6 8-6s6 2 8 6" />
                        </svg>
                        Users
                    </a>
                    {{-- TODO: gate admin-only links (Roles & Permissions) --}}
                    <a href="{{route('backoffice.roles.index')}}" class="group flex items-center gap-3 rounded-xl px-3 py-2 text-sm font-semibold text-slate-600 transition hover:bg-slate-100 hover:text-slate-900">
                        <svg class="h-5 w-5 text-slate-400 group-hover:text-slate-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                            <path d="M12 3l7 3v6c0 5-3 8-7 9-4-1-7-4-7-9V6l7-3Z" />
                            <path d="M9 12l2 2 4-4" />
                        </svg>
                        Roles &amp; Permissions
                    </a>
                    <a href="#" class="group flex items-center gap-3 rounded-xl px-3 py-2 text-sm font-semibold text-slate-600 transition hover:bg-slate-100 hover:text-slate-900">
                        <svg class="h-5 w-5 text-slate-400 group-hover:text-slate-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                            <path d="M15 17h5l-1.4-2.5a3 3 0 0 1 .1-3l1.3-2.5h-5" />
                            <path d="M4 7h11v10H4z" />
                        </svg>
                        Notifications
                    </a>
                </div>
            </div>

            <div>
                <p class="px-3 text-[11px] uppercase tracking-[0.3em] text-slate-400">Operations</p>
                <div class="mt-3 space-y-1">
                    <a href="#" class="group flex items-center gap-3 rounded-xl px-3 py-2 text-sm font-semibold text-slate-600 transition hover:bg-slate-100 hover:text-slate-900">
                        <svg class="h-5 w-5 text-slate-400 group-hover:text-slate-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                            <rect x="3" y="6" width="18" height="12" rx="2" />
                            <path d="M3 10h18" />
                            <path d="M7 15h3" />
                        </svg>
                        Payments
                    </a>
                    <a href="#" class="group flex items-center gap-3 rounded-xl px-3 py-2 text-sm font-semibold text-slate-600 transition hover:bg-slate-100 hover:text-slate-900">
                        <svg class="h-5 w-5 text-slate-400 group-hover:text-slate-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                            <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            <path d="M19.4 15a1.7 1.7 0 0 0 .3 1.8l.1.1a2 2 0 1 1-2.8 2.8l-.1-.1a1.7 1.7 0 0 0-1.8-.3 1.7 1.7 0 0 0-1 1.5V22a2 2 0 1 1-4 0v-.2a1.7 1.7 0 0 0-1-1.5 1.7 1.7 0 0 0-1.8.3l-.1.1a2 2 0 1 1-2.8-2.8l.1-.1a1.7 1.7 0 0 0 .3-1.8 1.7 1.7 0 0 0-1.5-1H2a2 2 0 1 1 0-4h.2a1.7 1.7 0 0 0 1.5-1 1.7 1.7 0 0 0-.3-1.8l-.1-.1a2 2 0 1 1 2.8-2.8l.1.1a1.7 1.7 0 0 0 1.8.3H8a1.7 1.7 0 0 0 1-1.5V2a2 2 0 1 1 4 0v.2a1.7 1.7 0 0 0 1 1.5 1.7 1.7 0 0 0 1.8-.3l.1-.1a2 2 0 1 1 2.8 2.8l-.1.1a1.7 1.7 0 0 0-.3 1.8V8c0 .7.4 1.3 1 1.5.3.1.6.2 1 .2H22a2 2 0 1 1 0 4h-.2a1.7 1.7 0 0 0-1.5 1Z" />
                        </svg>
                        Settings
                    </a>
                </div>
            </div>
        </nav>

        <div class="px-4 pb-6">
            <div class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                <p class="text-xs font-semibold text-slate-600">Need help?</p>
                <p class="mt-2 text-xs text-slate-500">Reach LocalMart support for onboarding or POS setup.</p>
                <button class="mt-3 w-full rounded-full bg-slate-900 px-3 py-2 text-xs font-semibold text-white transition hover:bg-slate-800">Contact support</button>
            </div>
        </div>
    </div>
</aside>
