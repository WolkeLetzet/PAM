<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ComputadorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    
    {
        //
        $marcas = ['Apple', 'Dell', 'HP', 'Lenovo', 'Asus', 'Acer', 'Toshiba', 'Samsung', 'LG', 'MSI'];
        return [
            //
            'marca' => $marcas[rand(0,9)],
            'modelo' => $this->faker->word,
            'encargado_id' => rand(1,10),
            

        ];
    }
}
