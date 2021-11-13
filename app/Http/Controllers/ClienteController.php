<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BoletoController;
use App\Models\User as Usuario;
use Illuminate\Http\Request;
use Session;

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

    public function formularioCompraReservaView()
    {
        return view('cliente.formularioCompraReserva');
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

    // funcion que determina si el usuario compra o reserva el boleto
    public function comprarReservarBoleto(Request $request)
    {
        Session::put('claseBoleto', $request->claseBoleto);
        Session::put('tipoBoleto', $request->tipoBoleto);
        Session::put('tipoFormulario', $request->tipoFormulario);

        Session::put('nroVuelo', $request->nroVuelo);
        Session::put('origenVuelo', $request->origenVuelo);
        Session::put('destinoVuelo', $request->destinoVuelo);
        Session::put('fechaVuelo', $request->fechaVuelo);
        Session::put('horaVuelo', $request->horaVuelo);

        Session::put('cantAdultos', $request->cantAdultos);
        Session::put('cantMenores', $request->cantMenores);
        Session::put('cantBebes', $request->cantBebes);
        Session::put('tarifaAdultos', $request->tarifaAdultos);
        Session::put('tarifaMenores', $request->tarifaMenores);
        Session::put('tarifaBebes', $request->tarifaBebes);

        Session::put('total', $request->tarifaTotal);

        if ($request->tipoFormulario == "compra") {
            // return redirect('/formulario');
            return redirect('/formulario');
        }
        if ($request->tipoFormulario == "reserva") {
            return redirect('/formulario');
            // return $request;
        }
    }

    public function comprarBoleto(Request $request)
    {
        return $request;
    }

    public function cancelarCompra()
    {
    }

    public function reservarBoleto(Request $request)
    {
        $gestionarBoleto = new BoletoController();
        for ($i = 1; $i <= $request->cantPasajeros; $i++) {
            $gestionarBoleto->cambiarEstadoBoleto($request,1,'reservado');
        }
        // return $gestionarBoleto->cambiarEstadoBoleto($request, 1, 'reservado');
        // return $request->{"nombrePasajero".$i};
    }

    public function cancelarReserva()
    {
    }

    public function setPasswordAttribute($password)
    {
        return $this->attributes['password'] = bcrypt($password);
    }
}
