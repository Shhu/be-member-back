<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Bemember\Organization\Models\Organization;
use Faker\Generator as Faker;

$factory->define(Organization::class, static function (Faker $faker) {
    return [
        'name'              => $faker->name,
        'contact'           => "$faker->firstname $faker->lastname",
        'email'             => $faker->unique()->safeEmail,
    ];
});