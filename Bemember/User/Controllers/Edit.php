<?php

namespace Bemember\User\Controllers;

use Illuminate\Http\Request;
use Bemember\Core\Controllers\Controller;
use Bemember\User\Models\User;
use Bemember\User\Resources\EditResource;

class Edit extends Controller
{
    /**
     * @param Request $request
     * @param User $user
     * @return EditResource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function __invoke(Request $request, User $user)
    {
        $this->authorize('edit', $user);

        return new EditResource($user);
    }
}
