<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkPeriodSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_period_slots', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('work_period_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('work_period_slots', function ($table){
            $table->foreign('work_period_id')->references('id')->on('work_periods')->onDelete('cascade');
        });

        Schema::table('work_period_slots', function ($table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_period_slots');
    }
}
