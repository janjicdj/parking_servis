<?php

namespace Database\Factories;

use App\Models\Automobil;
use App\Models\Parking;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParkingTerminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $vreme=$this->faker->dateTime('now');

        return [
            'parking'=>Parking::factory(),
            'automobil'=>Automobil::factory(),
            'ulazak'=>$vreme,
            'izlazak'=>$vreme+10
        ];
    }
}
