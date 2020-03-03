<?php

namespace Bemember\Organization\Models\Policies;

use Bemember\User\Models\User;

class OrganizationPolicy
{
    public const ADMIN = 'admin';

    public function admin(User $user): bool
    {
        return $user->can('admin');
    }
}
