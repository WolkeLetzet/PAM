<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class TipoUsoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tipos = ['Ofimatica', 'Diseño','Programacion','Camaras','Realizar Pruebas de Licencia',];
        for ($i=0; $i < count($tipos); $i++) { 
            DB::table('tipo_usos')->insert([
                'nombre' => $tipos[$i],
            ]);
        }
    }
}
