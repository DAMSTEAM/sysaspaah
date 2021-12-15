<?php

namespace App\Http\Livewire\Personas;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\sys\Persona;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;

    protected $rules = [
        'NO_SOCIO' => 'required',
        'AP_PATERNO' => 'required',
        'AP_MATERNO' => 'required',
        'CO_DNI' => 'required|max:8',
        'NU_CELULAR' => 'required|max:9',
        'TI_SEXO' => 'required|in:1, 2',
        'FE_NACIMIENTO' => 'required'
    ];

    public $NO_SOCIO, $AP_PATERNO, $AP_MATERNO, $CO_DNI, $NU_CELULAR, $TI_SEXO, $FE_NACIMIENTO, $ID_PERSONA;
    
    public function render()
    {
        return view('livewire.personas.create');
    }

    public function create() {

        $this->validate();

        Persona::create([
            'NO_SOCIO' => $this->NO_SOCIO,
            'AP_PATERNO' => $this->AP_PATERNO,
            'AP_MATERNO' => $this->AP_MATERNO,
            'CO_DNI' => $this->CO_DNI,
            'NU_CELULAR' => $this->NU_CELULAR,
            'TI_SEXO' => $this->TI_SEXO,
            'ES_PERSONA' => '1',
            'FE_NACIMIENTO' => $this->FE_NACIMIENTO,
            'ID_PERSONA' => $this->ID_PERSONA
        ]) ;

        $this->flash('success','¡Se registró!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Se registró correctamente a la persona',
        ], '/personas');
    }

    public function updated($props) {
        $this->validateOnly($props);
    }
}
