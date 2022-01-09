<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AutomobilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reg_br'=>$this->faker->unique()->regexify('[a-z][a-z][0-9][0-9][0-9][a-z][a-z]'),
            'marka'=>$this->faker->randomElement(['Audi','BMW','Mercedes','Ford']),
            'model'=>$this->faker->randomElement(['A1','A4','3','5','10C']),
            'godiste'=>$this->faker->year('now'),
            'karoserija'=>$this->faker->randomElement(['limuzina','karavan','hecbek']),
            'boja'=>$this->faker->colorName()

        ];
    }
}
