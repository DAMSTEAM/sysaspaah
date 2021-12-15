<?php

namespace Database\Seeders;

use App\Models\sys\Comunidad;
use App\Models\sys\Inscripcion;
use App\Models\sys\Persona;
use App\Models\sys\Requisito;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        \App\Models\sys\Persona::factory(21)->create();
        \App\Models\sys\Departamento::factory(20)->create();
        \App\Models\sys\Provincia::factory(20)->create();
        \App\Models\sys\Distrito::factory(20)->create();
        \App\Models\sys\Comunidad::factory(20)->create();
        \App\Models\sys\Requisito::factory(20)->create();
        \App\Models\sys\Ingreso::factory(20)->create();
        \App\Models\sys\Inscripcion::factory(20)->create();

        $ADMIN = Persona::all()->first()->ID_PERSONA;

        \App\Models\User::create([
            'name' => 'Saul Ytucayasi',
            'email' => 'saul.ytucayasi@upeu.edu.pe',
            'password' => bcrypt('saul12345'),
            'FK_PERSONA' => $ADMIN
        ]);

        \App\Models\sys\Socio::create([
            'ES_SOCIO' => '1',
            'TI_SOCIO' => '0',
            'FK_COMUNIDAD' => Comunidad::all()->random()->ID_COMUNIDAD,
            'FK_PERSONA' => $ADMIN 
        ]);

        \App\Models\sys\RequisitoInscripcion::create([
            'DE_URL' => 'url',
            'FK_INSCRIPCION' => Inscripcion::all()->random()->ID_INSCRIPCION,
            'FK_REQUISITO' => Requisito::all()->random()->ID_REQUISITO,
        ]);
    }
}
