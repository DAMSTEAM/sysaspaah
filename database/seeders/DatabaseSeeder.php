<?php

namespace Database\Seeders;

use App\Models\sys\Comunidad;
use App\Models\sys\Ingreso;
use App\Models\sys\Inscripcion;
use App\Models\sys\Persona;
use App\Models\sys\Requisito;
use Illuminate\Database\Seeder;
use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Support\Facades\Storage;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        
        $faker = Faker::create();

        \App\Models\sys\Persona::factory(40)->create();
        \App\Models\sys\Departamento::factory(50)->create();
        \App\Models\sys\Provincia::factory(150)->create();
        \App\Models\sys\Distrito::factory(500)->create();
        \App\Models\sys\Comunidad::factory(1000)->create();
        \App\Models\sys\Requisito::factory(3)->create();
        \App\Models\sys\Ingreso::factory(20)->create();
        \App\Models\sys\Inscripcion::factory(20)->create();

        \App\Models\User::create([
            'name' => 'Saul Ytucayasi',
            'email' => 'saul.ytucayasi@upeu.edu.pe',
            'password' => bcrypt('saul12345'),
            'FK_PERSONA' => 1
        ]); 

        \App\Models\User::create([
            'name' => 'Saul Ytucayasi',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'FK_PERSONA' => 2
        ]); 

        \App\Models\User::create([
            'name' => 'Saul Ytucayasi',
            'email' => 'secretario@gmail.com',
            'password' => bcrypt('123456'),
            'FK_PERSONA' => 3
        ]); 

        \App\Models\User::create([
            'name' => 'Saul Ytucayasi',
            'email' => 'presidente@gmail.com',
            'password' => bcrypt('123456'),
            'FK_PERSONA' => 4
        ]); 
    }
}
