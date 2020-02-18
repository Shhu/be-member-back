<?php

namespace Bemember\User\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Airlock\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * Bemember\User\Models\User
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property int $is_admin
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Bemember\User\Models\Profile $profile
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Airlock\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\User\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\User\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\User\Models\User query()
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
}
