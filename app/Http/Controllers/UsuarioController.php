<?php

namespace App\Http\Controllers;

use App\Models\User as Usuario;
use App\Models\Cliente;
use App\Models\Empleado;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    // FUNCIONES DE LAS VISTAS
    public function loginView()
    {
        return view('login');
    }

    // LOGEARSE
    public function login()
    {

        if (auth()->attempt(request(['usuario', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'El usuario o password son incorrectos, intente de nuevo',
            ]);
        }
        

        if (auth()->user()->tipoUsuario == "cliente") {
            return redirect()->to('/');
        } elseif (auth()->user()->tipoUsuario == "empleado") {
            return redirect()->to('/gestion');
        }
    }

    // REGISTRAR USUARIO
    public function altaUsuario(Request $request)
    {
        $errores = \Validator::make($request->all(), [
            'nombre'    => 'required|string',
            'apellido'    => 'required|string',
            'nroDocumento'    => 'required|numeric|unique:usuario',
            'fechaNacimiento'    => 'required|date',
            'email'    => 'required|email|unique:usuario',
            'telefono'    => 'required|string|min:7|max:11',
            'usuario'    => 'required|string|unique:usuario',
            'password'    => 'required',
        ]);

        if ($errores->fails()) {
            return redirect()->back()->withInput()->withErrors($errores->errors());
        }

        $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->nroDocumento = $request->nroDocumento;
        $usuario->fechaNacimiento = $request->fechaNacimiento;
        $usuario->email = $request->email;
        $usuario->telefono = $request->telefono;
        $usuario->usuario = $request->usuario;
        $usuario->password = bcrypt($request->password);
        $usuario->tipoUsuario = $request->tipoUsuario;

        // se guarda el usuario en la bd
        $usuario->save();

        // si es cliente
        if ($usuario->tipoUsuario == "cliente") {
            $cliente = new Cliente();
            $cliente->idUsuario = $usuario->idUsuario;

            // se guarda el cliente en la bd
            $cliente->save();

            $cliente->codCliente;
            $cliente->nombre = $usuario->nombre;
            $cliente->apellido = $usuario->apellido;
            $cliente->nroDocumento = $usuario->nroDocumento;
            $cliente->fechaNacimiento = $usuario->fechaNacimiento;
            $cliente->email = $usuario->email;
            $cliente->telefono = $usuario->telefono;
            $cliente->usuario = $usuario->usuario;
            $cliente->password = $usuario->password;
            $cliente->tipoUsuario = $usuario->tipoUsuario;

            // // autorizacion
            auth()->login($cliente);

            return redirect()->to('/login');
            // return $cliente;

            // si es empleado
        } else if ($usuario->tipoUsuario == "empleado") {
            $empleado = new empleado();
            $empleado->idUsuario = $usuario->idUsuario;

            // se guarda el empleado en la bd
            $empleado->save();

            $empleado->nombre = $usuario->nombre;
            $empleado->apellido = $usuario->apellido;
            $empleado->nroDocumento = $usuario->nroDocumento;
            $empleado->fechaNacimiento = $usuario->fechaNacimiento;
            $empleado->email = $usuario->email;
            $empleado->telefono = $usuario->telefono;
            $empleado->usuario = $usuario->usuario;
            $empleado->password = $usuario->password;
            $empleado->tipoUsuario = $usuario->tipoUsuario;

            // autorizacion
            auth()->login($empleado);

            return redirect()->to('/gestion/administrarEmpleados');
        }
    }

    // Cerrar la sesion
    public function cerrarSesion()
    {
        auth()->logout();
        return redirect()->to('/');
    }
}
