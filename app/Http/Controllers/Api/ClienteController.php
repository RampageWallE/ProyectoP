<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
        
    }

    public function index()
    {
        $clientes=User::clientes()->get();
        
        return view('Clientes.index',compact('clientes'));
        //
    }

    public function create()
    {
        return view('Clientes.create');
    }

    public function insert(Request $request)
    {
        $rules= [
            'nombre' => 'required|min:5',
            'descripcion'=>'required|min:15',
            'mesas' => 'required',
            'direccion' =>'required|min:10',
        ];
        $messages=[
            'nombre.required'=>'El nombre es obligatorio',
            'nombre.min'=>'El nombre debe de tener mas de 3 letras',
            'descripcion.required'=>'La descripcion es obligatorio',
            'descripcion.min'=>'La descrpcion debe de tener mas de 15 letras',
            'mesas.required'=>'El numero de mesas es requerido',
            'direccion.required'=>'La direccion es requerida',
            'direccion.min'=>'La direccion debe de tener mas de 10 letras'
        ];

        $this->validate($request, $rules, $messages);
        
        $empleado = new User();
        $empleado->nombre = $request->nombre;
        $empleado->descripcion = $request->descripcion;
        $empleado->mesas = $request->mesas;
        $empleado->direccion = $request->direccion;
        $empleado->imagen_portada = $request->imagen_portada;

        $empleado->save();
        return redirect(Route('empleados.view'));
    }

    public function editar($id)
    {
        $empleado = User::where('_id',$id)->first();
        return view('Users.editar',compact('empleado'));
    }

    public function update(Request $request, $id)
    {
        $rules= [
            'nombre' => 'required|min:5',
            'descripcion'=>'required|min:15',
            'mesas' => 'required',
            'direccion' =>'required|min:10',
        ];
        $messages=[
            'nombre.required'=>'El nombre es obligatorio',
            'nombre.min'=>'El nombre debe de tener mas de 3 letras',
            'descripcion.required'=>'La descripcion es obligatorio',
            'descripcion.min'=>'La descrpcion debe de tener mas de 15 letras',
            'mesas.required'=>'El numero de mesas es requerido',
            'direccion.required'=>'La direccion es requerida',
            'direccion.min'=>'La direccion debe de tener mas de 10 letras'
        ];

        $this->validate($request, $rules, $messages);

        $empleado = User::where('_id', $id)->first();
        
        $empleado->nombre = $request->nombre;
        $empleado->descripcion = $request->descripcion;
        $empleado->mesas = $request->mesas;
        $empleado->direccion = $request->direccion;
        $empleado->imagen_portada = $request->imagen_portada;

        $empleado->save();

        return redirect(route('empleados.view'));
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect(route('empleados.view'));
    }
}
