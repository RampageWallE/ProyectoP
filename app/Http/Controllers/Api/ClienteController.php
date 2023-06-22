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
        $clientes=User::clientes()->paginate(10);
        
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
            'name' => 'required|min:5',
            'dni'=>'required|min:8',
            'email' => 'required|email',
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
                'role'=>'cliente',
                'password'=>bcrypt($request->input('password'))
            ]
        );
        
        // $cliente = new User();
        // $cliente->name = $request->name;
        // $cliente->dni = $request->dni;
        // $cliente->email = $request->email;
        // $cliente->celular = $request->celular;
        // $cliente->direccion = $request->direccion;
        // $cliente->save();

        return redirect(Route('clientes.view'));
    }

    public function editar($id)
    {
        $cliente = User::clientes()->findOrFail($id);
        return view('Clientes.editar',compact('cliente'));
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

        $cliente = User::clientes()->findOrFail($id);

        $data = $request->only('name','email','dni','celular','direccion');
        $password = $request->input('password');

        if($password)
            $data["password"] = bcrypt($password);
        
        $cliente->fill($data);
        $cliente->save();     


        return redirect(route('clientes.view'));
    }

    public function destroy($id)
    {
        // User::destroy($id);
        
        $user = User::clientes()->findOrFail($id);
        $user -> delete();
        return redirect(route('clientes.view'));
    }
}
