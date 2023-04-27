<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('ride_request_id')->unsigned();
            $table->decimal('amount', 10, 2);
            $table->dateTime('payment_date');
            $table->string('payment_method', 255);
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('cp_users');
            $table->foreign('ride_request_id')->references('ride_request_id')->on('ride_requests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
