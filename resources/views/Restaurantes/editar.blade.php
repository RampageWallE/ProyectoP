@extends('layouts.panel')

@section('content')

    <div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Modificar Restaurante</h3>
        </div>
        <div class="col text-right">
            <a href="{{route('restaurantes.view')}}" class="btn btn-sm btn-success">Regresar </a>
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
        <form action="{{route('restaurante.update',$restaurante->_id)}}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">Nombre del restaurante</label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre del restaurante" value="{{old('nombre',$restaurante->nombre)}}">
            </div>
            <div class="form-group ">
                <label for="name">Descripcion</label>
                <textarea name="descripcion" class="form-control" rows="3" placeholder="Ingrese la descripcion" >{{old('descripcion',$restaurante->descripcion)}}</textarea>
            </div>
            <div class="form-group">
                <label for="name">Cantidad de mesas</label>
                <input type="number" name="mesas" class="form-control" placeholder="Ingrese el numero de mesas" value="{{old('mesas',$restaurante->mesas)}}" >
            </div>
            <div class="form-group">
                <label for="name">Direccion</label>
                <input type="text" name="direccion" class="form-control" placeholder="Ingrese la direccion del local" value="{{old('direccion', $restaurante->direccion)}}">
            </div>
            <div class="form-group">
                <label for="name">Imagen</label>
                <input type="text" name="imagen_portada" class="form-control" placeholder="Ingrese la url de la imagen" value="{{old('imagen_portada',$restaurante->imagen_portada)}}">
            </div>
                <button type="submit" class="btn btn-sm btn-primary">Actualizar restaurante</button>
        </form>

    </div>
    </div>
        
@endsection
