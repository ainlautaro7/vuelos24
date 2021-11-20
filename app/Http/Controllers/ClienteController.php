<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BoletoController;
use App\Models\User as Usuario;
use Illuminate\Http\Request;
use Session;

use MercadoPago\SDK as MercadoPago;
use MercadoPago\Payment;

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
        MercadoPago::setAccessToken(config('services.mercadopago.token'));

        // $gestionarBoleto = new BoletoController();
        // for ($i = 1; $i <= $request->cantPasajeros; $i++) {
        //     // $gestionarBoleto->cambiarEstadoBoleto($request, $i, 'comprado');
        // }

        // return $request->{"apellidoPasajero" . 1};
        // require base_path('/vendor/autoload.php');
        // $payment = new Payment();
        // $payment->transaction_amount = $_GET['transactionAmount'];
        // $payment->token = $_GET['token'];
        // $payment->description = $_GET['description'];
        // $payment->installments = $_GET['installments'];
        // $payment->payment_method_id = $_GET['paymentMethodId'];
        // $payment->issuer_id = $_GET['issuer'];

        // $payer = new Payer();
        // $payer->email = $_GET['email'];
        // $payer->identification = array(
        //     "type" => $_GET['docType'],
        //     "number" => $_GET['docNumber']
        // );
        // $payment->payer = $payer;

        // $payment->save();

        // $response = array(
        //     'status' => $payment->status,
        //     'status_detail' => $payment->status_detail,
        //     'id' => $payment->id
        // );
        // echo json_encode($response);

        // return $request;
        return $request->all();
    }

    public function reservarBoleto(Request $request)
    {
        $gestionarBoleto = new BoletoController();
        for ($i = 1; $i <= $request->cantPasajeros; $i++) {
            $gestionarBoleto->cambiarEstadoBoleto($request, $i, 'reservado');
        }
    }

    public function cancelarReserva()
    {
    }

    public function cancelarCompra()
    {
    }

    public function setPasswordAttribute($password)
    {
        return $this->attributes['password'] = bcrypt($password);
    }
}
