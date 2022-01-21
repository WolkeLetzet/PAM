<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Almacenamiento;
use Carbon\Carbon;

class ComputadorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    
    {
        
        $marcas = ['Apple', 'Dell', 'HP', 'Lenovo', 'Asus', 'Acer', 'Toshiba', 'Samsung', 'LG', 'MSI'];
        $sos=['Window XP','Windows Vista','Windows 7','Windows 8','Windows 10','Windows 11'];
        $ram=['256 MB','512 MB','1 GB','2 GB','4 GB','8 GB','16 GB'];
        //Elegir al azar si un computador tiene encargado
        if (rand(0,1)) {
            $idd=$this->faker->name;
        }
        else{
            $idd=null;
        }
        return [
            //
            'marca' => $marcas[rand(0,9)],
            'modelo' => $this->faker->word(3,false).' '.$this->faker->randomDigit,
            'fecha'=>Carbon::now(),
            'ram'=>$ram[rand(0,count($ram)-1)],
            'so'=>$sos[rand(0,count($sos)-1)],
            

            
            
            'encargado' =>$idd
        ];
    }
}
