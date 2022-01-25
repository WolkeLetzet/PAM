<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Computador;
use App\Models\Oficina;

class ComputadorOficinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i < 70; $i++) { 
            DB::table('computador_oficina')->insert([
                'computador_id' => Computador::all()->random()->id,
                'oficina_id' => Oficina::all()->random()->id,
            ]);
        }
    }
}
