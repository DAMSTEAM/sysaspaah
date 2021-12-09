<?php

namespace Database\Factories\sys;

use App\Models\sys\Departamento;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepartamentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Departamento::class;

    public function definition()
    {
        return [
            'NO_DEPARTAMENTO' => $this->faker->city
        ];
    }
}
