<?php

namespace Bemember\Organization\Models;

use Bemember\Subscription\Models\Subscription;
use Bemember\User\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * Bemember\Organization\Models\Organization
 *
 * @property int $id
 * @property string $name
 * @property string|null $contact
 * @property string|null $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bemember\User\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\Organization\Models\Organization newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\Organization\Models\Organization newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\Organization\Models\Organization query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\Organization\Models\Organization whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\Organization\Models\Organization whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\Organization\Models\Organization whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\Organization\Models\Organization whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\Organization\Models\Organization whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\Organization\Models\Organization whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Organization extends \Eloquent
{
    protected $fillable = [
        'name',
        'email',
        'contact',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function subscriptions(): MorphMany
    {
        return $this->morphMany(Subscription::class, 'subscriptionable');
    }

    public function attachSubscription(Subscription $subscription)
    {
        return $this->subscriptions()->save($subscription);
    }
}
