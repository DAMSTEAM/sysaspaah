<?php

namespace App\Http\Livewire\Personas;

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
        'destroy'
    ];

    protected $paginationTheme = 'bootstrap';

    public $palabraBuscar, $tipoBuscar = 3, $personas;

    public $NO_SOCIO, $AP_PATERNO, $AP_MATERNO, $CO_DNI, $NU_CELULAR, $TI_SEXO, $FE_NACIMIENTO, $ID_PERSONA;

    public function render()
    {
        if ($this->tipoBuscar == '0') {
            $this->personas = Persona::where('NO_SOCIO', 'like', '%' . $this->palabraBuscar . '%')
            ->orderBy('NO_SOCIO', 'desc')->paginate(10); 
        } else if ($this->tipoBuscar == '1') {
            $this->personas = Persona::where('NO_SOCIO', 'like', '%' . $this->palabraBuscar . '%')
            ->orWhere('AP_PATERNO', 'like', '%' . $this->palabraBuscar . '%')
            ->orWhere('AP_MATERNO', 'like', '%' . $this->palabraBuscar . '%')
            ->orderBy('NO_SOCIO', 'desc')->paginate(10); 
        } else if($this->tipoBuscar == '2') {
            $this->personas = Persona::where('CO_DNI', 'like', '%' . $this->palabraBuscar . '%')
            ->orderBy('CO_DNI', 'desc')->paginate(10); 
        } else {
            $this->personas = Persona::where('ID_PERSONA', 'like', '%' . $this->palabraBuscar . '%')
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
        $this->alert('question', '¿Desea eliminar?', [
            'position' => 'center',
            'timer'  => null,
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => 'destroy',
            'showCancelButton' => true,
            'onDismissed' => '',
            'cancelButtonColor' => '#d33',
            'text' => 'Los datos se eliminarán por completo',
            'confirmButtonColor' => '#3085d6'
        ]);
    }

    public function destroy() {
        if ($this->ID_PERSONA) {
            $persona = Persona::where('ID_PERSONA', $this->ID_PERSONA);
            $persona->delete();
        }

        $this->alert('success','¡Se eliminó!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Se eliminó correctamente la persona',
        ], '/personas');
    }
/* 
    public function saveRequisito() {
        $this->reqTBL = DB::select("call SP_INS_REQUISITOS('$this->palabraReq', @status)");
    } */
}
