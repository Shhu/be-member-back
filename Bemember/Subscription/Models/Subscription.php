<?php

namespace Bemember\Subscription\Models;

use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Bemember\Subscription\Models\Subscription
 *
 * @property int $id
 * @property string $start_at
 * @property string $end_at
 * @property int $user_id
 * @property int|null $organization_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Bemember\Subscription\Models\Subscription $subscriptionable
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\Subscription\Models\Subscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\Subscription\Models\Subscription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\Subscription\Models\Subscription query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\Subscription\Models\Subscription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\Subscription\Models\Subscription whereEndAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\Subscription\Models\Subscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\Subscription\Models\Subscription whereOrganizationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\Subscription\Models\Subscription whereStartAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\Subscription\Models\Subscription whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\Subscription\Models\Subscription whereUserId($value)
 * @mixin \Eloquent
 */
class Subscription extends \Eloquent
{
    protected $fillable = [
        'user_id',
        'organization_id',
        'start_at',
        'end_at',
    ];

    protected $casts = [
        'start_at' => 'date',
        'end_at'   => 'date',
    ];

    public function subscriptionable(): MorphTo
    {
        return $this->morphTo();
    }
}
