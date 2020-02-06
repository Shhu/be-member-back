<?php

namespace Bemember\User\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Bemember\User\Models\Profile
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $picture
 * @property string|null $phone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $picture_src
 * @property-read \Bemember\User\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\User\Models\Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\User\Models\Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Bemember\User\Models\Profile query()
 * @mixin \Eloquent
 */
class Profile extends \Eloquent
{
    protected $table = 'user__profiles';

    protected $fillable = [
        'picture',
        'phone',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getPictureSrcAttribute()
    {
        return asset("storage/profiles/{$this->picture}");
    }

    public function savePicture($file): Profile
    {
        $filename = \uniqid('profile-', true) . '.jpg';
        \Storage::disk('public')->put("profiles/{$this->id}/$filename", \Image::make($file)->encode('jpg')->crop(300, 300));
        $this->picture = $filename;
        $this->save();

        return $this;
    }
}
