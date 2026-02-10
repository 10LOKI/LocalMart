@props(['title' => '', 'subtitle' => '', 'action' => null])

<div {{ $attributes->merge(['class' => 'rounded-2xl border border-slate-100 bg-white p-6 shadow-sm']) }}>
    @if ($title || $subtitle || $action)
        <div class="mb-6 flex items-start justify-between gap-4">
            <div class="flex-1">
                @if ($title)
                    <h3 class="text-lg font-semibold text-slate-900">{{ $title }}</h3>
                @endif
                @if ($subtitle)
                    <p class="mt-1 text-sm text-slate-500">{{ $subtitle }}</p>
                @endif
            </div>

            @if ($action)
                <div class="flex items-center gap-2">
                    {{ $action }}
                </div>
            @endif
        </div>
    @endif

    {{ $slot }}
</div>
