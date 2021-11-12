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

    // FUNCIONES DEL SISTEMA
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

        // return auth()->attempt(request(['usuario','password']));
    }

    public function cerrarSesion()
    {
        auth()->logout();
        return redirect()->to('/');
    }

    // REGISTRAR USUARIO
    public function altaUsuario(Request $request)
    {
        if ($request->tipoUsuario == "empleado") {
            if (!ctype_alpha($request->apellido) | !ctype_alpha($request->nombre)) {
                return back()->withErrors([
                    'errorNombre' => 'Ingrese un nombre valido',
                    'errorApellido' => 'Ingrese un apellido valido',
                ]);
            }
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
        $usuario->save();

        // si es cliente
        if ($usuario->tipoUsuario == "cliente") {
            $cliente = new Cliente();
            $cliente->idUsuario = $usuario->idUsuario;
            $cliente->save();

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
            // auth()->login($empleado);

            return redirect()->to('/gestion/administrarEmpleados');
        }
    }
}
