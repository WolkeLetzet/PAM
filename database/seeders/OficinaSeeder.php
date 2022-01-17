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
        $oficinas = [ 'DOM', 'Adquisiciones', 'Archivo Filmico', 'Control','Tesoreria','Ventanilla de obras','SSMM','Consejales','Servicios Generales','Aseo','Licencia'];
        for ($i=0; $i < 10; $i++) { 
            DB::table('oficinas')->insert([
                'nombre' => $oficinas[rand(0,9)],
                
            ]);
        }
    }
}
