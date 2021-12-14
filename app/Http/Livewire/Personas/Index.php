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

    public $palabraBuscar, $personas;

    public $NO_SOCIO, $AP_PATERNO, $AP_MATERNO, $CO_DNI, $NU_CELULAR, $TI_SEXO, $FE_NACIMIENTO, $ID_PERSONA;

    public function render()
    {
        $this->personas = Persona::where('NO_SOCIO', 'like', '%' . $this->palabraBuscar . '%')
        ->orderBy('ID_PERSONA', 'desc')->paginate(10);
        
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
            'timer' => null,
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
