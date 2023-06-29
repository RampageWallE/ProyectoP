@extends('layouts.panel')

@section('content')

        <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Contratos del empleado {{$nombre}}</h3>
            </div>
            <div class="col text-right">
                <a href="{{route('empleado.contrato.create',$id_empleado)}}" class="btn btn-sm btn-primary">Nuevo contrato</a>
            </div>
            </div>
        </div>
        <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Contratador</th>
                <th scope="col" width="50px">Inicio de contrato</th>
                <th scope="col">Fin de contrato</th>
                <th scope="col">Modificar</th>
                <th scope="col">Eliminar Contrato</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contratos as $contrato)
                <tr>
                    <th scope="row">
                        {{$contrato->_id}}
                    </th>
                    <td>
                        {{$contrato->admin->name}}
                    </td>
                    <td>
                        {{$contrato->inicio_contrato}}
                    </td>
                    <td>
                        {{$contrato->fin_contrato}}
                    </td>
                    <td>
                        <form action="{{route('empleado.contrato.editar',$contrato->_id)}}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-warning">Modificar</button>                   
                        </form>
                    </td>
                    <td>
                        <form action="{{route('empleado.contrato.destroy',$contrato->_id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-warning">eliminar</button>                   
                        </form>
                    </td>
                    </tr>
                    
                @endforeach
            </tbody>
            </table>
        </div>
        {{-- <div class="card-body">{{$contratos->links()}}</div> --}}
        </div>
        
@endsection