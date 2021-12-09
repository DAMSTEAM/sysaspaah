<?php

namespace App\Http\Livewire\Personas;

use App\Models\sys\Persona;
use Livewire\Component;

class Crear extends Component
{
    public $NO_SOCIO, $AP_PATERNO, $AP_MATERNO, $CO_DNI, $NU_CELULAR, $TI_SEXO, $FE_NACIMIENTO, $ID_PERSONA;

    public function render()
    {
        return view('livewire.personas.crear');
    }

/*     public function save() {

        Persona::create([
            'NO_SOCIO' => $this->NO_SOCIO,
            'AP_PATERNO' => $this->AP_PATERNO,
            'AP_MATERNO' => $this->AP_MATERNO,
            'CO_DNI' => $this->CO_DNI,
            'NU_CELULAR' => $this->NU_CELULAR,
            'TI_SEXO' => $this->TI_SEXO,
            'FE_NACIMIENTO' => $this->FE_NACIMIENTO
        ]);

        $this->emit('render');
    } */

}
