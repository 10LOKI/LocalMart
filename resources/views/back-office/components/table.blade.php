@props(['headers' => []])

<div class="overflow-x-auto">
    <table class="w-full">
        @if (count($headers) > 0)
            <thead>
            <tr class="border-b border-slate-200 text-left text-xs font-semibold uppercase tracking-[0.1em] text-slate-500">
                @foreach ($headers as $header)
                    <th class="px-4 py-4">{{ $header }}</th>
                @endforeach
            </tr>
            </thead>
        @endif

        <tbody class="divide-y divide-slate-200">
        {{ $slot }}
        </tbody>
    </table>
</div>
