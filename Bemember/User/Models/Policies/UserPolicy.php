<?php

namespace Bemember\User\Models\Policies;

use Bemember\User\Models\User;

class UserPolicy
{
    public function index(User $user): bool
    {
        return $user->can('admin');
    }

    public function show(User $user): bool
    {
        return auth()->check() && $user->id === auth()->id();
    }

    public function edit(User $user): bool
    {
        return auth()->check() && $user->is_admin === 1;
    }
}
