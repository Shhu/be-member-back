<?php

namespace Bemember\Organization\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Bemember\Organization\Models\Organization;

/**
 * Class FetchResource
 * @package MLI\Basket\Resources
 * @mixin Organization
 */
class EditResource extends JsonResource
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
