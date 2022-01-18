<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comentario;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(OficinaSeeder::class);
        \App\Models\Computador::factory(20)->create();



        //$this->call(EncargadoSeeder::class);
        //$this->call(ComputadorSeeder::class);
        $this->call(TipoUsoSeeder::class);
        $this->call(ComputadorOficinaSeeder::class);
        $this->call(ComputadorTipoUsoSeeder::class);
    }
}
