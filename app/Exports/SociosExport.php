<?php

namespace App\Exports;

use App\Models\sys\Persona;
use App\Models\sys\Socio;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class SociosExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View {
        return view('sys.socios.exports.excel', [
            'socios' => Socio::get()
        ]);
    }
}
