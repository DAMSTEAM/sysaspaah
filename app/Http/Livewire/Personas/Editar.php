<?php

namespace App\Http\Livewire\Personas;

use App\Models\sys\Persona;
use Livewire\Component;

class Editar extends Component
{
    public $persona;

    public function mount($id)
    {
        $this->persona = Persona::where('ID_PERSONA', $id)->first();
    }

    public function render()
    {
        return view('livewire.personas.editar');
    }
}
