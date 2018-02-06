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

$factory->define(App\Novelty::class, function (Faker $faker) {
    return [
        'title'=>$faker->text(10),
        'image'=>'/admin/images/default_img.jpg',
        'short_description'=>$faker->text(25),
        'description'=>$faker->text(150),
        'start'=>'2018-02-07'
    ];
});