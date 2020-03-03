<?php

namespace Bemember\Subscription\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Bemember\Subscription\Models\Subscription;

/**
 * Class FetchResource
 * @package MLI\Basket\Resources
 * @mixin Subscription
 */
class EditResource extends Resource
{
    public function toArray($request): array
    {
        return [
            'id'                => $this->id,
            'startDate'         => $this->startDate,
            'endDate'           => $this->ebdDate,
        ];
    }
}
