<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NullableUserIdToWorkPlotSlots extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('work_period_slots', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->unsigned()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('work_period_slots', function (Blueprint $table) {
            $table->integer('user_id')->nullable(false)->unsigned()->change();
        });
    }
}
