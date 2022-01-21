<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comentario;
use App\Models\Almacenamiento;
use App\Models\Computador;

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

        Computador::factory(20)->has(Almacenamiento::factory()->count(rand(1,3)),'discos')->has(Comentario::factory(1)->count(rand(0,5)),'comentarios') ->create();



        //$this->call(EncargadoSeeder::class);
        //$this->call(ComputadorSeeder::class);
        $this->call(TipoUsoSeeder::class);
        $this->call(ComputadorOficinaSeeder::class);
        $this->call(ComputadorTipoUsoSeeder::class);
    }
}
