<?php

namespace App\Http\Livewire\Personas;

use App\Models\sys\Persona;
use Livewire\Component;

class Edit extends Component
{
    public $persona;

    public $NO_SOCIO, $AP_PATERNO, $AP_MATERNO, $CO_DNI, $NU_CELULAR, $TI_SEXO, $FE_NACIMIENTO, $ID_PERSONA;

    protected $rules = [
        'NO_SOCIO' => 'required',
        'AP_PATERNO' => 'required',
        'AP_MATERNO' => 'required',
        'CO_DNI' => 'required|max:8',
        'NU_CELULAR' => 'required|max:9',
        'TI_SEXO' => 'required|in:1, 2',
        'FE_NACIMIENTO' => 'required'
    ];

    public function mount($id)
    {
        $persona = Persona::where('ID_PERSONA', $id)->first();

        $this->ID_PERSONA = $id;
        $this->NO_SOCIO = $persona->NO_SOCIO;
        $this->AP_PATERNO = $persona->AP_PATERNO;
        $this->AP_MATERNO = $persona->AP_MATERNO;
        $this->CO_DNI = $persona->CO_DNI;
        $this->NU_CELULAR = $persona->NU_CELULAR;
        $this->TI_SEXO = $persona->TI_SEXO;
        $this->FE_NACIMIENTO = $persona->FE_NACIMIENTO;
    }

    public function render()
    {
        return view('livewire.personas.edit');
    }

    public function update() {
        $this->validate();

        $persona = Persona::find($this->ID_PERSONA);
        
        $persona->update([
            'NO_SOCIO' => $this->NO_SOCIO,
            'AP_PATERNO' => $this->AP_PATERNO,
            'AP_MATERNO' => $this->AP_MATERNO,
            'CO_DNI' => $this->CO_DNI,
            'NU_CELULAR' => $this->NU_CELULAR,
            'TI_SEXO' => $this->TI_SEXO,
            'FE_NACIMIENTO' => $this->FE_NACIMIENTO
        ]);
    }
}
