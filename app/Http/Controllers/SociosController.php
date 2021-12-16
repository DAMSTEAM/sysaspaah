<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\PersonasExport;
use App\Http\Controllers\Controller;
use App\Models\sys\Socio;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class SociosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sys.socios.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sys.socios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('sys.socios.show', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('sys.socios.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function excel() {
        return Excel::download(new PersonasExport, 'personas.xlsx');
    }

    public function pdf() {
        $personas = Socio::all();
        $pdf = PDF::loadView('sys.personas.exports.pdf', compact('personas'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('personas.pdf');
    }

    public function pdfCarnets() {
        $personas = Socio::all();
        $pdf = PDF::loadView('sys.personas.exports.pdfCarnets', compact('personas'));
        /* $pdf->setPaper('a4', 'landscape'); */
        return $pdf->stream('personasCarnets.pdf');
    }

    public function pdfCarnet($id) {
        $persona = Socio::find($id);
        $pdf = PDF::loadView('sys.personas.exports.pdfCarnet', compact('persona'));
        /* $pdf->setPaper('a4', 'landscape'); */
        return $pdf->stream('personasCarnet.pdf');
    }

    public function createAll($id)
    {
        return view('sys.socios.createAll', compact('id'));
    }
}
