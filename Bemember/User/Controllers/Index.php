<?php

namespace Bemember\User\Controllers;

use Illuminate\Http\Request;
use Bemember\Core\Controllers\Controller;
use Bemember\User\Models\User;
use Bemember\User\Resources\FetchResource;
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
        $this->authorize('index', User::class);

        $users = new User;

        if ($request->is_admin === 'true') {
            $users = $users->where('is_admin', 1);
        }

        if (!empty($request->email)) {
            $users = $users->where('email', 'LIKE', "%$request->email%");
        }

        if (!empty($request->name)) {
            $users = $users->where(\DB::raw('CONCAT_WS(" ", firstname, lastname)'), 'like', "%$request->name%");
        }

        return FetchResource::collection($users->get());
    }
}
