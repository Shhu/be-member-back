<?php

namespace Bemember\Organization\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Bemember\Organization\Models\Organization;

/**
 * Class FetchResource
 * @package MLI\Basket\Resources
 * @mixin Organization
 */
class FetchResource extends Resource
{
    public function toArray($request): array
    {
        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'contact'           => $this->contact,
            'email'             => $this->email,
            'created_at'        => $this->created_at,
        ];
    }
}
