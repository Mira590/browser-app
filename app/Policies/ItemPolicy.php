<?php

namespace App\Policies;

use App\Models\Item;
use App\Models\User;

class ItemPolicy
{
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['admin', 'superuser', 'user']);
    }

    public function view(User $user, Item $item): bool
    {
        return in_array($user->role, ['admin', 'superuser', 'user']);
    }

    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'superuser']);
    }

    public function update(User $user, Item $item): bool
    {
        return in_array($user->role, ['admin', 'superuser', 'user']);
    }

    public function delete(User $user, Item $item): bool
    {
        return in_array($user->role, ['admin', 'superuser']);
    }

    public function generateReport(User $user): bool
    {
        return in_array($user->role, ['admin', 'superuser']);
    }
}
