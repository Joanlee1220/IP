<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CpUser;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CpUser>
 */
class CpUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fname' => $this->faker->firstName,
            'lname' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
            'gender' => $this->faker->randomElement(['male', 'female', 'other']),
            'phone_number' => $this->faker->phoneNumber,
            'img' => $this->faker->imageUrl(),
            'status' => 'active',
            'is_vehicle_owner' => $this->faker->boolean,
            'vehicle_model' => $this->faker->randomElement(['Honda Civic', 'Toyota Corolla', 'Ford Mustang', 'Chevrolet Camaro']),
            'vehicle_color' => $this->faker->colorName,
            'vehicle_plate' => $this->faker->regexify('[A-Z]{3} [0-9]{3}'),
            'verification_status' => 'verified',
        ];
    }
}
