<?php

namespace App\Http\Livewire\Personas;

use App\Models\sys\Persona;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public $palabraBuscar;
    public $feInicio;
    public $feFin;
    public $tipo;
    public $test;
    public $personasFE = [];
    public $reqTBL = [];
    public $palabraReq;
    public $v_id;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $personas, $NO_SOCIO, $AP_PATERNO, $AP_MATERNO, $CO_DNI, $NU_CELULAR, $TI_SEXO, $FE_NACIMIENTO, $ID_PERSONA;
    public $updateMode = false;

    public function render()
    {
        $this->personas = Persona::latest()->where('NO_SOCIO', 'like', '%' . $this->palabraBuscar . '%')->paginate(5);
        $links = $this->personas;
        $this->personas = collect($this->personas->items());

        return view('livewire.personas.index', ['personas' => compact($this->personas), 
        'links' => $links, 'personasFE' => compact($this->personasFE)]);
    }

    public function saveRequisito() {
        $this->reqTBL = DB::select("call SP_INS_REQUISITOS('$this->palabraReq', @status)");
    }

/*     public function socioListarDate() {
        if (!empty($this->feInicio) && !empty($this->feFin)) {
            $this->personasFE = DB::select("call SP_RANGO_FECHA('$this->feInicio', '$this->feFin', 'MAE_PERSONAS', 'FE_NACIMIENTO')"); 
        }
    } */
}
