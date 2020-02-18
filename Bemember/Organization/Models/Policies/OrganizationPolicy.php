<?php

namespace Bemember\Organization\Models\Policies;

use Bemember\User\Models\User;

class OrganizationPolicy
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
