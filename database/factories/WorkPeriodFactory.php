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

$factory->define(App\WorkPeriod::class, function (Faker $faker) {
    return [
    	'entered_by_user_id' => App\User::all()->random()->id,
    	'modified_by_user_id' => App\User::all()->random()->id,
    	'date_time' => $faker->dateTimeThisYear(),
    	'slot_time_minutes' => $faker->numberBetween($min = 1, $max = 8) * 15,
        'comments' => $faker->paragraph,
    ];
});
