<?php

use Illuminate\Database\Seeder;
use App\WorkType;
use App\WorkPeriod;

class WorkTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\WorkType::class, 10)->create()->each(function($wt) {
            $wt->work_periods()->saveMany(factory(App\WorkPeriod::class, 500)->make());
        });
    }
}
