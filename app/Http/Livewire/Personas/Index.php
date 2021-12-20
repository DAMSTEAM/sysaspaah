<?php

namespace App\Http\Livewire\Personas;

use App\Models\sys\Inscripcion;
use App\Models\sys\Persona;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use LivewireAlert;

    protected $listeners = [
        'destroy',
        'retirar'
    ];

    protected $paginationTheme = 'bootstrap';

    public $palabraBuscar, $tipoBuscar = 3, $personas;

    public $NO_SOCIO, $AP_PATERNO, $AP_MATERNO, $CO_DNI, $NU_CELULAR, $TI_SEXO, $FE_NACIMIENTO, $ID_PERSONA;

    public function render()
    {
        if ($this->tipoBuscar == '0') {
            $this->personas = Persona::where('NO_SOCIO', 'like', '%' . $this->palabraBuscar . '%')
            ->where('ES_PERSONA', '=', 1)
            ->orderBy('NO_SOCIO', 'desc')->paginate(10); 
        } else if ($this->tipoBuscar == '1') {
            $this->personas = Persona::where('ES_PERSONA', '=', 1)
            ->where('NO_SOCIO', 'like', '%' . $this->palabraBuscar . '%')
            ->orderBy('NO_SOCIO', 'desc')->paginate(10); 
        } else if($this->tipoBuscar == '2') {
            $this->personas = Persona::where('CO_DNI', 'like', '%' . $this->palabraBuscar . '%')
            ->where('ES_PERSONA', '=', 1)
            ->orderBy('CO_DNI', 'desc')->paginate(10); 
        } else {
            $this->personas = Persona::where('ID_PERSONA', 'like', '%' . $this->palabraBuscar . '%')
            ->where('ES_PERSONA', '=', 1)
            ->orderBy('ID_PERSONA', 'desc')->paginate(10); 
        }

        $links = $this->personas;
        $this->personas = collect($this->personas->items());

        return view('livewire.personas.index', ['personas' => compact($this->personas), 
        'links' => $links]);
    }

    public function delete($id)
    {
        $this->ID_PERSONA = $id;

        /* para validar los estados de las insripciones agregar mas where a la consulta */
        $personaCurso = Inscripcion::where('FK_SOLICITADO', '=', $id)->where('ES_INSCRIPCION', '=', '3')->first();

        if (empty($personaCurso)) {
            $this->alert('warning', '¡Eliminar persona!', [
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
                'title' => '¡Verificar  persona!',
                'input' => 'text',
                'inputLabel' => 'Ingrese el DNI de la persona',
                'allowOutsideClick' => false,
                'timer' => null
            ]);
        } else {
            $this->alert('error', '¡Ocurrió un error!', [
                'position' => 'center',
                'timer'  => 3000,
                'toast' => false,
                'showConfirmButton' => true,
                'onConfirmed' => '',
                'text' => 'La persona tiene una inscripción pendiente',
                'confirmButtonColor' => '#3085d6'
            ]);
        }
    }

    public function destroy($data) {
        $dni = $data['value'];
        if ($this->ID_PERSONA) {
            $persona = Persona::where('ID_PERSONA', $this->ID_PERSONA)->first();
            if ($persona->CO_DNI == $dni) {
                $this->alert('question', '¿Desea eliminar?', [
                    'position' => 'center',
                    'timer'  => null,
                    'toast' => false,
                    'showConfirmButton' => true,
                    'onConfirmed' => 'retirar',
                    'showCancelButton' => true,
                    'onDismissed' => '',
                    'cancelButtonColor' => '#d33',
                    'text' => 'Ingrese el DNI de la persona para eliminar',
                    'confirmButtonColor' => '#3085d6'
                ]);
            } else {
                $this->alert('error', '¡Ocurrió un error!', [
                    'position' => 'center',
                    'timer'  => 3000,
                    'toast' => false,
                    'showConfirmButton' => true,
                    'onConfirmed' => '',
                    'text' => 'El DNI es incorrecto, vuelva a intentarlo',
                    'confirmButtonColor' => '#3085d6'
                ]);
            }
        }
    }

    public function retirar() {
        if ($this->ID_PERSONA) {
            $persona = Persona::where('ID_PERSONA', $this->ID_PERSONA);
            $persona->update([
                'ES_PERSONA' => '0',
            ]);

            $this->alert('success','¡Se eliminó!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'text' => 'Se eliminó correctamente la persona',
            ], '/personas');
        }
    }

/* 
    public function saveRequisito() {
        $this->reqTBL = DB::select("call SP_INS_REQUISITOS('$this->palabraReq', @status)");
    } */
}
