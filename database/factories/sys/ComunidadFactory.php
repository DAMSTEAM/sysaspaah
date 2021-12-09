<?php

namespace Database\Factories\sys;

use App\Models\sys\Comunidad;
use App\Models\sys\Distrito;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComunidadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Comunidad::class;

    public function definition()
    {
        return [
            'NO_COMUNIDAD' => $this->faker->word,
            'FK_DISTRITO' => Distrito::all()->random()->ID_DISTRITO
        ];
    }
}
