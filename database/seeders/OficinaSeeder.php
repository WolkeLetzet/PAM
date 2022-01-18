<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Str;
use Carbon\Carbon;


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

        $fecha=Carbon::now()->format('Y-m-d H:i:s');
        for ($i=0; $i < count($oficinas); $i++) { 
            DB::table('oficinas')->insert([
                'nombre'=> $oficinas[$i],
                'created_at'=>$fecha,
                'updated_at'=>$fecha,
                
            ]);
        }
    }
}
