<?php

namespace Database\Seeders;

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
                'computador_id' => rand(1,20),
                'tipo_uso_id' => rand(1,2),
            ]);
        }
        
    }
}
