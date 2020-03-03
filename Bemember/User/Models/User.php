<?php

namespace Bemember\User\Models;

use Bemember\Organization\Models\Organization;
use Bemember\Subscription\Models\Subscription;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Airlock\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * Bemember\User\Models\User
 *
 * @property int $id
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bemember\Organization\Models\Organization[] $organizations
 * @property-read int|null $organizations_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Bemember\User\Models\Profile $profile
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bemember\Subscription\Models\Subscription[] $subscriptions
 * @property-read int|null $subscriptions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Airlock\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\User\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\User\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\User\Models\User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\User\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\User\Models\User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\User\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\User\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\User\Models\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\User\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\User\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\User\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\User\Models\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles;

    protected $fillable = [
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $guard_name = 'api';

    public function isAdmin(): bool
    {
        return $this->is_admin === 1;
    }

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class)->withDefault();
    }

    public function organizations(): BelongsToMany
    {
        return $this->belongsToMany(Organization::class);
    }

    public function subscriptions(): MorphMany
    {
        return $this->morphMany(Subscription::class, 'subscriptionable');
    }

    public function attachSubscription(Subscription $subscription): Subscription
    {
        return $this->subscriptions()->save($subscription);
    }
}
