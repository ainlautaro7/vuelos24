<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BoletoController;
use App\Models\User as Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function perfilView(){
        $gestionarBoleto = new BoletoController();
        $codCliente = $this->codigoCliente(auth()->user()->id);
        $boletos = $gestionarBoleto->buscarBoletoPasajero(0, $codCliente);

        Session::put('boletos', $boletos);

        return view('cliente.perfil', compact('boletos'));
        return $boletos;
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

        $gestionarBoleto = new BoletoController();

        // iteriacion que registra los boletos comprados
        for ($i = 1; $i <= $request->cantPasajeros; $i++) {
            $gestionarBoleto->cambiarEstadoBoleto($request, $i, 'comprado');
            
        }

        return redirect('/perfil');
        // return $request;
    }

    public function reservarBoleto(Request $request)
    {   
        $gestionarBoleto = new BoletoController();
        Session::put('cantPasajeros', $request->cantPasajeros);

        // iteriacion que registra los boletos reservados
        for ($i = 1; $i <= $request->cantPasajeros; $i++) {
            $gestionarBoleto->cambiarEstadoBoleto($request, $i, 'reservado');
        }

        if ($request->tipoTransaccion == "compra") {
            return view('cliente.formularioPago', compact('request'));
        }

        return redirect('/perfil');
        // return $request;
    }

    public function cancelarReserva()
    {
    }

    public function cancelarCompra()
    {
    }

    public function codigoCliente($idUsuario){
        return DB::table('cliente')->where('idUsuario', $idUsuario)->value('codCliente');
    }

    public function setPasswordAttribute($password)
    {
        return $this->attributes['password'] = bcrypt($password);
    }
}
