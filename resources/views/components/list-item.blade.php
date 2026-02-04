@props([
    'title',
    'subtitle' => null,
    'meta' => null,
])

<div {{ $attributes->merge(['class' => 'flex items-start gap-3']) }}>
    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-100 text-slate-600">
        @isset($icon)
            {{ $icon }}
        @endisset
    </div>
    <div class="min-w-0 flex-1">
        <p class="text-sm font-semibold text-slate-900">{{ $title }}</p>
        @if ($subtitle)
            <p class="text-xs text-slate-500">{{ $subtitle }}</p>
        @endif
        @if ($meta)
            <p class="mt-1 text-[11px] uppercase tracking-[0.2em] text-slate-400">{{ $meta }}</p>
        @endif
    </div>
    {{ $slot }}
</div>
