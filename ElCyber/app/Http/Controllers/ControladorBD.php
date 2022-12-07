<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests\Validador1;
use Carbon\Carbon;

class ControladorBD extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultaFormulario = DB::table('tb_formulariocyber')->get();
        return view('consulta',compact('consultaFormulario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formulario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Validador1 $req)
    {
        DB::table('tb_formulariocyber')->insert([
            "usuario"=>$req->input('txtUsuario'),
            "computadora"=>$req->input('txtComputadora'),
            "tiempo"=>$req->input('txtTiempo'),
            "fecha"=>$req->input('txtFecha'),
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now()
        ]);
        return redirect('formulario/create')->with('mensaje','Formulario procesando');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formularioid = DB::table('tb_formulariocyber')->where('idUsuario',$id)->first();
        return view ('editarFormulario', compact('formularioid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Validador1 $req, $id)
    {
        DB::table('tb_formulariocyber')->where('idUsuario', $id)->update([

            "usuario"=>$req->input('txtUsuario'),
            "computadora"=>$req->input('txtComputadora'),
            "tiempo"=>$req->input('txtTiempo'),
            "fecha"=>$req->input('txtFecha'),
            "updated_at"=> Carbon::now(),

        ]);

        return redirect('formulario')->with('mensaje','Datos actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function confirm($id)
    {
        $formularioid = DB::table('tb_formulariocyber')->where('idUsuario',$id)->first();
        return view ('elimFormulario', compact('formularioid'));
    }
    
     public function destroy($id)
    {
        DB::table('tb_formulariocyber')->where('idUsuario', $id)->delete();
        return redirect('formulario')->with('mensaje', "Registro borrado");
    }

}