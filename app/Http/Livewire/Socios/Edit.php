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
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Edit extends Component
{
    use LivewireAlert;

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

    protected $listeners = [
        'update'
    ];

    public function mount($id)
    {        
        $socio = Socio::where('ID_SOCIO', $id)->first();

        $this->departamentos = Departamento::all();
        $this->provincias = collect();
        $this->distritos = collect();
        $this->comunidades = collect();

        $comunidad = $socio->comunidad->ID_COMUNIDAD;
        $distrito = $socio->comunidad->distrito;
        $provincia = $socio->comunidad->distrito->provincia;
        $departamento =  $socio->comunidad->distrito->departamento;
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

    public function edit() {
        $this->alert('warning', '¿Desea actualizar?', [
            'position' => 'center',
            'timer' => null,
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => 'update',
            'showCancelButton' => true,
            'onDismissed' => '',
            'cancelButtonColor' => '#d33',
            'text' => 'Los datos nuevos, remplazarán los datos antiguos',
            'confirmButtonColor' => '#3085d6'
        ]);
    }

    public function update() {

        $this->validate();
        $ingreso = Socio::find($this->ID_INGRESO);

        $ingreso->update([
            'TI_PAGO' => $this->TI_PAGO,
            'TI_INGRESO' => $this->TI_INGRESO,
            'NO_INGRESO' => $this->NO_INGRESO,
            'CA_PAGO' => $this->CA_PAGO,
            'CA_DESCUENTO' => $this->CA_DESCUENTO,
            'MO_TOTAL_PAGO' => $this->MO_TOTAL,
            'FK_PERSONA' => $this->FK_PERSONA,
        ]);

        $this->flash('success','¡Se actualizó!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Se actualizó correctamente la inscripción',
        ], '/personas');
    }

    public function updated($props) {
        $this->validateOnly($props);
    }
}
