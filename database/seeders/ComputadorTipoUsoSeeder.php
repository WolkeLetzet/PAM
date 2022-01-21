<?php

namespace Database\Seeders;

use App\Models\Computador;
use App\Models\TipoUso;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;


class ComputadorTipoUsoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i < 20; $i++) { 
            DB::table('computador_tipo_usos')->insert([
                'computador_id' => Computador::all()->random()->id,
                'tipo_uso_id' => TipoUso::all()->random()->id,
            ]);
        }
        
    }
}
