<?php

namespace App\Http\Livewire\Socios;

use App\Models\sys\Comunidad;
use App\Models\sys\Departamento;
use App\Models\sys\Distrito;
use App\Models\sys\Inscripcion;
use App\Models\sys\Persona;
use App\Models\sys\Provincia;
use App\Models\sys\Socio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Create extends Component
{
    public $departamentos;
    public $provincias;
    public $distritos;
    public $comunidades;
    public $inscripcion;
    public $persona;
    public $idUser;

    public $selectedDepartamento = NULL;
    public $selectedProvincia = NULL;
    public $selectedDistrito = NULL;
    public $selectedComunidad = NULL;

    protected $rules = [
        'selectedDepartamento' => 'required',
        'selectedProvincia' => 'required',
        'selectedDistrito' => 'required',
        'selectedComunidad' => 'required',
    ];

    public function mount($id)
    {
        $this->inscripcion = Inscripcion::where('ID_INSCRIPCION', $id)->first();
        $this->persona = $this->inscripcion->personaSolicitado;
        $this->idUser = Auth::user()->persona->ID_PERSONA;
        
        $this->departamentos = Departamento::all();
        $this->provincias = collect();
        $this->distritos = collect();
        $this->comunidades = collect();
    }

    public function render()
    {
        $departamentos = $this->departamentos;
        return view('livewire.socios.create', compact('departamentos'));
    }

    public function updatedselectedDistrito($distrito)
    {
        
        if (!is_null($distrito)) {
            $this->comunidades = Comunidad::where('FK_DISTRITO', $distrito)->get();
        }
    }

    public function updatedselectedDepartamento($departamento)
    {
        $this->provincias = collect();
        $this->distritos = collect();
        $this->comunidades = collect();
        if (!is_null($departamento)) {
            $this->provincias = Provincia::where('FK_DEPARTAMENTO', $departamento)->get();
        }
    }

    public function updatedselectedProvincia($provincia)
    {
        $this->distritos = collect();
        $this->comunidades = collect();
        if (!is_null($provincia)) {
            $this->distritos = Distrito::where('FK_PROVINCIA', $provincia)->get();
        }
    }

    public function create() {

        $this->validate();

        Socio::create([
            'ES_SOCIO' => '1',
            'FK_COMUNIDAD' => $this->selectedComunidad,
            'FK_PERSONA' => $this->persona->ID_PERSONA
        ]);

        $this->inscripcion::update([
            'ES_INSCRIPCION' => '1',
            'FK_APROBADO' => $this->idUser
        ]);

        $this->flash('success','¡Se registró!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Se registró correctamente a la persona',
        ], '/personas');
    }

    public function updated($props) {
        $this->validateOnly($props);
    }
}
