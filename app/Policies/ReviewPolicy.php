<?php

namespace App\Policies;

use App\Models\Review;
use App\Models\User;

class ReviewPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['admin', 'seller', 'moderator']);
    }

    public function delete(User $user, Review $review): bool
    {
        if ($user->hasAnyRole(['admin', 'moderator'])) {
            return true;
        }

        if ($user->hasRole('seller')) {
            return (int) $review->product?->seller_id === (int) $user->id;
        }

        return (int) $review->user_id === (int) $user->id;
    }
}
