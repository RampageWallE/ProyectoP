@extends('layouts.panel')

@section('content')

    <div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Nuevo Cliente</h3>
        </div>
        <div class="col text-right">
            <a href="{{route('clientes.view')}}" class="btn btn-sm btn-success">Regresar </a>
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
        <form action="{{route('cliente.sendData')}}" method="POST">
            @method('POST')
            @csrf
            <div class="form-group">
                <label for="name">Nombre y apellidos del cliente</label>
                <input type="text" name="name" class="form-control" placeholder="Ingrese los nombres y apellidos del cliente" value="{{old('name')}}">
            </div>
            <div class="form-group ">
                <label for="dno">DNI del cliente</label>
                <input type="text" name="dni" class="form-control" placeholder="Ingrese el DNI del cliente" value="{{old('dni')}}">
            </div>
            <div class="form-group">
                <label for="email">Email del cliente</label>
                <input type="text" name="email" class="form-control" placeholder="Ingrese el e-mail del cliente" value="{{old('email')}}" >
            </div>
            <div class="form-group">
                <label for="celular">Celular del cliente</label>
                <input type="text" name="celular" class="form-control" placeholder="Ingrese el numero de celular del cliente" value="{{old('celular')}}">
            </div>
            <div class="form-group">
                <label for="direccion">Direccion del cliente</label>
                <input type="text" name="direccion" class="form-control" placeholder="Ingrese la direccion del cliente" value="{{old('direccion')}}">
            </div>
                <button type="submit" class="btn btn-sm btn-primary">Crear nuevo cliente</button>
        </form>

    </div>
    </div>
        
@endsection
