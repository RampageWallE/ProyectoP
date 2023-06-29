<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use App\Models\Restaurante;

use Illuminate\Http\Request;

class ReservaController extends Controller{

    public function __construct()
    {
       $this->middleware(['auth','cliente']);
        
    }

    public function index()
    {
        $reservas=Reserva::where('id_cliente', auth()->user()->id)->get();
        // $reservas= Reserva::all();
        return view('Reservas.index',compact('reservas'));
        
    }

    public function create($id_restaurante)
    {
        $restaurante = Restaurante::where('_id',$id_restaurante)->first();
        return view('Reservas.create',compact('restaurante'));
    }

    public function insert(Request $request,$id_restaurante)
    {
        $rules= [
            'cantidad'=>'required|max:2',
            'fecha_reserva' => 'required'
        ];
        $messages=[
            'cantidad.required'=>'La cantidad de personas en la reservacion es obligatoria',
            'cantidad.max'=>'Debe de ingresar una cantidad de personas menor a 100 xd',
            'fecha_reserva.required'=>'La fecha de reserva esbligatoria'
        ];

        $this->validate($request, $rules, $messages);
        
        $reserva = new Reserva();
        $reserva->id_cliente=auth()->user()->id;
        $reserva->id_restaurante=$id_restaurante;
        $reserva->cantidad = $request->cantidad;
        $reserva->fecha_reserva = $request->fecha_reserva;

        $reserva->save();
        return redirect(Route('reservas.view'));
    }

    public function editar($id)
    {
        $reserva = Reserva::where('_id',$id)->first();
        return view('Reservas.editar',compact('reserva'));
    }

    public function update(Request $request, $id)
    {
        $rules= [
            'cantidad'=>'required|max:2',
            'fecha_reserva' => 'required'
        ];
        $messages=[
            'cantidad.required'=>'La cantidad de personas en la reservacion es obligatoria',
            'cantidad.max'=>'Debe de ingresar una cantidad de personas menor a 100 xd',
            'fecha_reserva.required'=>'La fecha de reserva esbligatoria'
        ];

        $this->validate($request, $rules, $messages);

        $reserva = Reserva::where('_id', $id)->first();
        
        $reserva->fecha_reserva = $request->fecha_reserva;
        $reserva->cantidad = $request->cantidad;
        $reserva->save();

        return redirect(route('reservas.view'));
    }

    public function destroy($id)
    {
        Reserva::destroy($id);
        return redirect(route('reservas.view'));
    }

}