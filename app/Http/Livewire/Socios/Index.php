<?php

namespace App\Http\Livewire\Socios;

use App\Models\sys\Inscripcion;
use App\Models\sys\Persona;
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
        'cambiar',
        'retirar',
        'crearIns'
    ];

    protected $paginationTheme = 'bootstrap';

    public $palabraBuscar, $tipoBuscar = 1, $socios, $ID_SOCIO;
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
            ->select("MAE_SOCIOS.*")
            ->orderBy('TBL_COMUNIDADES.NO_COMUNIDAD', 'desc')->paginate(10);
        } else if($this->tipoBuscar == '3') {
            $this->socios = Socio::join("TBL_COMUNIDADES", "MAE_SOCIOS.FK_COMUNIDAD", "=", "TBL_COMUNIDADES.ID_COMUNIDAD")
            ->join("MAE_PERSONAS", "MAE_SOCIOS.FK_PERSONA", "=", "MAE_PERSONAS.ID_PERSONA")
            ->where("MAE_PERSONAS.NO_SOCIO", "like", '%'.$this->palabraBuscar.'%')
            ->where("MAE_SOCIOS.ES_SOCIO", "=", '0')
            ->select("MAE_SOCIOS.*")
            ->orderBy('TBL_COMUNIDADES.NO_COMUNIDAD', 'desc')->paginate(10);
        } else {
            $this->socios = Socio::join("TBL_COMUNIDADES", "MAE_SOCIOS.FK_COMUNIDAD", "=", "TBL_COMUNIDADES.ID_COMUNIDAD")
            ->join("MAE_PERSONAS", "MAE_SOCIOS.FK_PERSONA", "=", "MAE_PERSONAS.ID_PERSONA")
            ->where("MAE_PERSONAS.NO_SOCIO", "like", '%'.$this->palabraBuscar.'%')
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
        $this->flash('success','Registre una inscripción', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => true,
            'position' => 'top-end',
            'timerProgressBar' => true,
        ], '/inscripciones/create');
    }

    public function delete($id)
    {
        $this->ID_SOCIO = $id;

        $this->alert('warning', 'Retirar Socio!', [
            'position' => 'center',
            'timer'  => null,
            'toast' => false,
            'onConfirmed' => 'retirar',
            'showCancelButton' => true,
            'onDismissed' => '',
            'cancelButtonColor' => '#d33',
            'confirmButtonColor' => '#3085d6',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Enviar',
            'title' => '¡Verificar  inscripción!',
            'input' => 'text',
            'inputLabel' => 'Ingrese el DNI del socio',
            'allowOutsideClick' => false,
            'timer' => null
        ]);
    }

    public function retirar($data) {
        $dni = $data['value'];
        if ($this->ID_SOCIO) {
            $persona = Socio::join("MAE_PERSONAS", "MAE_SOCIOS.FK_PERSONA", "=", "MAE_PERSONAS.ID_PERSONA")
            ->where("MAE_SOCIOS.ID_SOCIO", "=", $this->ID_SOCIO)
            ->select("MAE_PERSONAS.*")->first();

            if ($persona->CO_DNI == $dni) {
                $this->alert('question', '¿Desea retirar al socio?', [
                    'position' => 'center',
                    'timer'  => null,
                    'toast' => false,
                    'showConfirmButton' => true,
                    'onConfirmed' => 'cambiar',
                    'showCancelButton' => true,
                    'onDismissed' => '',
                    'cancelButtonColor' => '#d33',
                    'text' => 'Ingrese el Cod. de la inscripción para eliminar',
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

    public function cambiar() {
        if ($this->ID_SOCIO) {
            $socio = Socio::where('ID_SOCIO', $this->ID_SOCIO);
            $socio->update([
                'ES_SOCIO' => '0',
            ]);

            $this->alert('success','¡Se retiró!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'text' => 'Se retiró correctamente el socio',
            ], '/socios');
        }
    }
}
