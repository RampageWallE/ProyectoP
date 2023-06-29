<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurante;
use Illuminate\Http\Request;

class RestauranteController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
        
    }

    public function index()
    {
        $restaurantes=Restaurante::all();
        // $restaurantes=Restaurante::restaurantes()->paginate(10);
        return view('Restaurantes.index',compact('restaurantes'));
        //
    }

    public function index2()
    {
        $restaurantes=Restaurante::all();
        
        return view('home',compact('restaurantes'));
        //
    }

    public function create()
    {
        return view('Restaurantes.create');
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
        
        $restaurante = new Restaurante();
        $restaurante->nombre = $request->nombre;
        $restaurante->descripcion = $request->descripcion;
        $restaurante->mesas = $request->mesas;
        $restaurante->direccion = $request->direccion;
        $restaurante->imagen_portada = $request->imagen_portada;

        $restaurante->save();
        return redirect(Route('restaurantes.view'));
    }

    public function editar($id)
    {
        $restaurante = Restaurante::where('_id',$id)->first();
        return view('Restaurantes.editar',compact('restaurante'));
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

        $restaurante = Restaurante::where('_id', $id)->first();
        
        $restaurante->nombre = $request->nombre;
        $restaurante->descripcion = $request->descripcion;
        $restaurante->mesas = $request->mesas;
        $restaurante->direccion = $request->direccion;
        $restaurante->imagen_portada = $request->imagen_portada;

        $restaurante->save();

        return redirect(route('restaurantes.view'));
    }

    public function destroy($id)
    {
        Restaurante::destroy($id);
        return redirect(route('restaurantes.view'));
    }
}
