@extends('layouts.panel')

@section('content')

        <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Empleados</h3>
            </div>
            <div class="col text-right">
                <a href="{{route('empleado.create')}}" class="btn btn-sm btn-primary">Nuevo empleado</a>
            </div>
            </div>
        </div>
        <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                <th scope="col">Nombre</th>
                <th scope="col">DNI</th>
                <th scope="col" width="50px">Correo</th>
                <th scope="col">Celular</th>
                <th scope="col">Direccion</th>
                <th scope="col">Modificar</th>
                <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empleados as $empleado)
                <tr>
                    <th scope="row">
                        {{$empleado->name}}
                    </th>
                    <td>
                        {{$empleado->dni}}
                    </td>
                    <td>
                        {{$empleado->email}}
                    </td>
                    <td>
                        {{$empleado->celular}}
                    </td>
                    <td>
                        {{$empleado->direccion}}
                    </td>
                    <td>
                        <form action="{{route('empleado.editar', $empleado->_id)}}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-warning">Modificar</button>                   
                        </form>
                    </td>
                    <td>
                        <form action="{{route('empleado.delete', $empleado->_id)}}" method="post">
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
