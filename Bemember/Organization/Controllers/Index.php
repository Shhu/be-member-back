<?php

namespace Bemember\Organization\Controllers;

use Illuminate\Http\Request;
use Bemember\Core\Controllers\Controller;
use Bemember\Organization\Models\Organization;
use Bemember\Organization\Resources\FetchResource;
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
        $this->authorize('index', Organization::class);

        $organizations = new Organization;

        if (!empty($request->email)) {
            $organizations = $organizations->where('email', 'LIKE', "%$request->email%");
        }

        if (!empty($request->name)) {
            $organizations = $organizations->where('name', 'LIKE', "%$request->name%");
        }

        if (!empty($request->contact)) {
            $organizations = $organizations->where('contact', 'LIKE', "%$request->contact%");
        }

        return FetchResource::collection($organizations->get());
    }
}
