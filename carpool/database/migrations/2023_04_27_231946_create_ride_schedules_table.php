<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRideSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ride_schedules', function (Blueprint $table) {
            $table->increments('ride_schedule_id');
            $table->integer('user_id')->unsigned();
            $table->string('pickup_location');
            $table->string('dropoff_location');
            $table->date('date');
            $table->time('time');
            $table->text('additional_preferences')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('cp_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ride_schedules');
    }
}
