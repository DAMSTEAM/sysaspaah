<?php

namespace Database\Factories\sys;

use App\Models\sys\Distrito;
use App\Models\sys\Provincia;
use Illuminate\Database\Eloquent\Factories\Factory;

class DistritoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Distrito::class;

    public function definition()
    {
        return [
            'NO_DISTRITO' => $this->faker->word,
            'FK_PROVINCIA' => Provincia::all()->random()->ID_PROVINCIA
        ];
    }
}
