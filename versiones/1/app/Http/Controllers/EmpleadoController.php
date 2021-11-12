<?php

namespace App\Http\Controllers;
use App\Models\User as Usuario;

class EmpleadoController extends Controller
{

    // FUNCIONES DE LAS VISTAS
    public function gestionView()
    {
        // verifico que el usuario que inicio sesion sea empleado
        if (auth()->user()->tipoUsuario == "empleado") {
            return view('Empleado.inicio');
        } else {
            return redirect('/');
        }
    }
    public function reportesView()
    {
        // verifico que el usuario que inicio sesion sea empleado
        if (auth()->user()->tipoUsuario == "empleado") {
            return view('Empleado.reportes');
        } else {
            return redirect('/');
        }
    }

    public function administrarEmpleadosView()
    {
        // verifico que el usuario que inicio sesion sea empleado
        if (auth()->user()->tipoUsuario !== "empleado") {
            return redirect('/');
        }

        $empleados = Usuario::select(
            "usuario.id",
            "usuario.nombre",
            "usuario.apellido",
            "usuario.nroDocumento",
            "usuario.fechaNacimiento",
            "usuario.email",
            "usuario.telefono",
            "usuario.usuario",
            "usuario.created_at",
            "empleado.codEmpleado as codEmpleado"
        )
            ->join("empleado", "usuario.id", "=", "empleado.idUsuario")
            ->get();

        return view('Empleado.AdministrarEmpleados', compact('empleados'));
    }

    public function altaEmpleadoView()
    {
        if (auth()->user()->tipoUsuario !== "empleado") {
            return redirect('/');
        }
        return view('Empleado.AdministrarEmpleados.altaEmpleado');
    }
}
