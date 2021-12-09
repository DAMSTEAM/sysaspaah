<?php

namespace Database\Seeders;

use App\Models\sys\Comunidad;
use App\Models\sys\Ingreso;
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
        \App\Models\sys\Persona::factory(10)->create();
        \App\Models\sys\Departamento::factory(10)->create();
        \App\Models\sys\Provincia::factory(10)->create();
        \App\Models\sys\Distrito::factory(10)->create();
        \App\Models\sys\Comunidad::factory(10)->create();
        \App\Models\sys\Requisito::factory(10)->create();

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

        \App\Models\sys\Ingreso::create([
            'TI_PAGO' => '2',
            'TI_INGRESO' => '1',
            'NO_INGRESO' => 'Solicitar admin',
            'CA_PAGO' => 1000,
            'CA_DESCUENTO' => 10,
            'MO_TOTAL_PAGO' => 990,
            'FK_SOCIO' => $ADMIN,
        ]);

        \App\Models\sys\Inscripcion::create([
            'ES_INSCRIPCION' => '1',
            'FK_INGRESO' => Ingreso::all()->first()->ID_INGRESO,
            'FK_SOLICITADO' => $ADMIN,
            'FK_APROBADO' => $ADMIN,
        ]);

        \App\Models\sys\RequisitoInscripcion::create([
            'DE_URL' => '1',
            'FK_INSCRIPCION' => Inscripcion::all()->first()->ID_INSCRIPCION,
            'FK_REQUISITO' => Requisito::all()->random()->ID_REQUISITO,
        ]);
    }
}
