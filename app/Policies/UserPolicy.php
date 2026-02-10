<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['admin', 'moderator']);
    }

    public function ban(User $user, User $target): bool
    {
        if (! $user->hasAnyRole(['admin', 'moderator'])) {
            return false;
        }

        if ($user->id === $target->id) {
            return false;
        }

        if ($target->hasRole('admin') && ! $user->hasRole('admin')) {
            return false;
        }

        return true;
    }
}
