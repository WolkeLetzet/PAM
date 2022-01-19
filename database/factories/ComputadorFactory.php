<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Encargado;
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
        //
        $tipo_al=['SDD','HDD'];
        $marcas = ['Apple', 'Dell', 'HP', 'Lenovo', 'Asus', 'Acer', 'Toshiba', 'Samsung', 'LG', 'MSI'];
        $sos=['Window XP','Windows Vista','Windows 7','Windows 8','Windows 10','Windows 11'];
        $almac=['256 GB','500 GB','1 TB','2 TB','4 TB','5 TB'];
        $ram=['256 MB','512 MB','1 GB','2 GB','4 GB','8 GB','16 GB'];
        //Elegir al azar si un computador tiene encargado
        if (rand(0,1)) {
            $idd=Encargado::factory()->create()->id;
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
            'tipo_almac'=>$tipo_al[rand(0,1)],
            'almacenamiento'=>$almac[rand(0,count($almac)-1)],

            
            
            'encargado_id' =>$idd
        ];
    }
}
