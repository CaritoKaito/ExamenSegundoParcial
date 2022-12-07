@extends('plantilla')
@section('contenido')

@if(session()->has('confirmacion'))
    {!! "<script>Swal.fire('Listo','Tu registro se esta procesando','success')</script>" !!}
    <div class="alert alert-primary alert-dimissible fade show text-center" role="alert">
        <strong>{{session('confirmacion')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> 
@endif

<h1 class="mt-4 display-1 text-center">Editar Registros</h1>
<br>
<div class="container mt-5 col-md-6">
    <div>
    

    @if($errors->any())
        @foreach($errors->all() as $error)
        <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
            <strong> Formulario Incompleto!</strong>{{$error}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endforeach
    @endif

    <div class="card-header text-center text-primary">
            Correcciones de datos <i class="bi bi wechat"></i>
        </div>

    <div class="card-body">
        <form method="post" action="{{ route('formulario.update', $formularioid->idUsuario)}}">
            @csrf 
            {!! method_field('PUT')!!}
            <div class="mb-3">
                <label  class= "form label" name="labelUsuario">Nombre de Usuario: </label>
                <input type="text" class="form-control" name="txtUsuario" value="{{ $formularioid->usuario }}">
                <p class="fw-bold text-danger">{{$errors->first('txtUsuario')}}</p>
            </div>

            <div class="mb-3">
                <label  class= "form label" name="labelComputadora">No. de Computadora: </label>
                <input type="text" class="form-control" name="txtComputadora" value="{{ $formularioid->computadora }}">
                <p class="fw-bold text-danger">{{$errors->first('txtComputadora')}}</p>
            </div>
            <div class="mb-3">
                <label  class= "form label" name="labelTiempo">Tiempo de estancia aqui: </label>
                <input type="text" class="form-control" name="txtTiempo" value="{{ $formularioid->tiempo }}">
                <p class="fw-bold text-danger">{{$errors->first('txtTiempo')}}</p>
            </div>
            <div class="mb-3">
                <label  class= "form label" name="labelFecha">Fecha: </label>
                <input type="text" class="form-control" name="txtFecha" value="{{ $formularioid->fecha }}">
                <p class="fw-bold text-danger">{{$errors->first('txtFecha')}}</p>
            </div>
        </div>
        <div>
            <button type="sumit" class= "btn btn-info" name="btnActualizar">Actualizar</button>
            <form> 
        </div>
    </div>
</div>

@stop