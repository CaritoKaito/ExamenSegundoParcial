<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladordePaginas;
use App\Http\Controllers\ControladorBD;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [ControladordePaginas::class, 'fHome'])->name('NHome');
Route::get('/formulario', [ControladordePaginas::class, 'fFormulario'])->name('NFormulario');
Route::get('/consulta', [ControladordePaginas::class, 'fConsulta'])->name('NConsulta');

Route::post("/guardarDatos", [ControladordePaginas::class, "procesarDatos"])->name("NProcesar");

Route::get('/formulario/create', [ControladorBD:: class, 'create'])->name('formulario.create');

Route::post('/formulario', [ControladorBD::class, 'store'])->name('formulario.store');

Route::get('/formulario', [ControladorBD::class, 'index'])->name('formulario.index');

Route::get('/formulario/{id}/edit', [ControladorBD::class, 'edit'])->name('formulario.edit');

Route::put('/formulario/{id}', [ControladorBD::class, 'update'])->name('formulario.update');

Route::get('/formulario/{id}/confirm', [ControladorBD::class, 'confirm'])->name('formulario.confirm');

Route::delete('/formulario/{id}', [ControladorBD::class, 'destroy'])->name('formulario.destroy');