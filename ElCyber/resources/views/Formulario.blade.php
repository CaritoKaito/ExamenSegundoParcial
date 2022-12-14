@extends('plantilla')
@section('contenido')

@if(session()->has('confirmacion'))
    {!! "<script>Swal.fire('Listo','Tu datos se estan procesando','success')</script>" !!}
    <div class="alert alert-primary alert-dimissible fade show text-center" role="alert">
        <strong>{{session('confirmacion')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> 
@endif

<h1 class="mt-4 display-1 text-center">Formulario</h1>
<br>
<div class="container mt-5 col-md-6">
    <div>
        <div class="card-header text-center text-primary">
            Bienvenido a ElCyber, por favor llena los siguientes datos: <i class="bi bi wechat"></i>
        </div>

    @if($errors->any())
        @foreach($errors->all() as $error)
        <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
            <strong> Formulario Incompleto!</strong>{{$error}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endforeach
    @endif

    <div>
        <form method="post" action="{{ route('formulario.store') }}">
            @csrf 
            <div>
                <label  class= "form label" name="labelUsuario">Nombre de Usuario: </label>
                <input type="text" class="form-control" name="txtUsuario" value="{{ old('txtUsuario')}}">
                <p class="fw-bold text-danger">{{$errors->first('txtUsuario')}}</p>
            </div>

            <div>
                <label  class= "form label" name="labelComputadora">No. de Computadora: </label>
                <input type="text" class="form-control" name="txtComputadora" value="{{ old('txtComputadora')}}">
                <p class="fw-bold text-danger">{{$errors->first('txtComputadora')}}</p>
            </div>

            <div>
                <label  class= "form label" name="labelTiempo">Tiempo de estancia aqui: </label>
                <input type="text" class="form-control" name="txtTiempo" value="{{ old('txtTiempo')}}">
                <p class="fw-bold text-danger">{{$errors->first('Tiempo')}}</p>
            </div>

            <div>
                <label  class= "form label" name="labelFecha">Fecha: </label>
                <input type="text" class="form-control" name="txtFecha" value="{{ old('txtFecha')}}">
                <p class="fw-bold text-danger">{{$errors->first('txtFecha')}}</p>
            </div>

        </div>
        <div>
            <button type="sumit" name="btnGuardar">Guardar</button>
            <form> 
        </div>
    </div>
</div>

@stop