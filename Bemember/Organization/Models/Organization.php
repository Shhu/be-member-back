<?php

namespace Bemember\Organization\Models;
use Bemember\User\Models\User;

class Organization extends \Eloquent {
    protected $fillable = [
        'name',
        'email',
        'contact'
    ];

    function users()
    {
        return $this->belongsToMany(User::class);
    }
}