<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AlmacenamientoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'tipo'=>$this->faker->randomElement(['HDD','SDD']),
            'cantidad'=>$this->faker->randomElement(['256 GB','500 GB','1 TB','2 TB'])
        ];
    }
}
