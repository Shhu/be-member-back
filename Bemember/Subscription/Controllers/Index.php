<?php

namespace Bemember\Subscription\Controllers;

use Bemember\Subscription\Models\Policies\SubscriptionPolicy;
use Illuminate\Http\Request;
use Bemember\Core\Controllers\Controller;
use Bemember\Subscription\Models\Subscription;
use Bemember\Subscription\Resources\FetchResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class Index extends Controller
{

    /**
     * @param Request $request
     * @return AnonymousResourceCollection
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function __invoke(Request $request): AnonymousResourceCollection
    {
        $this->authorize(SubscriptionPolicy::ADMIN, Subscription::class);

        $subscriptions = new Subscription;

        if (!empty($request->user_id)) {
            $organizations = $organizations->where('user_id', "$request->user_id");
        }

        if (!empty($request->organization_id)) {
            $organizations = $organizations->where('organization_id', "$request->organization_id");
        }

        return FetchResource::collection($subscriptions->get());
    }
}
