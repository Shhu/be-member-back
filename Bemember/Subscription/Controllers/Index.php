<?php

namespace Bemember\Subscription\Controllers;

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
        $this->authorize('index', Subscription::class);

        $subscriptions = new Subscription;

        return FetchResource::collection($subscriptions->get());
    }
}
