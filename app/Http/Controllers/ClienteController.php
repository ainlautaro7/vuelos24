<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Models\User as Usuario;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    // FUNCIONES DE LA VISTA
    public function inicioView()
    {
        return view('Cliente.inicio');
    }

    public function registrarseView()
    {
        return view('registrarse');
    }

    public function listarVuelosView()
    {
        return view('Cliente.listarVuelos');
    }

    // FUNCIONES DEL SISTEMA
    public function registroCliente(Request $request)
    {

        $usuario = new Usuario();

        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->nroDocumento = $request->nroDocumento;
        $usuario->fechaNacimiento = $request->fechaNacimiento;
        $usuario->email = $request->email;
        $usuario->telefono = $request->telefono;
        $usuario->usuario = $request->usuario;
        $usuario->password = $request->password;
        $usuario->tipoUsuario = $request->tipoUsuario;

        return $usuario;
    }

    public function mostrarInicio()
    {
    }

    public function setPasswordAttribute($password)
    {
        return $this->attributes['password'] = bcrypt($password);
    }
}
