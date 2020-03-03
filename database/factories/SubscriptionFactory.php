<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Bemember\Subscription\Models\Subscription;
use Faker\Generator as Faker;

$factory->define(Subscription::class, static function (Faker $faker) {
    $startDate = $faker->dateTimeThisYear();

    return [
        'start_date'         => $startDate,
        'end_date'           => $startDate->add(DateInterval::createFromDateString('1 year')),
    ];
});