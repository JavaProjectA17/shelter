<?php

use Faker\Generator as Faker;

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

$factory->define(App\Shelter::class, function (Faker $faker) {
    return [
        'nameshelter'=>$faker->text(10),
        'address'=>$faker->text(10),
        'description'=>$faker->text(30),
        'phone'=>$faker->phoneNumber(),
        'user_id'=>App\User::first()->id,
    ];
});
