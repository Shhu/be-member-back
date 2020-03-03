<?php

namespace Bemember\User\Models\Policies;

use Bemember\User\Models\User;

class UserPolicy
{
    public const ADMIN = 'admin';

    public function admin(User $user): bool
    {
        return $user->can('admin');
    }
}
