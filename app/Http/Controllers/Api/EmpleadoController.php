<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContratoEmpleado;
use App\Models\User;
use Illuminate\Http\Request;


class EmpleadoController extends Controller
{
    public function __construct()
    {
       $this->middleware(['auth','admin']);
        
    }

    public function index()
    {
        $empleados=User::empleados()->paginate(10);
        
        return view('Empleados.index',compact('empleados'));
        //
    }

    public function create()
    {
        return view('Empleados.create');
    }

    public function insert(Request $request)
    {
        $rules= [
            'name' => 'required|min:5',
            'dni'=>'required|min:8',
            'email' => 'required|email|distinc',
            'celular' =>'required|min:9',
            'direccion'=> 'required|min:10',
        ];
        $messages=[
            'name.required'=>'El nombre es obligatorio',
            'name.min'=>'El nombre debe de tener mas de 5 letras',
            'dni.required'=>'La descripcion es obligatorio',
            'dni.min'=>'El dni debe de tener 8 caracteres',
            'email.required'=>'El correo es requerido',
            'email.email'=>'Ingresa un correo electronico valido',
            'celular.required'=>'El numero de celular es requerido',
            'celular.min'=>'El numero de celular debe de tener 9 caracteres',
            'direccion:required'=>'La direccion es obligatoria',
            'direccion.min'=>'La direccion debe de tener mas de 10 letras'
        ];

        $this->validate($request, $rules, $messages);

        User::create(
            $request->only('name','email','dni','celular','direccion')
            +[
                'role'=>'empleado',
                'password'=>bcrypt($request->input('password'))
            ]
        );
        
        // $empleado = new User();
        // $empleado->name = $request->name;
        // $empleado->dni = $request->dni;
        // $empleado->email = $request->email;
        // $empleado->celular = $request->celular;
        // $empleado->direccion = $request->direccion;
        // $empleado->save();

        return redirect(Route('empleados.view'));
    }

    public function editar($id)
    {
        $empleado = User::empleados()->findOrFail($id);
        return view('Empleados.editar',compact('empleado'));
    }

    public function update(Request $request, $id)
    {
        $rules= [
            'name' => 'required|min:5',
            'dni'=>'required|min:8',
            'email' => 'required|email',
            'celular' =>'required|min:9',
            'direccion'=> 'required|min:10',
        ];
        $messages=[
            'name.required'=>'El nombre es obligatorio',
            'name.min'=>'El nombre debe de tener mas de 5 letras',
            'dni.required'=>'El dni es obligatorio',
            'dni.min'=>'El dni debe de tener 8 caracteres',
            'email.required'=>'El correo es requerido',
            'email.email'=>'Ingresa un correo electronico valido',
            'celular.required'=>'El numero de celular es requerido',
            'celular.min'=>'El numero de celular debe de tener 9 caracteres',
            'direccion.required'=>'La direccion es obligatoria',
            'direccion.min'=>'La direccion debe de tener mas de 10 letras'
        ];

        $this->validate($request, $rules, $messages);

        $empleado = User::empleados()->findOrFail($id);

        $data = $request->only('name','email','dni','celular','direccion');
        $password = $request->input('password');

        if($password)
            $data["password"] = bcrypt($password);
        
        $empleado->fill($data);
        $empleado->save();     


        return redirect(route('empleados.view'));
    }

    public function destroy($id)
    {
        // User::destroy($id);
        
        $user = User::empleados()->findOrFail($id);
        $user -> delete();
        return redirect(route('empleados.view'));
    }

    public function index_contrato($id_empleado)
    {  
        $contratos = ContratoEmpleado::where('id_empleado',$id_empleado)->get();
        $nombre = User::where('_id',$id_empleado)->first()->name;
        return view('Empleados.index_contrato',compact('contratos','nombre','id_empleado'));
    }

    public function create_contrato($id_empleado)
    {
        return view('Empleados.create_contrato',compact('id_empleado'));

    }

    public function insert_contrato(Request $request,$id_empleado)
    {
        $rules= [
            'inicio_contrato' => 'required',
            'fin_contrato'=>'required'
        ];
        $messages=[
            'inicio_contraro.required'=>'La fecha de inicio del contrato es requerida',
            'fin_contrato.required'=>'La fecha final del contrato es requerida'  
        ];

        $this->validate($request, $rules, $messages);
        
        $contrato = new ContratoEmpleado();
        $contrato->id_administrador = auth()->user()->id;
        $contrato->id_empleado = $id_empleado;
        $contrato->inicio_contrato = $request->inicio_contrato;
        $contrato->fin_contrato = $request->fin_contrato;
        $contrato->save();

        return redirect(route('empleados.contrato.view',$id_empleado));
    }

    public function editar_contrato($id_contrato)
    {        
        $contrato = ContratoEmpleado::where('_id',$id_contrato)->first();
        return view('Empleados.editar_contrato',compact('contrato'));
    }

    public function update_contrato(Request $request,$id_contrato)
    {
        $rules= [
            'inicio_contrato' => 'required',
            'fin_contrato'=>'required'
        ];
        $messages=[
            'inicio_contrato.required'=>'La fecha de inicio del contrato es requerida',
            'fin_contrato.required'=>'La fecha final del contrato es requerida'  
        ];

        $this->validate($request, $rules, $messages);
        
        $contrato = ContratoEmpleado::where('_id',$id_contrato)->first();
        $contrato->id_administrador = auth()->user()->id;
        $contrato->inicio_contrato = $request->inicio_contrato;
        $contrato->fin_contrato = $request->fin_contrato;
        $contrato->save();

        return redirect(route('empleados.contrato.view',$contrato->id_empleado));
    }
}
