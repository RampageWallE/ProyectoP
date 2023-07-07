<?php 
    use Illuminate\Support\Str;
?>
@extends('layouts.panel')

@section('content')

    <div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Reserva en {{$restaurante->nombre}}</h3>
        </div>
        <div class="col text-right">
            <a href="/home" class="btn btn-sm btn-success">Regresar </a>
            <i class="fa fa-arrow-circle-left"></i>
        </div>
        </div>
    </div>

    <div class="card-body ">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    <i class="fas fa-exclamation-triangle"></i>  
                    <strong>Por favor!! </strong>{{$error}}  
                </div>                 
            @endforeach             
        @endif
        <form action="{{route('reserva.sendData',$restaurante->_id)}}" method="POST">
            @method('POST')
            @csrf
            <div class="form-group">
                <label for="fecha_reserva">Fecha de reserva</label>
                <input type="datetime-local" name="fecha_reserva" class="form-control" value="{{old('fecha_reserva')}}">
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad de personas</label>
                <input type="number" max = "6" name="cantidad" class="form-control" placeholder="Ingrese la cantidad de personas" value="{{old('cantidad')}}" >
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Crear reserva</button>
        </form>

    </div>
    </div>
        
@endsection
