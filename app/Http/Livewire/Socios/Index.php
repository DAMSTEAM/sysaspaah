<?php

namespace App\Http\Livewire\Socios;

use App\Models\sys\Inscripcion;
use App\Models\sys\Socio;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use LivewireAlert;

    protected $listeners = [
        'crearIns',
    ];

    protected $paginationTheme = 'bootstrap';

    public $palabraBuscar, $tipoBuscar = 1, $socios;
    public function render()
    {
        if ($this->tipoBuscar == '1') {
            $this->socios = Socio::join("TBL_COMUNIDADES", "MAE_SOCIOS.FK_COMUNIDAD", "=", "TBL_COMUNIDADES.ID_COMUNIDAD")
            ->join("MAE_PERSONAS", "MAE_SOCIOS.FK_PERSONA", "=", "MAE_PERSONAS.ID_PERSONA")
            ->where("MAE_PERSONAS.NO_SOCIO", "like", '%'.$this->palabraBuscar.'%')
            ->where("MAE_SOCIOS.ES_SOCIO", "=", '1')
            ->select("MAE_SOCIOS.*")
            ->orderBy('TBL_COMUNIDADES.NO_COMUNIDAD', 'desc')->paginate(10);
        } else if($this->tipoBuscar == '2') {
            $this->socios = Socio::join("TBL_COMUNIDADES", "MAE_SOCIOS.FK_COMUNIDAD", "=", "TBL_COMUNIDADES.ID_COMUNIDAD")
            ->join("MAE_PERSONAS", "MAE_SOCIOS.FK_PERSONA", "=", "MAE_PERSONAS.ID_PERSONA")
            ->where("TBL_COMUNIDADES.NO_COMUNIDAD", "like", '%'.$this->palabraBuscar.'%')
            ->where("MAE_SOCIOS.ES_SOCIO", "=", '1')
            ->select("MAE_SOCIOS.*")
            ->orderBy('TBL_COMUNIDADES.NO_COMUNIDAD', 'desc')->paginate(10);
        } else {
            $this->socios = Socio::join("TBL_COMUNIDADES", "MAE_SOCIOS.FK_COMUNIDAD", "=", "TBL_COMUNIDADES.ID_COMUNIDAD")
            ->join("MAE_PERSONAS", "MAE_SOCIOS.FK_PERSONA", "=", "MAE_PERSONAS.ID_PERSONA")
            ->where("MAE_PERSONAS.NO_SOCIO", "like", '%'.$this->palabraBuscar.'%')
            ->where("MAE_SOCIOS.ES_SOCIO", "=", '1')
            ->select("MAE_SOCIOS.*")
            ->orderBy('TBL_COMUNIDADES.NO_COMUNIDAD', 'desc')->paginate(10);
        }

        $links = $this->socios;
        $this->socios = collect($this->socios->items());

        return view('livewire.socios.index', ['socios' => compact($this->socios), 
        'links' => $links]);
    }

    public function createAll() {
        $this->alert('info', '¡Inscríbete!', [
            'position' => 'center',
            'timer' => null,
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => 'crearIns',
            'showCancelButton' => true,
            'onDismissed' => '',
            'cancelButtonColor' => '#d33',
            'confirmButtonText' => 'Ir',
            'text' => 'Necesita inscribir una persona ¿Desea continuar?',
            'confirmButtonColor' => '#3085d6'
        ]);
    }

    public function crearIns() {
        $this->flash('success','Registre a la persona', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => true,
            'position' => 'top-end',
            'timerProgressBar' => true,
        ], '/inscripciones/create');
    }
}
