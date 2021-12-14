<?php

namespace App\Http\Controllers\exports;

use App\Http\Controllers\Controller;
use App\Models\sys\Persona;
use PDF;

class PersonaPdf extends Controller
{
    public function pdf() {
        $personas = Persona::all();
        $pdf = PDF::loadView('sys.personas.exports.pdf', compact('personas'));
        return $pdf->stream('personas.pdf');
        /* 
        return view('sys.personas.exports.pdf', compact('personas')); */
    }
}
