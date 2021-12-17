<?php

namespace Database\Factories\sys;

use App\Models\sys\Comunidad;
use App\Models\sys\Persona;
use App\Models\sys\Socio;
use Illuminate\Database\Eloquent\Factories\Factory;

class SocioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Socio::class;

    public function definition()
    {
        return [
            'ES_SOCIO' => '1',
            'FK_COMUNIDAD' => Comunidad::all()->random()->ID_COMUNIDAD,
            'FK_PERSONA' => $this->faker->unique()->numberBetween(5, Persona::count())
        ];
    }
}
