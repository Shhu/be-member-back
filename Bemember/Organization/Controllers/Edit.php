<?php

namespace Bemember\Organization\Controllers;

use Bemember\Organization\Models\Policies\OrganizationPolicy;
use Illuminate\Http\Request;
use Bemember\Core\Controllers\Controller;
use Bemember\Organization\Models\Organization;
use Bemember\Organization\Resources\EditResource;

class Edit extends Controller
{
    /**
     * @param Request $request
     * @param Organization $organization
     * @return EditResource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function __invoke(Request $request, Organization $organization): EditResource
    {
        $this->authorize(OrganizationPolicy::ADMIN, $organization);

        return new EditResource($organization);
    }
}
