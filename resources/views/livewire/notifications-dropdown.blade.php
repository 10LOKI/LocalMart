<div wire:poll.6s x-data="{ open: false }" class="relative">
    <button
        class="relative inline-flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-600 shadow-sm transition hover:bg-slate-50"
        @click="open = !open"
        aria-label="Notifications"
        type="button"
    >
        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
            <path d="M6 17h12l-1.5-2.5a6 6 0 0 1-.7-2.8V10a6 6 0 1 0-12 0v1.7c0 1-.3 2-.8 2.8L6 17Z" />
            <path d="M9 17a3 3 0 0 0 6 0" />
        </svg>
        @if($unreadCount > 0)
            <span class="absolute -right-1 -top-1 inline-flex min-h-5 min-w-5 items-center justify-center rounded-full bg-rose-500 px-1 text-[11px] font-semibold text-white">
                {{ $unreadCount > 99 ? '99+' : $unreadCount }}
            </span>
        @endif
    </button>

    <div
        x-cloak
        x-show="open"
        x-transition
        @click.outside="open = false"
        class="absolute right-0 z-50 mt-3 w-80 rounded-2xl border border-slate-200 bg-white p-4 text-sm shadow-xl"
    >
        <div class="mb-3 flex items-center justify-between">
            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-slate-400">Notifications</p>
            @if($unreadCount > 0)
                <button wire:click="markAllAsRead" class="text-xs font-semibold text-sky-600 hover:text-sky-700" type="button">
                    Mark all read
                </button>
            @endif
        </div>

        <div class="max-h-80 space-y-2 overflow-y-auto pr-1">
            @forelse($notifications as $notification)
                <button
                    type="button"
                    wire:click="markAsRead({{ $notification->id }})"
                    class="w-full rounded-xl border px-3 py-2 text-left transition hover:bg-slate-50 {{ $notification->read_at ? 'border-slate-100 bg-white' : 'border-sky-100 bg-sky-50/40' }}"
                >
                    <p class="font-semibold text-slate-900">{{ $notification->title ?: 'Notification' }}</p>
                    <p class="mt-1 text-xs text-slate-500">{{ $notification->message }}</p>
                    <p class="mt-1 text-[11px] text-slate-400">{{ $notification->created_at?->diffForHumans() }}</p>
                </button>
            @empty
                <p class="rounded-xl border border-slate-100 bg-slate-50 p-3 text-xs text-slate-500">
                    No notifications yet.
                </p>
            @endforelse
        </div>
    </div>
</div>
