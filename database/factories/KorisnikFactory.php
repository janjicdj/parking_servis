<?php

namespace Database\Factories;

use App\Models\Parking;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class KorisnikFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'ime'=>$this->faker->name,
            'prezime'=>$this->faker->lastName(),
        'datumrodjenja'=>$this->faker->date(),
        'pol'=>$this->faker->randomElement(['Muski','Zenski']),
        'username'=>$this->faker->unique()->userName(),
        'password'=>$this->faker->password(6,20),
        'parking_id'=>Parking::factory(),
        'remember_token'=>Str::random(10)
        ];
    }
}
