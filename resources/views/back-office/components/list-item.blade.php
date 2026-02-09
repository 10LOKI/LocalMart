@props(['title' => '', 'subtitle' => '', 'meta' => '', 'icon' => null])

<div class="flex items-center gap-4">
    @if ($icon)
        <div class="h-10 w-10 rounded-lg bg-slate-100 flex items-center justify-center text-slate-600">
            {{ $icon }}
        </div>
    @endif

    <div class="flex-1 min-w-0">
        <p class="text-sm font-semibold text-slate-900 truncate">{{ $title }}</p>
        @if ($subtitle)
            <p class="mt-0.5 text-xs text-slate-500 truncate">{{ $subtitle }}</p>
        @endif
    </div>

    @if ($meta || $slot->isNotEmpty())
        <div class="text-right">
            @if ($meta)
                <p class="text-xs text-slate-500 font-medium">{{ $meta }}</p>
            @endif
            @if ($slot->isNotEmpty())
                <div class="mt-1">
                    {{ $slot }}
                </div>
            @endif
        </div>
    @endif
</div>
