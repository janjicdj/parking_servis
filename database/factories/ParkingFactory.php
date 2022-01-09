<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ParkingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'naziv'=>$this->faker->unique()->randomElement(['parking 1','parking 2','parking 3','parking 4','parking 5',]),
            'adresa'=>$this->faker->address(),
            'grad'=>$this->faker->city(),
            'brojTelefona'=>$this->faker->phoneNumber(),
            'email'=>$this->faker->unique()->email(),
            'kapacitet'=>$this->faker->randomElement([20,30,50])
        ];
    }
}
