<?php

use Faker\Generator as Faker;

$factory->define(App\WorkPeriodSlot::class, function (Faker $faker) {
    return [
        'user_id' => NULL,
        'work_period_id' => App\WorkPeriod::all()->random()->id,
    ];
});
