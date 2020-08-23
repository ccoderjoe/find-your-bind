<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {

    $gender = $faker->randomElement(['men', 'women']);
    return [
<<<<<<< HEAD
        'name' => $gender === 'men' ? $faker->firstNameMale : $faker->firstNameFemale,
        'surname' => $faker->lastName,
=======
        'name' => $faker->name,
>>>>>>> parent of f4154eb... second commit
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
<<<<<<< HEAD
        'age' => rand(18, 45),
        'profile_picture' => "https://randomuser.me/api/portraits/{$gender}/".$faker->randomNumber(2).".jpg",
        'gender' => $gender,
        'location' => $faker->city,
        'description' => $faker->text(100)
=======
>>>>>>> parent of f4154eb... second commit
    ];
});
