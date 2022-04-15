<?php

namespace App\Http\Controllers;

use App\Models\serviciosVuelo;

class ServiciosVueloController extends Controller
{

    public function registrarServicioVuelo($nroVuelo, $servicio){
        $servicioVuelo = new serviciosVuelo();

        $servicioVuelo->nroVuelo = $nroVuelo;
        $servicioVuelo->idServicio = $servicio;
        $servicioVuelo->save();
    }

    public function buscarServiciosVuelo($nroVuelo){
        // return DB::table('serviciosVuelo')->where('nroVuelo', $nroVuelo)->get();

        return serviciosVuelo::select(
            "serviciosVuelo.nroVuelo",
            "serviciosVuelo.idServicio",
            "s.descripcion"
        )
            ->join("servicio as s", "serviciosVuelo.idServicio", "=", "s.idServicio")
            ->where("nroVuelo", $nroVuelo)
            ->get();
    }
}
