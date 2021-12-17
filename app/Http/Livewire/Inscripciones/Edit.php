<?php

namespace App\Http\Livewire\Inscripciones;

use App\Models\sys\Ingreso;
use App\Models\sys\Inscripcion;
use App\Models\sys\Persona;
use App\Models\sys\Requisito;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

use Livewire\Component;

class Edit extends Component
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

    public $inscripcion, $requisito, $requisitos, $requisitosSelect, $personas, $opcionesReq = [];

    /* INSCRIPCION */
    public $ID_INSCRIPCION, $ES_INSCRIPCION, $FK_INGRESO, $FK_SOLICITADO, $FK_APROBADO;

    /* INGRESO */
    public $ID_INGRESO, $TI_PAGO, $TI_INGRESO, $NO_INGRESO, $CA_PAGO, $CA_DESCUENTO, $MO_TOTAL, $FK_PERSONA;
    
    /* REQUISITO_INSCRIPCION */
    public $DE_URL, $FK_INSCRIPCION, $FK_REQUISITO;

    /* REQUISITO */
    public $NO_REQUISITO;

    public function mount($id)
    {
        $inscripcion = Inscripcion::where('ID_INSCRIPCION', $id)->first();
        $ingreso = $inscripcion->ingreso;
        $requisitos = $inscripcion->requisitos;

        $this->opcionesReq = $inscripcion->requisitos->pluck('ID_REQUISITO');
        
        $this->ID_INSCRIPCION = $id;

        $this->ES_INSCRIPCION = $inscripcion->ES_INSCRIPCION;
        $this->FK_INGRESO = $inscripcion->FK_INGRESO;
        $this->FK_SOLICITADO = $inscripcion->FK_SOLICITADO;
        $this->FK_APROBADO = $inscripcion->FK_APROBADO;

        $this->ID_INGRESO = $ingreso->ID_INGRESO;
        $this->TI_PAGO = $ingreso->TI_PAGO;
        $this->TI_INGRESO = $ingreso->TI_INGRESO;
        $this->NO_INGRESO = $ingreso->NO_INGRESO;
        $this->CA_PAGO = $ingreso->CA_PAGO;
        $this->CA_DESCUENTO = $ingreso->CA_DESCUENTO;
        $this->MO_TOTAL = $ingreso->MO_TOTAL;

        $this->requisitosSelect = $requisitos;

        $this->FK_PERSONA = Auth::user()->persona->ID_PERSONA;
        $this->requisitos = Requisito::all();
        $this->personas = Persona::all();
        
    }

    protected $listeners = [
        'update'
    ];

    public function render()
    {
        $this->MO_TOTAL = (float)$this->CA_PAGO - (float)$this->CA_DESCUENTO;
        return view('livewire.inscripciones.edit');
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
        $ingreso = Ingreso::find($this->ID_INGRESO);

        $ingreso->update([
            'TI_PAGO' => $this->TI_PAGO,
            'TI_INGRESO' => $this->TI_INGRESO,
            'NO_INGRESO' => $this->NO_INGRESO,
            'CA_PAGO' => $this->CA_PAGO,
            'CA_DESCUENTO' => $this->CA_DESCUENTO,
            'MO_TOTAL_PAGO' => $this->MO_TOTAL,
            'FK_PERSONA' => $this->FK_PERSONA,
        ]);

        $inscripcion = Inscripcion::find($this->ID_INSCRIPCION);
        $this->inscripcion = $inscripcion;

         $inscripcion->update([
            'ES_INSCRIPCION' => $this->ES_INSCRIPCION,
            'FK_INGRESO' => $this->ID_INGRESO,
            'FK_SOLICITADO' => $this->FK_SOLICITADO,
            'FK_APROBADO' => $this->FK_APROBADO
        ]);

/*         $this->inscripcion->requisitos()->dettach($this->opcionesReq, array('DE_URL' => 'URL/PRONTO'));

        if ($this->opcionesReq) {
            $this->inscripcion->requisitos()->attach($this->opcionesReq, array('DE_URL' => 'URL/PRONTO'));
        } */
    
        $this->flash('success','¡Se actualizó!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Se actualizó correctamente la inscripción',
        ], '/inscripciones');
    }

    public function updated($props) {
        $this->validateOnly($props);
    }
}
