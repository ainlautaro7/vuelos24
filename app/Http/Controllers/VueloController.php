<?php

namespace App\Http\Controllers;

use App\Models\ciudad;
use App\Models\servicio;
use App\Models\vuelo;
use Illuminate\Cache\RateLimiting\Limit;
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

        return view('Empleado.administrarVuelos', compact('vuelos'));
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
        $vuelo = vuelo::findOrFail($request->nroVuelo);
        $vuelo->estadoVuelo = $request->estadoVuelo;

        $vuelo->save();
        return redirect('/gestion/administrarVuelos');
    }

    public function finalizarVuelo(Request $request)
    {
        $vuelo = vuelo::findOrFail($request->nroVuelo);
        $vuelo->estadoVuelo = $request->estadoVuelo;

        $vuelo->save();
        return redirect('/gestion/administrarVuelos');
    }

    public function reasignarPasajeros(Request $request)
    {
        $gestionarBoleto = new BoletoController();
        $prueba = new BoletoController();   //Esta este porque tuve problemas y con 2 variables me salió
        for ($i=1; $i <= $request->cantPasajerosTotal ; $i++) {  
            if ($request->{"documentoPasajero" . $i} == ""){
            } else {
                $prueba->cambiarEstadoBoleto($request, $i, 'resetear');
                $gestionarBoleto->cambiarEstadoBoleto($request, $i, 'mover');
            }
        }
        return redirect('/gestion/administrarVuelos')->with('message', "Los pasajeros seleccionados del vuelo Nro " . $request->nroVuelo . " fueron reasignados al vuelo Nro " . $request->nroVueloSeleccionado . " exitosamente!!");
    }

    public function modificarVuelo(Request $request)
    {
        $vuelo = vuelo::findOrFail($request->nroVuelo);
        $vuelo->fechaVuelo = $request->fechaVuelo;
        $vuelo->horaVuelo = $request->horaVuelo;

        $vuelo->save();

        return redirect('/gestion/administrarVuelos')->with('message', "Vuelo Nro " . $request->nroVuelo . " reprogramado con exito!");
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
                    ['cantBoletosDisponible', '>=' ,$cantPasajeros]
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
                    ['cantBoletosDisponible', '>=' ,$cantPasajeros]
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

    public function destinosMasVisitados()
    {
    }

    public function cantVuelosRegistrados()
    {
    }

    public function cantVuelosActivos()
    {
    }

    public function cantVuelosSuspendidos()
    {
    }
}
