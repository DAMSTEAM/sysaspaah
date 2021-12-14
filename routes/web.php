<?php

use App\Http\Controllers\InscripcionesController;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\SociosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function () {

    Route::get('personas/excel', [PersonasController::class, 'excel'])->name('personas.excel');
    Route::get('personas/pdf', [PersonasController::class, 'pdf'])->name('personas.pdf');
    Route::resource('personas', PersonasController::class);

    Route::get('socios/excel', [SociosController::class, 'excel'])->name('socios.excel');
    Route::get('socios/pdf', [SociosController::class, 'pdf'])->name('socios.pdf');
    Route::resource('socios', SociosController::class);

    Route::get('inscripciones/excel', [InscripcionesController::class, 'excel'])->name('inscripciones.excel');
    Route::get('inscripciones/pdf', [InscripcionesController::class, 'pdf'])->name('inscripciones.pdf');
    Route::resource('inscripciones', InscripcionesController::class);
});
