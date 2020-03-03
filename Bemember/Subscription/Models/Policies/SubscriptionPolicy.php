<?php

namespace Bemember\Subscription\Models\Policies;

use Bemember\User\Models\User;

class SubscriptionPolicy
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
