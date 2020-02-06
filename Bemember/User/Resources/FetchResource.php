<?php

namespace Bemember\User\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Bemember\User\Models\User;

/**
 * Class FetchResource
 * @package MLI\Basket\Resources
 * @mixin User
 */
class FetchResource extends Resource
{
    public function toArray($request): array
    {
        return [
            'id'                => $this->id,
            'firstname'         => $this->firstname,
            'lastname'          => $this->lastname,
            'email'             => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'created_at'        => $this->created_at,
        ];
    }
}
