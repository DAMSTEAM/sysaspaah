<?php

namespace Database\Factories\sys;

use App\Models\sys\Requisito;
use Illuminate\Database\Eloquent\Factories\Factory;

class RequisitoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Requisito::class;

    public function definition()
    {
        return [
            'NO_REQUISITO' => $this->faker->word,
        ];
    }
}
