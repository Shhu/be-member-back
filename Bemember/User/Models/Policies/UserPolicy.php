<?php

namespace Bemember\User\Models\Policies;

use Bemember\User\Models\User;

class UserPolicy
{
    public function index(): bool
    {
        return auth()->user() && auth()->user()->isAdmin();
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
