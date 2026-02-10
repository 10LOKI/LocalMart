<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;

class ProductPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['admin', 'seller']);
    }

    public function view(User $user, Product $product): bool
    {
        return $user->hasRole('admin')
            || ($user->hasRole('seller') && $product->seller_id === $user->id);
    }

    public function create(User $user): bool
    {
        return $user->hasAnyRole(['admin', 'seller']);
    }

    public function update(User $user, Product $product): bool
    {
        return $this->view($user, $product);
    }

    public function delete(User $user, Product $product): bool
    {
        return $this->view($user, $product);
    }
}
