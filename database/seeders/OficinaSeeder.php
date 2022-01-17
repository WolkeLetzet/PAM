<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Str;

class OficinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $oficinas = [ 'DOM', 'Adquisiciones', 'Archivo Filmico', 'Control','Tesoreria','Ventanilla de obras','SSMM','Consejales','Servicios Generales','Aseo','Licencia','Administracion','Rentas','Patrimonio','Discapacidad'.'SECPLA','OMIL','Unidad de Obras Menores'];
        for ($i=0; $i < count($oficinas); $i++) { 
            DB::table('oficinas')->insert([
                'nombre'=> $oficinas[$i]
                
            ]);
        }
    }
}
