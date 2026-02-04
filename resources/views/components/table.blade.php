@props([
    'headers' => [],
])

<div {{ $attributes->merge(['class' => 'overflow-hidden rounded-xl border border-slate-100']) }}>
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            @if (count($headers))
                <thead class="bg-slate-50 text-[11px] uppercase tracking-[0.2em] text-slate-500">
                    <tr>
                        @foreach ($headers as $header)
                            <th class="px-4 py-3 text-left font-semibold">{{ $header }}</th>
                        @endforeach
                    </tr>
                </thead>
            @endif
            <tbody class="divide-y divide-slate-100">
                {{ $slot }}
            </tbody>
        </table>
    </div>
</div>
