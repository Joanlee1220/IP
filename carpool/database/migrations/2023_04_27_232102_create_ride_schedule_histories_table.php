<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRideScheduleHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ride_schedule_histories', function (Blueprint $table) {
            $table->increments('ride_schedule_history_id');
            $table->integer('ride_schedule_id')->unsigned();
            $table->string('status', 50);
            $table->dateTime('timestamp');
            $table->timestamps();

            $table->foreign('ride_schedule_id')->references('ride_schedule_id')->on('ride_schedules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ride_schedule_histories');
    }
}
