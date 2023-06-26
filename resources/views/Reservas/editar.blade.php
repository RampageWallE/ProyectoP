@extends('layouts.panel')

@section('content')

    <div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Editar reserva en {{$reserva->restaurantes->nombre}}</h3>
        </div>
        <div class="col text-right">
            <a href="{{route('reservas.view')}}" class="btn btn-sm btn-success">Regresar </a>
            <i class="fa fa-arrow-circle-left"></i>
        </div>
        </div>
    </div>

    <div class="card-body ">
        {{-- MUESTRA DE ERRORES  --}}
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    <i class="fas fa-exclamation-triangle"></i>  
                    <strong>Por favor!! </strong>{{$error}}  
                </div>                 
            @endforeach             
        @endif
        {{-- FORMULARIO --}}
        <form action="{{route('reserva.update',$reserva->_id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="fecha_reserva">Fecha de reserva</label>
                <input type="date" name="fecha_reserva" class="form-control" value="{{old('fecha_reserva',$reserva->fecha_reserva)}}">
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad de personas</label>
                <input type="text" name="cantidad" class="form-control" placeholder="Ingrese el e-mail del reserva" value="{{old('cantidad',$reserva->cantidad)}}" >
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Guardar cambios</button>
        </form>

    </div>
    </div>
        
@endsection
