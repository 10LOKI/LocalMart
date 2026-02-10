@props(['title' => '', 'value' => '', 'change' => '', 'changeType' => 'up', 'note' => '', 'icon' => null])

<div {{ $attributes->merge(['class' => 'rounded-2xl border border-slate-100 bg-white p-6 shadow-sm transition hover:shadow-md hover:border-slate-200']) }}>
    <div class="flex items-start justify-between gap-4 mb-4">
        <div class="flex-1">
            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-slate-500">{{ $title }}</p>
            <p class="mt-2 text-3xl font-bold text-slate-900">{{ $value }}</p>
        </div>

        @if ($icon)
            <div class="h-12 w-12 rounded-lg bg-gradient-to-br from-blue-50 to-blue-100 flex items-center justify-center text-blue-600">
                {{ $icon }}
            </div>
        @endif
    </div>

    <div class="flex items-center gap-2 text-xs {{ $changeType === 'up' ? 'text-emerald-600' : 'text-red-600' }}">
        @if ($changeType === 'up')
            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="currentColor">
                <path d="M7 14l5-5 5 5z" />
            </svg>
        @else
            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="currentColor">
                <path d="M7 10l5 5 5-5z" />
            </svg>
        @endif
        <span class="font-semibold">{{ $change }}</span>
        <span class="text-slate-500">{{ $note }}</span>
    </div>
</div>
