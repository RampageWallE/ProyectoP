<?php 
    use Illuminate\Support\Str;
?>
@extends('layouts.panel')

@section('content')

    <div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Nuevo Cliente</h3>
        </div>
        <div class="col text-right">
            <a href="{{route('consultas.view')}}" class="btn btn-sm btn-success">Regresar </a>
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
        <form action="{{route('consulta.sendData')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="consulta">Consulta</label>
                <textarea name="consulta" class="form-control" rows="3" placeholder="Ingrese su consulta" >{{old('consulta')}}</textarea>
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Crear nuevo consulta</button>
        </form>

    </div>
    </div>
        
@endsection
