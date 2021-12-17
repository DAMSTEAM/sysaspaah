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

        \App\Models\User::create([
            'name' => 'Saul Ytucayasi',
            'email' => 'saul.ytucayasi@upeu.edu.pe',
            'password' => bcrypt('saul12345'),
            'FK_PERSONA' => 1
        ]); 

        \App\Models\sys\Socio::create([
            'ES_SOCIO' => '1',
            'FK_COMUNIDAD' => Comunidad::all()->random()->ID_COMUNIDAD,
            'FK_PERSONA' => 1
        ]);


        \App\Models\User::create([
            'name' => 'Saul Ytucayasi',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'FK_PERSONA' => 2
        ]); 

        \App\Models\sys\Socio::create([
            'ES_SOCIO' => '1',
            'FK_COMUNIDAD' => Comunidad::all()->random()->ID_COMUNIDAD,
            'FK_PERSONA' => 2
        ]);


        \App\Models\User::create([
            'name' => 'Saul Ytucayasi',
            'email' => 'secretario@gmail.com',
            'password' => bcrypt('123456'),
            'FK_PERSONA' => 3
        ]); 

        \App\Models\sys\Socio::create([
            'ES_SOCIO' => '1',
            'FK_COMUNIDAD' => Comunidad::all()->random()->ID_COMUNIDAD,
            'FK_PERSONA' => 3
        ]);


        \App\Models\User::create([
            'name' => 'Saul Ytucayasi',
            'email' => 'presidente@gmail.com',
            'password' => bcrypt('123456'),
            'FK_PERSONA' => 4
        ]); 

        \App\Models\sys\Socio::create([
            'ES_SOCIO' => '1',
            'FK_COMUNIDAD' => Comunidad::all()->random()->ID_COMUNIDAD,
            'FK_PERSONA' => 4
        ]);

/*         \App\Models\sys\Socio::factory(20)->create(); */

/*         \App\Models\User::factory(24)->create();
 */

        
        \App\Models\sys\Inscripcion::create([
            'ES_INSCRIPCION' => '1',
            'FK_INGRESO' => Ingreso::all()->random()->ID_INGRESO,
            'FK_SOLICITADO' => 1,
            'FK_APROBADO' => Persona::all()->random()->ID_PERSONA,
        ]);

        $inscripciones = \App\Models\sys\Inscripcion::factory(20)->create();
        foreach ($inscripciones as $inscripcion) {
            \App\Models\sys\RequisitoInscripcion::create([
                'DE_URL' => 'haha',
                'FK_INSCRIPCION' => $inscripcion->ID_INSCRIPCION,
                'FK_REQUISITO' => '1',
            ]);

            \App\Models\sys\RequisitoInscripcion::create([
                'DE_URL' => 'hoh',
                'FK_INSCRIPCION' => $inscripcion->ID_INSCRIPCION,
                'FK_REQUISITO' => '2',
            ]);

            \App\Models\sys\RequisitoInscripcion::create([
                'DE_URL' => 'hehe',
                'FK_INSCRIPCION' => $inscripcion->ID_INSCRIPCION,
                'FK_REQUISITO' => '3',
            ]);
        }
    }
}
