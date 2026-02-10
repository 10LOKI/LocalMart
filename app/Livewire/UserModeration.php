<?php

namespace App\Livewire;

use App\Models\ModerationLog;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.backoffice')]
class UserModeration extends Component
{
    use AuthorizesRequests;

    public $search = '';
    public $banReason = '';

    public function toggleBan($userId)
    {
        $user = User::findOrFail($userId);

        $this->authorize('ban', $user);

        $action = $user->banned_at ? 'unban' : 'ban';
        $user->update(['banned_at' => $user->banned_at ? null : now()]);

        ModerationLog::create([
            'moderator_id' => auth()->id(),
            'user_id' => $user->id,
            'action' => $action,
            'reason' => $this->banReason ?: null,
        ]);

        $this->banReason = '';

        session()->flash('message', $action === 'ban' ? 'User banned successfully.' : 'User unbanned successfully.');
    }

    public function render()
    {
        $query = User::query()->with('roles');

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            });
        }

        return view('livewire.user-moderation', [
            'users' => $query->latest()->get(),
        ]);
    }
}
