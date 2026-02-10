@props([
    'title',
    'value',
    'change',
    'changeType' => 'up',
    'note' => null,
])

@php
    $isDown = $changeType === 'down';
@endphp

<div {{ $attributes->merge(['class' => 'rounded-2xl border border-slate-100 bg-white p-5 shadow-[0_20px_45px_-30px_rgba(15,23,42,0.4)]']) }}>
    <div class="flex items-start justify-between gap-4">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-slate-500">{{ $title }}</p>
            <p class="mt-2 text-2xl font-semibold text-slate-900">{{ $value }}</p>
            @if ($note)
                <p class="mt-1 text-xs text-slate-500">{{ $note }}</p>
            @endif
        </div>
        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-slate-100 text-slate-700">
            @isset($icon)
                {{ $icon }}
            @endisset
        </div>
    </div>
    <div class="mt-4 flex items-center gap-2">
        <x-status-badge variant="{{ $isDown ? 'danger' : 'success' }}" size="xs">
            <span class="flex items-center gap-1">
                <svg class="h-3 w-3" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2">
                    @if ($isDown)
                        <path d="M5 8l5 5 5-5" />
                        <path d="M10 3v10" />
                    @else
                        <path d="M5 12l5-5 5 5" />
                        <path d="M10 17V7" />
                    @endif
                </svg>
                <span>{{ $change }}</span>
            </span>
        </x-status-badge>
        <span class="text-xs text-slate-500">vs last month</span>
    </div>
</div>
