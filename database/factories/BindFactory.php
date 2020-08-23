<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bind;
use Faker\Generator as Faker;

$factory->define(Bind::class, function (Faker $faker) {
    return [
        'binds_to' => $faker->unique()->randomNumber(1),
        'type' => rand(1, 2) ? 'Like' : 'Dislike'
    ];
});
