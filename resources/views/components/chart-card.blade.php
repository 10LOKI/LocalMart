@props([
    'title',
    'subtitle' => null,
])

<div {{ $attributes->merge(['class' => 'rounded-2xl border border-slate-100 bg-white shadow-[0_18px_40px_-28px_rgba(15,23,42,0.45)]']) }}>
    <div class="flex flex-wrap items-start justify-between gap-4 border-b border-slate-100 px-6 py-4">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-slate-500">{{ $title }}</p>
            @if ($subtitle)
                <p class="mt-1 text-sm font-semibold text-slate-900">{{ $subtitle }}</p>
            @endif
        </div>
        @isset($action)
            <div class="flex flex-wrap items-center gap-2 text-xs text-slate-500">
                {{ $action }}
            </div>
        @endisset
    </div>
    <div class="p-6">
        {{ $slot }}
    </div>
</div>
