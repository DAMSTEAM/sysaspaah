<?php

namespace App\Http\Livewire\Inscripciones;

use App\Models\sys\Ingreso;
use App\Models\sys\Inscripcion;
use App\Models\sys\Persona;
use App\Models\sys\Requisito;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;

    protected $rules = [
        'TI_PAGO' => 'required|in:1, 2',
        'NO_INGRESO' => 'required',
        'CA_PAGO' => 'required|max:100',
        'CA_DESCUENTO' => 'required|min:0',
        'MO_TOTAL' => 'required',
        'FK_SOLICITADO' => 'required',
        'opcionesReq' => 'required',
    ];

    public $inscripcion, $requisito, $requisitos, $personas, $opcionesReq = [];

    public $ES_INSCRIPCION, $FK_INGRESO, $FK_SOLICITADO, $FK_APROBADO;

    public $TI_PAGO, $TI_INGRESO, $NO_INGRESO, $CA_PAGO, $CA_DESCUENTO, $MO_TOTAL, $FK_PERSONA;
    
    public $DE_URL, $FK_INSCRIPCION, $FK_REQUISITO;

    public $NO_REQUISITO;

    public function mount()
    {
        $this->FK_PERSONA = Auth::user()->persona->ID_PERSONA;
        $this->requisitos = Requisito::all();
        $this->personas = Persona::where('ES_PERSONA', '<>', '0')->get();
    }

    public function render()
    {
        $this->MO_TOTAL = (float)$this->CA_PAGO - (float)$this->CA_DESCUENTO;
        return view('livewire.inscripciones.create');
    }

    public function create() {

        $this->validate();

        $personaIns = Inscripcion::where('FK_SOLICITADO', $this->FK_SOLICITADO)->first();

        if (empty($personaIns)) {
            $this->ingreso = Ingreso::create([
                'TI_PAGO' => $this->TI_PAGO,
                'TI_INGRESO' => '1',
                'NO_INGRESO' => $this->NO_INGRESO,
                'CA_PAGO' => $this->CA_PAGO,
                'CA_DESCUENTO' => $this->CA_DESCUENTO,
                'MO_TOTAL_PAGO' => $this->MO_TOTAL,
                'FK_PERSONA' => $this->FK_PERSONA,
            ]);
    
            $this->inscripcion = Inscripcion::create([
                'ES_INSCRIPCION' => '3',
                'FK_INGRESO' => $this->ingreso->ID_INGRESO,
                'FK_SOLICITADO' => $this->FK_SOLICITADO,
                'FK_APROBADO' => null
            ]);
    
            if ($this->opcionesReq) {
                $this->inscripcion->requisitos()->attach($this->opcionesReq, array('DE_URL' => 'URL/PRONTO'));
            }
    
            $this->flash('success','¡Se registró!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'text' => 'Se registró correctamente a la persona',
            ], '/inscripciones');
        } else {
            if($personaIns->ES_INSCRIPCION == '0') {
                $personaIns->update([
                    'ES_INSCRIPCION' => '3'
                ]);
                $this->flash('success','¡Se registró!', [
                    'position' => 'center',
                    'timer' => 3000,
                    'toast' => false,
                    'text' => 'Se aperturó la inscripción',
                ], '/inscripciones');
            } else {
                $this->alert('error', 'Ocurrió un error', [
                    'position' => 'center',
                    'timer'  => 5000,
                    'toast' => false,
                    'showConfirmButton' => true,
                    'onConfirmed' => '',
                    'text' => 'Seleccione otra persona, la persona ya está inscrita',
                    'confirmButtonColor' => '#3085d6'
                ]);
            }
        }
    }

    public function updated($props) {
        $this->validateOnly($props);
    }
}
