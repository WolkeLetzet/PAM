<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comentario;
use App\Models\Almacenamiento;
use App\Models\Computador;
use App\Models\User;
use FontLib\Table\Type\name;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

        Computador::factory(100)->has(Comentario::factory(1)->count(rand(0,5)),'comentarios') ->create();
        //$roleAdmin= Role::create(['name'=>'admin']);
        //$roleUser= Role::create(['name'=>'user']);
        //$permission = Permission::create(['name' => 'all']);
        //$roleAdmin->givePermisionTo($permission);
        User::factory(40)->create();
        



        //$this->call(EncargadoSeeder::class);
        //$this->call(ComputadorSeeder::class);
        $this->call(TipoUsoSeeder::class);
        $this->call(ComputadorOficinaSeeder::class);
        $this->call(ComputadorTipoUsoSeeder::class);
    }
}
