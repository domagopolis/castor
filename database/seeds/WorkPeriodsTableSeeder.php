<?php

use Illuminate\Database\Seeder;
use App\WorkPeriod;
use Faker\Factory as Faker;

class WorkPeriodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\WorkPeriod::class, 100)->create()->each(function($wp) {
            ;
        });
    }
}
