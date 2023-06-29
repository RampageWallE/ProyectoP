<?php 
    use Illuminate\Support\Str;
?>
@extends('layouts.panel')

@section('content')

    <div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Nuevo contrato</h3>
        </div>
        <div class="col text-right">
            <a href="{{route('empleados.contrato.view',$id_empleado)}}" class="btn btn-sm btn-success">Regresar </a>
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
        <form action="{{route('empleado.contrato.sendData',$id_empleado)}}" method="POST">
            @method('POST')
            @csrf
            <div class="form-group">
                <label for="inicio_contrato">Inicio del contrato</label>
                <input type="date" name="inicio_contrato" class="form-control" value="{{old('inicio_contrato')}}" >
            </div>
            <div class="form-group ">
                <label for="fin_contrato">Fin del contrato</label>
                <input type="date" name="fin_contrato" class="form-control" value="{{old('fin_contrato')}}">
            </div>
                    <button type="submit" class="btn btn-sm btn-primary">Registrar contrato</button>
        </form>

    </div>
    </div>
        
@endsection

