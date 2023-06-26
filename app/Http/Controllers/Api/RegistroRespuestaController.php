<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Consulta;
// use App\Models\RegistroRespuesta;
use App\Models\RegistroRespuesta;


use Illuminate\Http\Request;

class RegistroRespuestaController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
        $consultas=Consulta::all();
        // $consultas= ResponderRegistroRespuesta::all();
        return view('RegistroRespuestas.index',compact('consultas'));
        
    }

    public function create($id_consulta)
    {
        return view('RegistroRespuestas.create',compact('id_consulta'));
    }

    public function insert(Request $request,$id_consulta)
    {
        $rules= [
            'respuesta'=>'required'
        ];
        $messages=[
            'respuesta.required'=>'La respuesta debe ser obligatoria'
        ];

        $this->validate($request, $rules, $messages);
        
        $rrespuesta = new RegistroRespuesta();
        $rrespuesta->id_consulta=$request->id_consulta;
        $rrespuesta->id_empleado=auth()->user()->id;
        $rrespuesta->consulta->estado='Respondido';
        $rrespuesta->consulta->id_empleado=auth()->user()->name;
        $rrespuesta->consulta->respuesta=$request->respuesta;
        $rrespuesta->consulta->save();
        $rrespuesta->save();

        return redirect(Route('rrespuestas.view'));
    }

    public function editar($id_consulta)
    {
        $rrespuesta = RegistroRespuesta::where('id_consulta',$id_consulta)->first();
        return view('RegistroRespuestas.editar',compact('rrespuesta'));
    }

    public function update(Request $request, $id_consulta)
    {
        $rules= [
            'respuesta'=>'required'
        ];
        $messages=[
            'respuesta.required'=>'La consulta obiamente debe ser obligatoria ._.'
        ];

        $this->validate($request, $rules, $messages);

        $rrespuesta = RegistroRespuesta::where('id_consulta',$id_consulta)->first();
        
        $rrespuesta->consulta->respuesta = $request->respuesta;
        $rrespuesta->consulta->save();
        $rrespuesta->save();

        return redirect(route('rrespuestas.view'));
    }

    public function destroy($id)
    {
        RegistroRespuesta::destroy($id);
        return redirect(route('consultas.view'));
    }
}
