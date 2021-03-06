<?php

namespace App\Http\Livewire\Inscripciones;

use App\Models\sys\Inscripcion;
use App\Models\sys\Persona;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use LivewireAlert;

    protected $listeners = [
        'destroy',
        'retirar', 
        'delete',
        'cambiar'
    ];

    protected $paginationTheme = 'bootstrap';

    public $palabraBuscar, $tipoBuscar = 0, $inscripciones, $socio;

    public $ES_INSCRIPCION, $FK_INGRESO, $FK_SOLICITADO, $FK_APROBADO;

    public $TI_PAGO, $TI_INGRESO, $NO_INGRESO, $CA_PAGO, $CA_DESCUENTO, $MO_TOTAL, $FK_SOCIO;
    
    public $DE_URL, $FK_INSCRIPCION, $FK_REQUISITO;

    public $NO_REQUISITO;

    public function render()
    {
        $this->inscripciones = Inscripcion::where('ID_INSCRIPCION', 'like', '%' . $this->palabraBuscar . '%')
        ->where('ES_INSCRIPCION', 'like', '%' . $this->tipoBuscar . '%')
        ->where('ES_INSCRIPCION', '<>', '0')
        ->orderBy('ID_INSCRIPCION', 'desc')->paginate(10);

        if ($this->tipoBuscar == '1') {
            $this->inscripciones = Inscripcion::where('ES_INSCRIPCION', 'like', '%' . $this->tipoBuscar . '%')
            ->where('ID_INSCRIPCION', 'like', '%' . $this->palabraBuscar . '%')
            ->where('ES_INSCRIPCION', '<>', '0')
            ->orderBy('ID_INSCRIPCION', 'desc')->paginate(10); 
        } else if($this->tipoBuscar == '2') {
            $this->inscripciones = Inscripcion::where('ES_INSCRIPCION', 'like', '%' . $this->tipoBuscar . '%')
            ->where('ID_INSCRIPCION', 'like', '%' . $this->palabraBuscar . '%')
            ->where('ES_INSCRIPCION', '<>', '0')
            ->orderBy('ID_INSCRIPCION', 'desc')->paginate(10); 
        } else if($this->tipoBuscar == '3') {
            $this->inscripciones = Inscripcion::where('ES_INSCRIPCION', 'like', '%' . $this->tipoBuscar . '%')
            ->where('ID_INSCRIPCION', 'like', '%' . $this->palabraBuscar . '%')
            ->where('ES_INSCRIPCION', '<>', '0')
            ->orderBy('ID_INSCRIPCION', 'desc')->paginate(10); 
        } else {
            $this->inscripciones = Inscripcion::where('ID_INSCRIPCION', 'like', '%' . $this->palabraBuscar . '%')
            ->where('ES_INSCRIPCION', '<>', '0')
            ->orderBy('ID_INSCRIPCION', 'desc')->paginate(10);
        }

        $links = $this->inscripciones;
        $this->inscripciones = collect($this->inscripciones->items());

        return view('livewire.inscripciones.index', ['inscripciones' => compact($this->inscripciones), 
        'links' => $links]);
    }

    public function delete($id)
    {
        $this->ID_INSCRIPCION = $id;

        $this->alert('warning', '??Eliminar inscripci??n!', [
            'position' => 'center',
            'timer'  => null,
            'toast' => false,
            'onConfirmed' => 'destroy',
            'showCancelButton' => true,
            'onDismissed' => '',
            'cancelButtonColor' => '#d33',
            'confirmButtonColor' => '#3085d6',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Enviar',
            'title' => '??Verificar  inscripci??n!',
            'input' => 'text',
            'inputLabel' => 'Ingrese el cod de la inscripci??n',
            'allowOutsideClick' => false,
            'timer' => null
        ]);
    }

    public function destroy($data) {
        $dni = $data['value'];
        if ($this->ID_INSCRIPCION) {
            $inscripcion = Inscripcion::where('ID_INSCRIPCION', $this->ID_INSCRIPCION)->first();
            if ($inscripcion->ID_INSCRIPCION == $dni) {
                $this->alert('question', '??Desea eliminar?', [
                    'position' => 'center',
                    'timer'  => null,
                    'toast' => false,
                    'showConfirmButton' => true,
                    'onConfirmed' => 'cambiar',
                    'showCancelButton' => true,
                    'onDismissed' => '',
                    'cancelButtonColor' => '#d33',
                    'text' => 'Ingrese el Cod. de la inscripci??n para eliminar',
                    'confirmButtonColor' => '#3085d6'
                ]);
            } else {
                $this->alert('error', '??Ocurri?? un error!', [
                    'position' => 'center',
                    'timer'  => 3000,
                    'toast' => false,
                    'showConfirmButton' => true,
                    'onConfirmed' => '',
                    'text' => 'El Cod. es incorrecto, vuelva a intentarlo',
                    'confirmButtonColor' => '#3085d6'
                ]);
            }
        }
    }

    public function rechazar($id) {
        
        $this->ID_INSCRIPCION = $id;
        
        $this->alert('question', '??Desea rechazar?', [
            'position' => 'center',
            'timer'  => null,
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => 'retirar',
            'showCancelButton' => true,
            'onDismissed' => '',
            'cancelButtonColor' => '#d33',
            'text' => 'Se anular?? la inscripci??n creada',
            'confirmButtonColor' => '#3085d6'
        ]);
    }

    public function retirar() {
        if ($this->ID_INSCRIPCION) {
            $inscripcion = Inscripcion::where('ID_INSCRIPCION', $this->ID_INSCRIPCION);
            $inscripcion->update([
                'ES_INSCRIPCION' => '2',
            ]);

            $this->alert('success','??Se rechaz??!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'text' => 'Se rechaz?? la inscripci??n',
            ], '/personas');
        }
    }

    public function cambiar() {
        if ($this->ID_INSCRIPCION) {
            $inscripcion = Inscripcion::where('ID_INSCRIPCION', $this->ID_INSCRIPCION)->first();

            $inscripcion->update([
                'ES_INSCRIPCION' => '0',
            ]);

            $this->alert('success','??Se elimin??!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'text' => 'Se elimin?? correctamente la inscripci??n',
            ], '/personas');
        }
    }
}
