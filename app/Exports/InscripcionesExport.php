<?php

namespace App\Exports;

use App\Models\sys\Inscripcion;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class InscripcionesExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View {
        return view('sys.inscripciones.exports.excel', [
            'inscripciones' => Inscripcion::get()
        ]);
    }
}
