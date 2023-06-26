@extends('layouts.panel')

@section('content')

        <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Responder de consultas</h3>
            </div>
            {{-- <div class="col text-right">
                <a href="{{route('consulta.create')}}" class="btn btn-sm btn-primary">Nuevo consulta</a>
            </div> --}}
            </div>
        </div>
        <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                <th scope="col">Id de consulta</th>
                <th scope="col">Consulta</th>
                <th scope="col" width="50px">Estado</th>
                <th scope="col">Quien respondio?</th>
                <th scope="col">Respuesta</th>
                <th scope="col">Modificar</th>
                <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consultas as $consulta)
                <tr>
                    <th scope="row">
                        {{$consulta->_id}}
                    </th>
                    <td>
                        {{$consulta->consulta}}
                    </td>
                    <td>
                        {{$consulta->estado}}
                    </td>
                    <td>
                        {{$consulta->id_empleado}}
                    </td>
                    <td>
                        {{$consulta->respuesta}}
                    </td>
                    <td>
                        <form action="{{route('rrespuesta.create', $consulta->_id)}}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-warning">Responder</button>                   
                        </form>
                    </td>
                    <td>
                        <form action="{{route('rrespuesta.editar', $consulta->_id)}}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Modificar <br> Respuesta</button>                   
                        </form>
                    </td>
                    </tr>
                    
                @endforeach
            </tbody>
            </table>
        </div>
        {{-- <div class="card-body">{{$consultas->links()}}</div> --}}
        </div>
        
@endsection
