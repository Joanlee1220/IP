<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('notification_id');
            $table->integer('user_id')->unsigned();
            $table->integer('ride_schedule_id')->unsigned();
            $table->string('notification_type', 50);
            $table->text('notification_message');
            $table->dateTime('timestamp');
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('cp_users');
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
        Schema::dropIfExists('notifications');
    }
}
