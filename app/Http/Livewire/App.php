<?php

namespace App\Http\Livewire;

use App\Models\sys\Inscripcion;
use App\Models\sys\Persona;
use App\Models\sys\Socio;
use Livewire\Component;

class App extends Component
{
    public $Cpersonas = 0, $CsociosAfiliados = 0, $CInscripciones = 0, $CsociosDesafiliados = 0;

    public function render()
    {
        $this->Cpersonas = Persona::all()->count();
        $this->CsociosAfiliados = Socio::where('ES_SOCIO', '=', '1')->count();
        $this->CInscripciones = Inscripcion::where('ES_INSCRIPCION', '=', '3')->count();
        $this->CsociosDesafiliados = Socio::where('ES_SOCIO', '=', '0')->count();
        
        return view('livewire.app');
    }
}
