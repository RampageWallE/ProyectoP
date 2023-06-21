@extends('layouts.panel')

@section('content')

        <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Restaurantes</h3>
            </div>
            <div class="col text-right">
                <a href="{{route('restaurante.create')}}" class="btn btn-sm btn-primary">Nuevo restaurante</a>
            </div>
            </div>
        </div>
        <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                <th scope="col">Nombre</th>
                <th scope="col" width="50px">Descripcion</th>
                <th scope="col">Cantidad de mesas</th>
                <th scope="col">Direccion</th>
                <th scope="col">imagen</th>
                <th scope="col">Modificar</th>
                <th scope="col">Eleminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($restaurantes as $restaurante)
                <tr>
                    <th scope="row">
                        {{$restaurante->nombre}}
                    </th>
                    <td>
                        {{$restaurante->descripcion}}
                    </td>
                    <td>
                        {{$restaurante->mesas}}
                    </td>
                    <td>
                        {{$restaurante->direccion}}
                    </td>
                    <td>
                        {{$restaurante->imagen_portada}}
                    </td>
                    <td>
                        <form action="{{route('restaurante.editar', $restaurante->_id)}}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-warning">Modificar</button>                   
                        </form>
                    </td>
                    <td>
                        <form action="{{route('restaurante.delete', $restaurante->_id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>                   
                        </form>
                    </td>
                    </tr>
                    
                @endforeach
            </tbody>
            </table>
        </div>
        </div>
        
@endsection
