<?php

namespace Bemember\User\Models\Policies;

use Bemember\User\Models\User;

class UserPolicy
{
    public function index(User $user): bool
    {
        return $user->can('admin');
    }

    public function edit(User $user): bool
    {
        return $user->can('admin');
    }
}
