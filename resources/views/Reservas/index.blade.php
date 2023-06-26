@extends('layouts.panel')

@section('content')

        <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Reservas del cliente <strong> {{auth()->user()->name}}</h3></strong>
            </div>
            <div class="col text-right">
                <a href="{{route('home')}}" class="btn btn-sm btn-primary">Nuevo reserva</a>
            </div>
            </div>
        </div>
        <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                <th scope="col">Id de reserva</th>
                <th scope="col">Fecha de creacion</th>
                <th scope="col">Nombre del restaurante</th>
                <th scope="col">Cantidad de personas</th>
                <th scope="col">Fecha de reserva</th>
                <th scope="col">Modificar</th>
                <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservas as $reserva)
                <tr>
                    <th scope="row">
                        {{$reserva->_id}}
                    </th>
                    <td>
                        {{$reserva->created_at}}
                    </td>
                    <td>
                        {{$reserva->restaurantes->nombre}}
                    </td>
                    <td>
                        {{$reserva->cantidad}}
                    </td>
                    <td>
                        {{$reserva->fecha_reserva}}
                    </td>
                    <td>
                        <form action="{{route('reserva.editar', $reserva->_id)}}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-warning">Modificar</button>                   
                        </form>
                    </td>
                    <td>
                        <form action="{{route('reserva.delete', $reserva->_id)}}" method="post">
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
        {{-- <div class="card-body">{{$reservas->links()}}</div> --}}
        </div>
        
@endsection
