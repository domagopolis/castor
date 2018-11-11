<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkPeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_periods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('work_type_id')->unsigned();
            $table->integer('entered_by_user_id')->unsigned();
            $table->integer('modified_by_user_id')->unsigned();
            $table->dateTime('date_time');
            $table->integer('slot_time_minutes')->unsigned();
            $table->text('comments');
            $table->timestamps();
        });

        Schema::table('work_periods', function ($table){
            $table->foreign('work_type_id')->references('id')->on('work_types')->onDelete('cascade');
        });

        Schema::table('work_periods', function ($table){
            $table->foreign('entered_by_user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('work_periods', function ($table){
            $table->foreign('modified_by_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_periods');
    }
}
