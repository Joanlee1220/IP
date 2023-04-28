<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRideSharesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ride_shares', function (Blueprint $table) {
            $table->increments('ride_id');
            $table->integer('driver_id')->unsigned();
            $table->foreign('driver_id')->references('user_id')->on('cp_users');
            $table->string('pickup_location');
            $table->string('dropoff_location');
            $table->date('ride_date');
            $table->time('ride_time');
            $table->decimal('price', 10, 2);
            $table->integer('available_seats');
            $table->text('ride_note')->nullable();
            $table->enum('ride_status', ['pending', 'in-progress', 'completed', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ride_shares');
    }
}
