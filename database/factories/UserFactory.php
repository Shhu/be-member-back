<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Bemember\User\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, static function (Faker $faker) {
    return [
        'email'             => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token'    => \Str::random(10),
    ];
});

$factory->afterMaking(User::class, function(User $user, Faker $faker) {
    return [
        'firstname'         => $faker->firstName,
        'lastname'          => $faker->lastName,
    ];
});