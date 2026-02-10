@props([
    'variant' => 'neutral',
    'size' => 'sm',
])

@php
    $variants = [
        'success' => 'bg-emerald-50 text-emerald-700 ring-emerald-200',
        'warning' => 'bg-amber-50 text-amber-700 ring-amber-200',
        'danger' => 'bg-rose-50 text-rose-700 ring-rose-200',
        'info' => 'bg-sky-50 text-sky-700 ring-sky-200',
        'neutral' => 'bg-slate-100 text-slate-600 ring-slate-200',
    ];

    $sizes = [
        'xs' => 'text-[10px] px-2 py-0.5',
        'sm' => 'text-xs px-2.5 py-1',
        'md' => 'text-sm px-3 py-1.5',
    ];
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex items-center rounded-full font-semibold ring-1 ' . ($variants[$variant] ?? $variants['neutral']) . ' ' . ($sizes[$size] ?? $sizes['sm'])]) }}>
    {{ $slot }}
</span>
