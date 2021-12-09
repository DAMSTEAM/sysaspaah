<?php

namespace Database\Factories\sys;

use App\Models\sys\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Persona::class;

    public function definition()
    {
        return [
            'NO_SOCIO' => $this->faker->name('male'|'female'),
            'AP_PATERNO' => $this->faker->lastName,
            'AP_MATERNO' => $this->faker->lastName,
            'CO_DNI' => $this->faker->randomNumber($nbDigits = 8),
            'NU_CELULAR' => $this->faker->randomNumber($nbDigits = 9),
            'FI_DNI' => $this->faker->mimeType,
            'TI_SEXO' => $this->faker->randomElement(array ('1','2')),
            'FE_NACIMIENTO' => $this->faker->date('Y-m-d', 'now')
        ];
    }
}
