<?php

namespace Bemember\Subscription\Models\Policies;

use Bemember\User\Models\User;

class SubscriptionPolicy
{
    public const ADMIN = 'admin';

    public function admin(User $user): bool
    {
        return $user->can('admin');
    }
}
