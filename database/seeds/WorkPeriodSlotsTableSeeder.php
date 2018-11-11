<?php

use Illuminate\Database\Seeder;
use App\WorkPeriodSlot;

class WorkPeriodSlotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\WorkPeriodSlot::class, 1000)->create()->each(function($wps) {
            ;
        });
    }
}
