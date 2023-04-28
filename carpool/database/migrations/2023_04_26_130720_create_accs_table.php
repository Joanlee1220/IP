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
        Schema::create('accs', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email_address')->unique();
            $table->string('hashed_password');
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('phone_number')->unique();
            $table->string('profile_picture_url')->nullable();
            $table->boolean('is_vehicle_owner')->default(false);
            $table->string('vehicle_model')->nullable();
            $table->string('vehicle_color')->nullable();
            $table->string('vehicle_plate')->nullable();
            $table->enum('verification_status', ['unverified', 'verified'])->default('unverified');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accs');
    }
};
