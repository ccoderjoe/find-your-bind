<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Picture;
use Faker\Generator as Faker;

$factory->define(Picture::class, function (Faker $faker) {
    return [
        'name' => $name = $faker->text(15),
        'location' => "https://fakeimg.pl/640x480/?text=".$name."&font=lobster"
    ];
});
