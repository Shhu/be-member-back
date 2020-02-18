<?php

namespace Bemember\User\Models;

class Profile extends \Eloquent {
    protected $fillable = [
        'firstname',
        'lastname',
    ];
}