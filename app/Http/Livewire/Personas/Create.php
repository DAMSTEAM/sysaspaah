<?php

namespace App\Http\Livewire\Personas;

use App\Models\sys\Persona;
use Livewire\Component;

class Create extends Component
{
    public $NO_SOCIO, $AP_PATERNO, $AP_MATERNO, $CO_DNI, $NU_CELULAR, $TI_SEXO, $FE_NACIMIENTO, $ID_PERSONA;

    public function render()
    {
        return view('livewire.personas.create');
    }

    public function save() {
        Persona::create([
            'NO_SOCIO' => $this->NO_SOCIO,
            'AP_PATERNO' => $this->AP_PATERNO,
            'AP_MATERNO' => $this->AP_MATERNO,
            'CO_DNI' => $this->CO_DNI,
            'NU_CELULAR' => $this->NU_CELULAR,
            'TI_SEXO' => $this->TI_SEXO,
            'FE_NACIMIENTO' => $this->FE_NACIMIENTO,
            'ID_PERSONA' => $this->ID_PERSONA
        ]) ;
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
