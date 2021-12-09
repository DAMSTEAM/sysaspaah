<?php

namespace Database\Factories\sys;

use App\Models\sys\Departamento;
use App\Models\sys\Provincia;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProvinciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Provincia::class;

    public function definition()
    {
        return [
            'NO_PROVINCIA' => $this->faker->word,
            'FK_DEPARTAMENTO' => Departamento::all()->random()->ID_DEPARTAMENTO
        ];
    }
}

