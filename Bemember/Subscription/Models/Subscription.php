<?php

namespace Bemember\Subscription\Models;

class Subscription extends \Eloquent {
    protected $fillable = [
        'user_id',
        'organization_id',
        'start_date',
        'end_date'
    ];
}