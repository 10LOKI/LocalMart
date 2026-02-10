@props(['variant' => 'neutral', 'size' => 'sm'])

@php
    $variants = [
        'success' => [
            'bg' => 'bg-emerald-50',
            'text' => 'text-emerald-700',
            'border' => 'border-emerald-200',
            'dot' => 'bg-emerald-500',
        ],
        'danger' => [
            'bg' => 'bg-red-50',
            'text' => 'text-red-700',
            'border' => 'border-red-200',
            'dot' => 'bg-red-500',
        ],
        'warning' => [
            'bg' => 'bg-amber-50',
            'text' => 'text-amber-700',
            'border' => 'border-amber-200',
            'dot' => 'bg-amber-500',
        ],
        'info' => [
            'bg' => 'bg-blue-50',
            'text' => 'text-blue-700',
            'border' => 'border-blue-200',
            'dot' => 'bg-blue-500',
        ],
        'neutral' => [
            'bg' => 'bg-slate-50',
            'text' => 'text-slate-700',
            'border' => 'border-slate-200',
            'dot' => 'bg-slate-400',
        ],
    ];

    $colors = $variants[$variant] ?? $variants['neutral'];
    $sizeClasses = $size === 'xs' ? 'px-2 py-1 text-xs' : 'px-3 py-1.5 text-sm';
@endphp

<span {{ $attributes->merge([
    'class' => "inline-flex items-center gap-2 rounded-full border font-semibold {$colors['bg']} {$colors['text']} {$colors['border']} {$sizeClasses}"
]) }}>
    <span class="h-2 w-2 rounded-full {{ $colors['dot'] }}"></span>
    {{ $slot }}
</span>
