<?php 
    use Illuminate\Support\Str;
?>
@extends('layouts.panel')

@section('content')

    <div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Respondiendo consulta</h3>
        </div>
        <div class="col text-right">
            <a href="{{route('rrespuestas.view')}}" class="btn btn-sm btn-success">Regresar </a>
            <i class="fa fa-arrow-circle-left"></i>
        </div>
        </div>
    </div>

    <div class="card-body ">
        {{-- LISTAR ERRORES --}}
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    <i class="fas fa-exclamation-triangle"></i>  
                    <strong>Por favor!! </strong>{{$error}}  
                </div>                 
            @endforeach             
        @endif
        {{-- FORMULARIO --}}
        <form action="{{route('rrespuesta.sendData',$id_consulta)}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="respuesta">Respuesta:</label>
                <textarea name="respuesta" class="form-control" rows="3" placeholder="Ingrese su respuesta" >{{old('respuesta')}}</textarea>
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Responder</button>
        </form>

    </div>
    </div>
        
@endsection
