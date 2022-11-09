<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\validador1;

class ControladordePaginas extends Controller
{
    function fHome(){
        return view('home');
    }

    function fFormulario(){
        return view('formulario');
    }

    function fConsulta(){
        return view('Consulta');
    }

    public function procesarDatos(validador1 $req){
        return redirect("/formulario")-> with('confirmacion', 'Tu formulario se esta procesando');
        
    }
}