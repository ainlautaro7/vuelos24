<?php

namespace App\Http\Controllers;

use App\Models\boleto;
use Illuminate\Support\Facades\DB;

class BoletoController extends Controller
{

    // FUNCIONES PARA EL SISTEMA
    public function listarBoletosDisponibles()
    {
    }

    public function crearBoleto($nroVuelo, $plazasPrimera, $tarifaPrimera, $plazasBusiness, $tarifaBusiness, $plazasTurista, $tarifaTurista)
    {
        $boletoNro = 1;

        // bucle que genera los boletos de primera clase
        for ($i = 1; $i <= $plazasPrimera; $i++) {
            $boleto = new boleto();
            $boleto->nroVuelo = $nroVuelo;
            $boleto->claseBoleto = "primera";
            $boleto->tarifaBoleto = $tarifaPrimera;
            $boleto->estadoBoleto = "activo";
            $boleto->nroBoleto = $boletoNro;
            $boleto->save();
            $boletoNro++;
        }

        // bucle que genera los boletos de clase business
        for ($i = 1; $i <= $plazasBusiness; $i++) {
            $boleto = new boleto();
            $boleto->nroVuelo = $nroVuelo;
            $boleto->claseBoleto = "business";
            $boleto->tarifaBoleto = $tarifaBusiness;
            $boleto->estadoBoleto = "activo";
            $boleto->nroBoleto = $boletoNro;
            $boleto->save();
            $boletoNro++;
        }

        // bucle que genera los boletos de clase turista
        for ($i = 1; $i <= $plazasTurista; $i++) {
            $boleto = new boleto();
            $boleto->nroVuelo = $nroVuelo;
            $boleto->claseBoleto = "turista";
            $boleto->tarifaBoleto = $tarifaTurista;
            $boleto->estadoBoleto = "activo";
            $boleto->nroBoleto = $boletoNro;
            $boleto->save();
            $boletoNro++;
        }
    }

    public function cambiarEstadoBoleto($request, $i, $estadoBoleto)
    {
        $boleto = new boleto();

        // boleto esta para reservar
        if ($estadoBoleto == "reservado") {
            $boleto = boleto::where('nroVuelo', $request->nroVuelo)
                ->where('claseBoleto', $request->claseBoleto)
                ->where('estadoBoleto', "=", "activo")
                ->first();

            $boleto->codCliente = $request->codCliente;
            $boleto->apellidoPasajero = $request->{"apellidoPasajero" . $i};
            $boleto->nombrePasajero = $request->{"nombrePasajero" . $i};
            $boleto->documentoPasajero = $request->{"documentoPasajero" . $i};
            $boleto->estadoBoleto = $estadoBoleto;
            $boleto->tipoBoleto = "ida";

            // el boleto esta para comprar
        }

        if ($estadoBoleto == "comprado") {
            $documentoPasajero = $request->{"documentoPasajero" . $i};

            $boleto = boleto::where('nroVuelo', $request->nroVuelo)
                ->where('documentoPasajero', $documentoPasajero)
                ->where('claseBoleto', "=", $request->claseBoleto)
                ->where('estadoBoleto', "=", "reservado")
                ->first();
                
            $boleto->estadoBoleto = $estadoBoleto;
        }

        if ($estadoBoleto == "activo") {
            $boleto = boleto::where('nroVuelo', $request->nroVuelo)
                ->where('claseBoleto', $request->claseBoleto)
                ->where('estadoBoleto', "=", "activo")
                ->first();

            $boleto->codCliente = null;
            $boleto->apellidoPasajero = null;
            $boleto->nombrePasajero = null;
            $boleto->documentoPasajero = null;
            $boleto->estadoBoleto = $estadoBoleto;
            $boleto->tipoBoleto = null;
        }

        if ($estadoBoleto == "resetear") {
            $boleto = boleto::where('nroVuelo', $request->nroVuelo)
                ->where('claseBoleto', $request->claseBoleto)
                ->where('documentoPasajero', $request->{"documentoPasajero" . $i})
                ->first();

            $boleto->codCliente = null;
            $boleto->apellidoPasajero = null;
            $boleto->nombrePasajero = null;
            $boleto->documentoPasajero = null;
            $boleto->estadoBoleto = $request->{"estadoBoleto" . $i};
            $boleto->tipoBoleto = null;
        }

        if ($estadoBoleto == "mover") {
            $boleto = boleto::where('nroVuelo', $request->nroVueloSeleccionado)
                ->where('claseBoleto', $request->claseBoleto)
                ->where('estadoBoleto', "=", "activo")
                ->first();

            $boleto->codCliente = $request->{"codCliente" . $i};
            $boleto->apellidoPasajero = $request->{"apellidoPasajero" . $i};
            $boleto->nombrePasajero = $request->{"nombrePasajero" . $i};
            $boleto->documentoPasajero = $request->{"documentoPasajero" . $i};
            $boleto->estadoBoleto = $request->{"estadoBoleto" . $i};
            $boleto->tipoBoleto = $request->{"tipoBoleto" . $i};
        }

        // reseto desde consola mysql
        // UPDATE boleto set codCliente = null, apellidoPasajero = null, nombrePasajero = null, documentoPasajero = null, tipoBoleto = null, estadoBoleto = "activo"

        $boleto->save();
    }

    public function notificarClienteNuevoVuelo()
    {
    }

    public function notificarClienteModificacionVuelo()
    {
    }

    public function buscarBoletoPasajero($nroVuelo, $codCliente)
    {
        if($nroVuelo != 0){
            return DB::select('SELECT * FROM boleto WHERE nroVuelo = "' . $nroVuelo . '" AND documentoPasajero = "' . $documentoPasajero . '"');
        }else{
            return DB::select('SELECT * FROM boletosCliente WHERE codCliente = "' . $codCliente . '" ORDER BY fechaTransaccion DESC');
        }
    }

    public function buscarBoletosVuelo($nroVuelo)
    {
        // SELECT nroVuelo, claseBoleto, tarifaBoleto, count(claseBoleto) as cantidad FROM boleto GROUP BY claseBoleto, nroVuelo ORDER BY nroVuelo, claseBoleto
        // | nroVuelo | claseBoleto | tarifaBoleto | cantidad |
        // |    1     |  business   |    100000    |    10    |
        // |    1     |  primera    |    80000     |    10    |
        // |    1     |  turista    |    50000     |    10    |
        // |    2     |  business   |    85000     |    5     |
        // |    2     |  primera    |    50000     |    5     |
        // |    2     |  turista    |    35000     |    15    |

        return DB::select('SELECT nroVuelo, claseBoleto, tarifaBoleto, count(claseBoleto) as cantidad FROM boleto WHERE nroVuelo = "' . $nroVuelo . '" GROUP BY claseBoleto, nroVuelo, tarifaBoleto ORDER BY nroVuelo, claseBoleto');
    }
}