<?php

namespace App\Http\Controllers;

use App\Models\ciudad;
use App\Models\servicio;
use App\Models\vuelo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VueloController extends Controller
{

    // ---------------------------------------------------------------------------------------------------------------FUNCIONES PARA LA VISTA
    public function administrarVuelosView()
    {
        // verifico que el usuario que inicio sesion sea empleado
        if (auth()->user()->tipoUsuario !== "empleado") {
            return redirect('/');
        }
        $now = Carbon::now();

        $vuelos = vuelo::select(
            "vuelo.nroVuelo",
            "o.nombre as origen",
            "d.nombre as destino",
            "vuelo.fechaVuelo",
            "vuelo.horaVuelo",
            "vuelo.planVuelo",
            "vuelo.estadoVuelo",
            "vuelo.created_at"
        )
            ->join("ciudad as o", "vuelo.idCiudadOrigen", "=", "o.idCiudad")
            ->join("ciudad as d", "vuelo.idCiudadDestino", "=", "d.idCiudad")
            ->get();

        return view('Empleado.administrarVuelos', compact('vuelos', 'now'));
    }

    // VISTA ALTA VUELO
    public function altaVueloView()
    {
        if (auth()->user()->tipoUsuario !== "empleado") {
            return redirect('/');
        }

        $ciudades = ciudad::all();
        $servicios = servicio::all();

        return view('Empleado.AdministrarVuelos.altaVuelo', compact('ciudades', 'servicios'));
    }

    // VISTA REASIGNAR PASAJEROS
    public function reasignarPasajerosView($vuelo)
    {

        $vuelo = $this->buscarVuelo($vuelo);

        // verifico que el usuario que inicio sesion sea empleado
        if (auth()->user()->tipoUsuario !== "empleado") {
            return redirect('/');
        }

        return view('Empleado.AdministrarVuelos.reasignarPasajeros', compact('vuelo'));
        // return $vuelo;
    }

    // VISTA MODIFICAR VUELOS
    public function modificarVueloView($nroVuelo)
    {
        // verifico que el usuario que inicio sesion sea empleado
        if (auth()->user()->tipoUsuario !== "empleado") {
            return redirect('/');
        }

        // vuelo
        $vuelo = $this->buscarVuelo($nroVuelo);

        // servicios
        $servicios = new ServiciosVueloController();
        $servicios = $servicios->buscarServiciosVuelo($nroVuelo);

        // boletos
        $boletos = new BoletoController();
        $boletos = $boletos->buscarBoletosVuelo($nroVuelo);

        return view('Empleado.AdministrarVuelos.modificarVuelo', compact('vuelo', 'servicios', 'boletos'));
        // return $boletos;
    }

    // ---------------------------------------------------------------------------------------------------------------FUNCIONES PARA LOGICA Y CONSULTAS
    // el vuelo no puede darse de alta hasta la fecha que establecio
    public function altaVuelo(Request $request)
    {
        $vuelo = new vuelo();
        $servicios = servicio::all();
        $gestionarServicios = new ServiciosVueloController();
        $gestionarBoletos = new BoletoController();

        $vuelo->idCiudadOrigen = $request->origen;
        $vuelo->idCiudadDestino = $request->destino;
        $vuelo->fechaVuelo = $request->fechaVuelo;
        $vuelo->horaVuelo = $request->horaVuelo;
        $vuelo->planVuelo = "O" . $request->origen . "D" . $request->destino . "F" . $request->fechaVuelo . "H" . str_replace(':', '-', $vuelo->horaVuelo);
        $vuelo->estadoVuelo = "activo";
        $vuelo->save();

        // servicios
        foreach ($servicios as $servicio) {
            if ($request->has("servicio" . $servicio->idServicio)) {
                $gestionarServicios->registrarServicioVuelo($vuelo->nroVuelo, $servicio->idServicio);
            }
        }

        // Boletos
        $gestionarBoletos->crearBoleto(
            $vuelo->nroVuelo,
            $request->plazasPrimeraClase,
            $request->tarifaBoletoPrimera,
            $request->plazasBusinessClase,
            $request->tarifaBoletoBusiness,
            $request->plazasTuristaClase,
            $request->tarifaBoletoTurista
        );

        // Guardamos el plan de vuelo en el servidor
        $request->file('planVuelo')->storeAs(
            'planDeVuelo',
            $vuelo->planVuelo . '.pdf'
        );

        // verificar (problema con url al redireccionar)
        return redirect('/gestion/administrarVuelos')->with('registro', "Vuelo registrado con exito!");;
    }

    public function iniciarVuelo(Request $request)
    {
        DB::select('UPDATE vuelo SET estadoVuelo = "en vuelo" WHERE nroVuelo = "' . $request->nroVuelo . '"');
        return redirect('/gestion/administrarVuelos');
    }

    public function finalizarVuelo(Request $request)
    {
        DB::select('UPDATE vuelo SET estadoVuelo = "realizado" WHERE nroVuelo = "' . $request->nroVuelo . '"');
        return redirect('/gestion/administrarVuelos');
    }

    public function reasignarPasajeros(Request $request)
    {
        $gestionarBoleto = new BoletoController();
        for ($i = 1; $i <= $request->cantPasajerosTotal; $i++) {
            if ($request->{"documentoPasajero" . $i} == "") {
            } else {
                $gestionarBoleto->cambiarEstadoBoleto($request, $i, 'resetear');
                $gestionarBoleto->cambiarEstadoBoleto($request, $i, 'mover');
            }
        }
        $contador = $gestionarBoleto->contarNoActivos($request->nroVuelo);
        if ($contador == 0) {
            DB::select('UPDATE vuelo SET estadoVuelo = "suspendido" WHERE nroVuelo = "' . $request->nroVuelo . '"');
            return redirect('/gestion/administrarVuelos')->with('message', "El/los ultimo/s pasajero/s del vuelo Nro " . $request->nroVuelo . " fue/ron reasignado/s al vuelo Nro " . $request->nroVueloSeleccionado . " exitosamente, el vuelo Nro " . $request->nroVuelo . " ha sido suspendido");
        } else {
            //return redirect('/gestion/administrarVuelos')->with('message', "El/los pasajero/s seleccionado/s del vuelo Nro " . $request->nroVuelo . " fue/ron reasignado/s al vuelo Nro " . $request->nroVueloSeleccionado . " exitosamente!!");
            return redirect()->back()->with('message', "El/los pasajero/s seleccionado/s del vuelo Nro " . $request->nroVuelo . " fue/ron reasignado/s al vuelo Nro " . $request->nroVueloSeleccionado . " exitosamente!!");
        }
    }

    public function modificarVuelo(Request $request)
    {
        $nroVuelo = $request->nroVuelo;
        $fechaVuelo = $request->fechaVuelo;
        $horaVuelo = $request->horaVuelo;
        DB::select('UPDATE vuelo SET fechaVuelo = "' . $fechaVuelo . '", horaVuelo = "' . $horaVuelo . '" WHERE nroVuelo = "' . $nroVuelo . '"');
        return redirect('/gestion/administrarVuelos')->with('message', "Vuelo Nro " . $request->nroVuelo . " reprogramado con exito!");
        // return $request;
    }

    public function buscarVuelo($nroVuelo)
    {
        return vuelo::select(
            "vuelo.nroVuelo",
            "o.nombre as origen",
            "d.nombre as destino",
            "vuelo.fechaVuelo",
            "vuelo.horaVuelo",
            "vuelo.planVuelo",
            "vuelo.estadoVuelo",
            "vuelo.created_at"
        )
            ->join("ciudad as o", "vuelo.idCiudadOrigen", "=", "o.idCiudad")
            ->join("ciudad as d", "vuelo.idCiudadDestino", "=", "d.idCiudad")
            ->where("nroVuelo", $nroVuelo)
            ->get()->first();
    }

    // origen, detino, fechaIda, fechaVuelta, clase, cantAdultos, cantMenores, cantBebes
    public function buscarVuelos(Request $request)
    {
        $form = $request;
        $cantPasajeros = $request->cantAdultos + $request->cantMenores + $request->cantBebes;

        if ($request->claseBoleto == "todas") {
            $vuelos = vuelo::select(
                "nroVuelo",
                "origen",
                "origenIATA",
                "destino",
                "destinoIATA",
                "fechaVuelo",
                "horaVuelo",
                "planVuelo",
                "estadoVuelo",
                "claseBoleto",
                "cantBoletosDisponible",
                "tarifaBoleto"
            )
                ->from("vuelosDisponibles")
                ->where([
                    ['origen', $request->origen],
                    ['destino', $request->destino],
                    ['fechaVuelo', $request->fechaIda],
                    ['cantBoletosDisponible', '>=', $cantPasajeros]
                ])
                ->get();
        } else {
            $vuelos = vuelo::select(
                "nroVuelo",
                "origen",
                "origenIATA",
                "destino",
                "destinoIATA",
                "fechaVuelo",
                "horaVuelo",
                "planVuelo",
                "estadoVuelo",
                "claseBoleto",
                "cantBoletosDisponible",
                "tarifaBoleto"
            )
                ->from("vuelosDisponibles")
                ->where([
                    ['origen', $request->origen],
                    ['destino', $request->destino],
                    ['fechaVuelo', $request->fechaIda],
                    ['claseBoleto', $request->claseBoleto],
                    ['cantBoletosDisponible', '>=', $cantPasajeros]
                ])
                ->get();
        }

        return view('Cliente.inicio', compact('vuelos', 'form'));
        // return $vuelos;
    }

    // vuelos que pueden interesarte
    public static function vuelosInteresantes()
    {
        $vuelos = vuelo::select(
            "nroVuelo",
            "origen",
            "origenIATA",
            "destino",
            "destinoIATA",
            "fechaVuelo",
            "horaVuelo",
            "planVuelo",
            "estadoVuelo",
            "claseBoleto",
            "cantBoletosDisponible",
            "tarifaBoleto"
        )
            ->from("vuelosDisponibles")
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return $vuelos;
    }

    // metricas de un vuelo determinado
    public function reporteDestinosMasVisitados()
    {
        return DB::select('
        SELECT cd.nombre destino,

        IFNULL((SELECT count(cd1.nombre) destino
                FROM vuelo v1
                INNER JOIN ciudad cd1 ON v1.idCiudadDestino = cd1.idCiudad
                INNER JOIN boleto b ON v1.nroVuelo = b.nroVuelo
                WHERE v1.estadoVuelo = "realizado" AND estadoBoleto = "comprado" AND cd1.nombre = cd.nombre AND b.claseBoleto = "turista"
                GROUP BY cd1.nombre
                order by cd1.nombre),0) as cantBoletosTurista,
    
        IFNULL((SELECT count(cd1.nombre) destino
                FROM vuelo v1
                INNER JOIN ciudad cd1 ON v1.idCiudadDestino = cd1.idCiudad
                INNER JOIN boleto b ON v1.nroVuelo = b.nroVuelo
                WHERE v1.estadoVuelo = "realizado" AND estadoBoleto = "comprado" AND cd1.nombre = cd.nombre AND b.claseBoleto = "primera"
                GROUP BY cd1.nombre
                order by cd1.nombre),0) as cantBoletosPrimera,
                
        IFNULL((SELECT count(cd1.nombre) destino
                FROM vuelo v1
                INNER JOIN ciudad cd1 ON v1.idCiudadDestino = cd1.idCiudad
                INNER JOIN boleto b ON v1.nroVuelo = b.nroVuelo
                WHERE v1.estadoVuelo = "realizado" AND estadoBoleto = "comprado" AND cd1.nombre = cd.nombre AND b.claseBoleto = "business"
                GROUP BY cd1.nombre
                order by cd1.nombre),0) as cantBoletosBusiness,
                
            (SELECT count(cd1.nombre) destino
            FROM vuelo v1
            INNER JOIN ciudad cd1 ON v1.idCiudadDestino = cd1.idCiudad
            INNER JOIN boleto b ON v1.nroVuelo = b.nroVuelo
            WHERE v1.estadoVuelo = "realizado" AND estadoBoleto = "comprado" AND cd1.nombre = cd.nombre
            GROUP BY cd1.nombre
            order by cd1.nombre) as totalVendidos
            
        FROM vuelo v
        INNER JOIN ciudad co ON v.idCiudadOrigen = co.idCiudad
        INNER JOIN ciudad cd ON v.idCiudadDestino = cd.idCiudad
        INNER JOIN boleto b ON v.nroVuelo = b.nroVuelo
        WHERE v.estadoVuelo = "realizado"  AND estadoBoleto = "comprado"
        GROUP BY cd.nombre
        ORDER BY totalVendidos DESC, cd.nombre
        ');
    }

    public function reporteCantVuelosRegistrados()
    {
        return DB::select('
            SELECT v.nroVuelo,
                    cd.nombre origen,
                    co.nombre destino,
                    v.fechaVuelo,
                    v.horaVuelo,
                    v.planVuelo,
                    v.estadoVuelo,
                    COUNT(b.nroBoleto) cantidadBoletos
            FROM vuelo v
            INNER JOIN ciudad co ON v.idCiudadOrigen = co.idCiudad
            INNER JOIN ciudad cd ON v.idCiudadDestino = cd.idCiudad
            INNER JOIN boleto b ON v.nroVuelo = b.nroVuelo
            GROUP BY v.nroVuelo
        ');
    }

    public function cantVuelosActivos()
    {
    }

    public function cantVuelosSuspendidos()
    {
    }
}
