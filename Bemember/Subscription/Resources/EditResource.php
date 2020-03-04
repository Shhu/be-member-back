<?php

namespace Bemember\Subscription\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Bemember\Subscription\Models\Subscription;

/**
 * Class FetchResource
 * @package MLI\Basket\Resources
 * @mixin Subscription
 */
class EditResource extends JsonResource
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
