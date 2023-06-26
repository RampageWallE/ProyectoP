<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Consulta;

use Illuminate\Http\Request;

class ConsultaController extends Controller{

    public function __construct()
    {
       $this->middleware('auth');
        
    }

    public function index()
    {
        $consultas=Consulta::where('id_cliente', auth()->user()->id)->get();
        // $consultas= Consulta::all();
        return view('Consultas.index',compact('consultas'));
        
    }

    public function create()
    {
        return view('Consultas.create');
    }

    public function insert(Request $request)
    {
        $rules= [
            'consulta'=>'required'
        ];
        $messages=[
            'consulta.required'=>'La consulta obiamente debe ser obligatoria ._.'
        ];

        $this->validate($request, $rules, $messages);
        
        $consulta = new Consulta();
        $consulta->consulta=$request->consulta;
        $consulta->id_cliente=auth()->user()->id;
        $consulta->estado='Sin respuesta';
        $consulta->id_empleado='Nadie por ahora';
        $consulta->respuesta='Ninguna';
        $consulta->save();

        return redirect(Route('consultas.view'));
    }

    public function editar($id)
    {
        $consulta = Consulta::where('_id',$id)->first();
        return view('Consultas.editar',compact('consulta'));
    }

    public function update(Request $request, $id)
    {
        $rules= [
            'consulta'=>'required'
        ];
        $messages=[
            'consulta.required'=>'La consulta obiamente debe ser obligatoria ._.'
        ];

        $this->validate($request, $rules, $messages);

        $consulta = Consulta::where('_id', $id)->first();
        
        $consulta->consulta = $request->consulta;
        $consulta->save();

        return redirect(route('consultas.view'));
    }

    public function destroy($id)
    {
        Consulta::destroy($id);
        return redirect(route('consultas.view'));
    }

}