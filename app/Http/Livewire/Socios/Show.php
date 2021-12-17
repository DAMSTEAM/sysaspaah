<?php

namespace App\Http\Livewire\Socios;

use App\Models\sys\Socio;
use Livewire\Component;

class Show extends Component
{
    public $socio;

    public function mount($id)
    {        
        $this->socio = Socio::where('ID_SOCIO', $id)->first();
    }

    public function render()
    {
        return view('livewire.socios.show');
    }
}
