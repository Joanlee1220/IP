<?php

namespace Database\Factories;

use App\Models\RideRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

class RideRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cpUsers = \App\Models\CpUser::pluck('id');
        $rideShares = \App\Models\RideShare::pluck('id');
    
        return [
            'requested_user_id' => $this->faker->randomElement($cpUsers),
            'requested_ride_id' => $this->faker->randomElement($rideShares),
            'request_status' => $this->faker->randomElement(['pending', 'accepted', 'rejected']),
        ];
    }
}
