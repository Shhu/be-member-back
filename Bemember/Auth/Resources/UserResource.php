<?php

namespace Bemember\Auth\Resources;

use Bemember\User\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin User
 */
class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'          => $this->id,
            'firstname'   => $this->firstname,
            'lastname'    => $this->lastname,
            'email'       => $this->email,
            'permissions' => $this->getAllPermissions()->pluck('name'),
        ];
    }
}
