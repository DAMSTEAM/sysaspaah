<?php

namespace App\Http\Livewire;

use App\Models\sys\Persona;
use Livewire\Component;
use Livewire\WithPagination;

class Personas extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $personas, $NO_SOCIO, $AP_PATERNO, $AP_MATERNO, $CO_DNI, $NU_CELULAR, $TI_SEXO, $FE_NACIMIENTO, $ID_PERSONA;
    public $updateMode = false;

    public function render()
    {
        $this->personas = Persona::paginate(5);
        $links = $this->personas;
        $this->personas = collect($this->personas->items());

        return view('livewire.personas', ['personas' => compact($this->personas), 'links' => $links]);
    }

    private function resetInputFields(){
        $this->NO_SOCIO = '';
        $this->AP_PATERNO = '';
        $this->AP_MATERNO = '';
        $this->CO_DNI = '';
        $this->NU_CELULAR = '';
        $this->TI_SEXO = '';
        $this->FE_NACIMIENTO = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'NO_SOCIO' => 'required|max:10',
            'AP_PATERNO' => 'required',
            'AP_MATERNO' => 'required',
            'CO_DNI' => 'required',
            'NU_CELULAR' => 'required',
            'TI_SEXO' => 'required',
            'FE_NACIMIENTO' => 'required',
        ]);

        Persona::create($validatedDate);

        session()->flash('message', 'Users Created Successfully.');

        $this->resetInputFields();

        $this->emit('userStore'); // Close model to using to jquery
    }
    public function edit($id)
    {
        $this->updateMode = true;
        $persona = Persona::where('id', $id)->first();

        $this->ID_PERSONA = $id;
        $this->NO_SOCIO = $persona->NO_SOCIO;
        $this->AP_PATERNO = $persona->AP_PATERNO;
        $this->AP_MATERNO = $persona->AP_MATERNO;
        $this->CO_DNI = $persona->CO_DNI;
        $this->NU_CELULAR = $persona->NU_CELULAR;
        $this->TI_SEXO = $persona->TI_SEXO;
        $this->FE_NACIMIENTO = $persona->FE_NACIMIENTO;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($this->ID_PERSONA) {
            $persona = Persona::find($this->user_id);
            $persona->update([
                'NO_SOCIO' => 'required',
                'AP_PATERNO' => 'required',
                'AP_MATERNO' => 'required',
                'CO_DNI' => 'required',
                'NU_CELULAR' => 'required',
                'TI_SEXO' => 'required',
                'FE_NACIMIENTO' => 'required',
            ]);

            $this->updateMode = false;

            session()->flash('message', 'Users Updated Successfully.');

            $this->resetInputFields();
        }
    }
    public function delete($id)
    {
        if($id){
            Persona::where('id',$id)->delete();

            session()->flash('message', 'Users Deleted Successfully.');
        }
    }
}
