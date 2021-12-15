<?php

namespace App\Http\Livewire\Inscripciones;

use App\Models\sys\Inscripcion;
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

    public $palabraBuscar, $tipoBuscar = 3, $inscripciones;

    public $ES_INSCRIPCION, $FK_INGRESO, $FK_SOLICITADO, $FK_APROBADO;

    public $TI_PAGO, $TI_INGRESO, $NO_INGRESO, $CA_PAGO, $CA_DESCUENTO, $MO_TOTAL, $FK_SOCIO;
    
    public $DE_URL, $FK_INSCRIPCION, $FK_REQUISITO;

    public $NO_REQUISITO;

    public function render()
    {
        $this->inscripciones = Inscripcion::where('ID_INSCRIPCION', 'like', '%' . $this->palabraBuscar . '%')
        ->orderBy('ID_INSCRIPCION', 'desc')->paginate(10); 

        $links = $this->inscripciones;
        $this->inscripciones = collect($this->inscripciones->items());

        return view('livewire.inscripciones.index', ['inscripciones' => compact($this->inscripciones), 
        'links' => $links]);
    }
}
