<?php

namespace App\Http\Livewire\Personas;

use App\Models\sys\Persona;
use Livewire\Component;
use Livewire\WithPagination;

class Personas extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $personas, $NO_SOCIO, $AP_PATERNO, $AP_MATERNO, $CO_DNI, $NU_CELULAR, $TI_SEXO, $FE_NACIMIENTO, $ID_PERSONA;
    public $updateMode = false;

    public function render()
    {
        $this->personas = Persona::paginate(6);
        $links = $this->personas;
        $this->personas = collect($this->personas->items());

        return view('livewire.personas.personas', ['personas' => compact($this->personas), 'links' => $links]);
    }
}
