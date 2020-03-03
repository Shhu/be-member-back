<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Bemember\Subscription\Models\Subscription;
use Faker\Generator as Faker;

$factory->define(Subscription::class, static function (Faker $faker) {
    $startDate = $faker->dateTimeThisYear();

    return [
        'start_at'         => $startDate,
        'end_at'           => $startDate->add(DateInterval::createFromDateString('1 year')),
    ];
});
