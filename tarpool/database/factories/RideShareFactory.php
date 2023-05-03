<?php

namespace Database\Factories;

use App\Models\RideShare;
use Illuminate\Database\Eloquent\Factories\Factory;

class RideShareFactory extends Factory
{  
     /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
   protected $model = RideShare::class;

   /**
    * Define the model's default state.
    *
    * @return array
    */
   public function definition()
    {
        return [
            'driver_id' => $this->faker->randomElement([123456, 123789, 456789]), // Replace with actual user IDs from cp_users table
            'pickup_location' => $this->faker->randomElement(['TAR UMT', 'PV 13', 'PV 15', 'pv 18']),
            'dropoff_location' => $this->faker->randomElement(['TAR UMT', 'PV 13', 'PV 15', 'pv 18']),
            'ride_date' => $this->faker->dateTimeBetween('+1 week', '+2 weeks')->format('Y-m-d'),
            'ride_time' => $this->faker->time(),
            'price' => $this->faker->randomFloat(2, 10, 50),
            'available_seats' => $this->faker->numberBetween(1, 4),
            'current_available_seats' => $this->faker->numberBetween(1, 4),
            'ride_note' => $this->faker->text(),
            'ride_status' => $this->faker->randomElement(['pending', 'in-progress', 'completed', 'cancelled']),
        ];
    }
}
