<?php

namespace Bemember\Subscription\Controllers;

use Bemember\Subscription\Models\Policies\SubscriptionPolicy;
use Illuminate\Http\Request;
use Bemember\Core\Controllers\Controller;
use Bemember\Subscription\Models\Subscription;
use Bemember\Subscription\Resources\EditResource;

class Edit extends Controller
{
    /**
     * @param Request $request
     * @param Subscription $subscription
     * @return EditResource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function __invoke(Request $request, Subscription $subscription): EditResource
    {
        $this->authorize(SubscriptionPolicy::ADMIN, $subscription);

        return new EditResource($subscription);
    }
}
