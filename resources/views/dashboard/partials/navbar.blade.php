<header class="sticky top-0 z-30 border-b border-slate-200/70 bg-white/70 backdrop-blur">
    <div class="flex flex-wrap items-center justify-between gap-4 px-6 py-2 lg:px-10">
        <div class="flex items-center gap-3">
            <button
                class="inline-flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-600 shadow-sm transition hover:bg-slate-50 lg:hidden"
                @click="sidebarOpen = true"
                aria-label="Open sidebar"
            >
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                    <path d="M4 6h16" />
                    <path d="M4 12h16" />
                    <path d="M4 18h16" />
                </svg>
            </button>
            <div>
                <p class="text-[11px] font-semibold uppercase tracking-[0.35em] text-slate-400">LocalMart / Dashboard</p>
                <h1 class="text-xl font-semibold text-slate-900">Operations Overview</h1>
            </div>
        </div>

        <div class="flex flex-1 items-center justify-end gap-3">
            <div class="relative hidden w-72 md:block">
                <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-slate-400">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                        <circle cx="11" cy="11" r="7" />
                        <path d="M20 20l-3.5-3.5" />
                    </svg>
                </span>
                <input
                    type="text"
                    placeholder="Search orders, products..."
                    class="w-full rounded-full border border-slate-200 bg-white py-2 pl-10 pr-4 text-sm text-slate-600 shadow-sm focus:border-slate-300 focus:outline-none focus:ring-2 focus:ring-sky-200"
                />
            </div>

            <div class="relative" x-data="{ open: false }">
                <button
                    class="relative inline-flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-600 shadow-sm transition hover:bg-slate-50"
                    @click="open = !open"
                    aria-label="Notifications"
                >
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                        <path d="M6 17h12l-1.5-2.5a6 6 0 0 1-.7-2.8V10a6 6 0 1 0-12 0v1.7c0 1-.3 2-.8 2.8L6 17Z" />
                        <path d="M9 17a3 3 0 0 0 6 0" />
                    </svg>
                    <span class="absolute right-1.5 top-1.5 h-2 w-2 rounded-full bg-rose-500"></span>
                </button>
                <div
                    x-cloak
                    x-show="open"
                    x-transition
                    @click.outside="open = false"
                    class="absolute right-0 mt-3 w-72 rounded-2xl border border-slate-200 bg-white p-4 text-sm shadow-xl"
                >
                    <p class="text-xs font-semibold uppercase tracking-[0.25em] text-slate-400">Notifications</p>
                    <div class="mt-3 space-y-3 text-sm">
                        <div class="rounded-xl border border-slate-100 bg-slate-50 p-3">
                            <p class="font-semibold text-slate-900">5 orders need review</p>
                            <p class="mt-1 text-xs text-slate-500">Pending payments require confirmation.</p>
                        </div>
                        <div class="rounded-xl border border-slate-100 bg-slate-50 p-3">
                            <p class="font-semibold text-slate-900">Low stock on 3 products</p>
                            <p class="mt-1 text-xs text-slate-500">Reorder within 48 hours.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative" x-data="{ open: false }">
                <button
                    class="inline-flex items-center gap-3 rounded-full border border-slate-200 bg-white px-3 py-1.5 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-50"
                    @click="open = !open"
                    aria-label="Profile menu"
                >
                    <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-slate-900 text-xs font-semibold text-white">LM</span>
                    <span class="hidden sm:block">Layla Monroe</span>
                    <svg class="h-4 w-4 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                        <path d="M6 9l6 6 6-6" />
                    </svg>
                </button>
                <div
                    x-cloak
                    x-show="open"
                    x-transition
                    @click.outside="open = false"
                    class="absolute right-0 mt-3 w-56 rounded-2xl border border-slate-200 bg-white p-3 text-sm shadow-xl"
                >
                    <p class="px-2 text-xs font-semibold uppercase tracking-[0.25em] text-slate-400">Account</p>
                    <div class="mt-2 space-y-1">
                        <a href="#" class="block rounded-lg px-2 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">Profile</a>
                        <a href="#" class="block rounded-lg px-2 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">Settings</a>
                        <a href="#" class="block rounded-lg px-2 py-2 text-sm font-semibold text-rose-600 hover:bg-rose-50">Sign out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
