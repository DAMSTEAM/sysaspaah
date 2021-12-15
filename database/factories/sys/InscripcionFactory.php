<?php

namespace Database\Factories\sys;

use App\Models\sys\Ingreso;
use App\Models\sys\Inscripcion;
use App\Models\sys\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class InscripcionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Inscripcion::class;

    public function definition()
    {
        return [
            'ES_INSCRIPCION' => $this->faker->randomElement(array ('1','2','3')),
            'FK_INGRESO' => Ingreso::all()->random()->ID_INGRESO,
            'FK_SOLICITADO' => $this->faker->unique()->numberBetween(1, Persona::count()),
            'FK_APROBADO' => Persona::all()->random()->ID_PERSONA,
        ];
    }
}
