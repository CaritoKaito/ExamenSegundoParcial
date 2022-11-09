<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladordePaginas;

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