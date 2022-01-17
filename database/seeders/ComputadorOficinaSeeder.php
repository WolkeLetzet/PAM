<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        for ($i=0; $i < 15; $i++) { 
            DB::table('computador_oficina')->insert([
                'computador_id' => rand(1,20),
                'oficina_id' => rand(1,10),
            ]);
        }
    }
}
