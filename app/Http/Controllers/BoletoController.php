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
        $boleto = boleto::where('estadoBoleto', '=', "activo")
            ->where('nroVuelo', $request->nroVuelo)
            ->where('claseBoleto', $request->claseBoleto)
            ->first();

        $boleto->codCliente = $request->codCliente;
        $boleto->apellidoPasajero = $request->{"apellidoPasajero" . $i};
        $boleto->nombrePasajero = $request->{"nombrePasajero" . $i};
        $boleto->documentoPasajero = $request->{"documentoPasajero" . $i};
        $boleto->estadoBoleto = $estadoBoleto;
        $boleto->tipoBoleto = $request->tipoBoleto;

        // reseto
        // $boleto->codCliente = null;
        // $boleto->apellidoPasajero = null;
        // $boleto->nombrePasajero = null;
        // $boleto->documentoPasajero = null;

        $boleto->save();

        return $boleto;
    }

    public function cambiarPasajeros()
    {
    }

    public function notificarClienteNuevoVuelo()
    {
    }

    public function notificarClienteModificacionVuelo()
    {
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
