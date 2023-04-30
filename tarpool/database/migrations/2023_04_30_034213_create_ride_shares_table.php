<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ride_shares', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('driver_id')->references('id')->on('cp_users');
            $table->string('pickup_location');
            $table->string('dropoff_location');
            $table->date('ride_date');
            $table->time('ride_time');
            $table->decimal('price', 10, 2);
            $table->integer('available_seats');
            $table->integer('current_available_seats');
            $table->text('ride_note')->nullable();
            $table->enum('ride_status', ['pending', 'in-progress', 'completed', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ride_shares');
    }
};
