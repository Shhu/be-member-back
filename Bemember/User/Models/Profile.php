<?php

namespace Bemember\User\Models;

/**
 * Bemember\User\Models\Profile
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $firstname
 * @property string|null $lastname
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\User\Models\Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\User\Models\Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\User\Models\Profile query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\User\Models\Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\User\Models\Profile whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\User\Models\Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\User\Models\Profile whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\User\Models\Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\User\Models\Profile whereUserId($value)
 * @mixin \Eloquent
 */
class Profile extends \Eloquent {
    protected $fillable = [
        'firstname',
        'lastname',
    ];
}