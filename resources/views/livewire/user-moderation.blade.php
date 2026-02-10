<div class="py-6">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold text-slate-900">Users</h1>
    </div>

    @if(session('message'))
        <div class="mb-4 rounded-lg bg-green-50 p-4 text-green-800">
            {{ session('message') }}
        </div>
    @endif

    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center">
        <div class="flex flex-1 items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2.5">
            <svg class="h-5 w-5 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                <circle cx="11" cy="11" r="8" />
                <path d="m21 21-4.35-4.35" />
            </svg>
            <input type="text" wire:model.live="search" placeholder="Search users..." class="flex-1 bg-transparent text-sm focus:outline-none text-slate-900 placeholder-slate-500">
        </div>
        <input type="text" wire:model.defer="banReason" placeholder="Optional reason for ban/unban" class="flex-1 rounded-lg border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-900 placeholder-slate-500 focus:outline-none">
    </div>

    <div class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow">
        <table class="min-w-full divide-y divide-slate-200">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">Role</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider text-slate-500">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 bg-white">
                @forelse($users as $user)
                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-4 text-sm font-medium text-slate-900">{{ $user->name }}</td>
                        <td class="px-6 py-4 text-sm text-slate-600">{{ $user->email }}</td>
                        <td class="px-6 py-4 text-sm text-slate-600">{{ $user->getRoleNames()->join(', ') ?: 'None' }}</td>
                        <td class="px-6 py-4 text-sm">
                            @if($user->banned_at)
                                <span class="inline-flex rounded-full bg-red-100 px-2 py-1 text-xs font-semibold text-red-800">Banned</span>
                            @else
                                <span class="inline-flex rounded-full bg-green-100 px-2 py-1 text-xs font-semibold text-green-800">Active</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right text-sm">
                            @can('ban', $user)
                                <button
                                    wire:click="toggleBan({{ $user->id }})"
                                    class="rounded-lg px-3 py-1.5 text-sm font-semibold {{ $user->banned_at ? 'bg-amber-100 text-amber-800 hover:bg-amber-200' : 'bg-red-100 text-red-800 hover:bg-red-200' }}"
                                >
                                    {{ $user->banned_at ? 'Unban' : 'Ban' }}
                                </button>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-sm text-slate-500">
                            No users found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
