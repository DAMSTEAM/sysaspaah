<?php

namespace Database\Factories\sys;

use App\Models\sys\Ingreso;
use App\Models\sys\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class IngresoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Ingreso::class;

    public function definition()
    {
        $resultado = 0;
        $pago = $this->faker->randomFloat(2, 0, 50);
        $descuento = $this->faker->randomDigit;
        $resultado = $pago + $descuento;
        return [
            'TI_PAGO' => '2',
            'TI_INGRESO' => '1',
            'NO_INGRESO' => 'Solicitar admin',
            'CA_PAGO' => $pago,
            'CA_DESCUENTO' => $descuento,
            'MO_TOTAL_PAGO' => $resultado,
            'FK_PERSONA' => Persona::all()->random()->ID_PERSONA,
        ];
    }
}
