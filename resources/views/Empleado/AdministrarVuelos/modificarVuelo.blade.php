<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gestion Vuelos 24 | Administrar Vuelos</title>

    <!-- styles table -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">

    <!-- Styles propios -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Estilos correspondientes al navbar -->
    <style>
        a.nav-link.administrarVuelos {
            color: #fff;
            background-color: #0d6efd;
        }

    </style>
</head>

<body class="administrarVuelos">

    <x-Sidebar />

    <section class="mx-auto">
        <x-NavbarEmpleado section="Administrar Vuelos / Reprogramar Vuelo" />

        <div class="container mx-auto mt-5">

            <a href="{{ url('/gestion/administrarVuelos') }}"
                class="btn btn-dark my-3 text-white mx-2 d-start">Volver</a>

            <h1 class="text-center">REPROGRAMAR VUELO NRO {{ $vuelo->nroVuelo }}</h1>

            <form class="container mt-5" action="{{ route('vuelo.modificar') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <h4 class="mx-2 my-4">Datos del vuelo
                    <hr>
                </h4>

                <input type="hidden" name="nroVuelo" value="{{ $vuelo->nroVuelo }}">

                <div class="input-group my-3">

                    <select name="origen" id="origen" class="form-select mx-2" aria-label="Ciudad de origen" disabled>
                        <option selected>{{ $vuelo->origen }}</option>
                    </select>

                    <select name="destino" id="destino" class="form-select mx-2" aria-label="Ciudad de origen" disabled>
                        <option selected>{{ $vuelo->destino }}</option>
                    </select>

                    <input type="date" id="fechaVuelo" name="fechaVuelo" placeholder="Fecha vuelo"
                        aria-label="Fecha vuelo" class="form-control mx-2" min="{{ $vuelo->fechaVuelo }}"
                        value="{{ $vuelo->fechaVuelo }}" required>
                    <input type="time" id="horaVuelo" name="horaVuelo" placeholder="Hora vuelo" aria-label="Hora vuelo"
                        class="form-control mx-2" value="{{ $vuelo->horaVuelo }}" required>
                </div>

                <div class="input-group my-3 mx-2">
                    Haz click <a href="" class="mx-1">aqui</a> para descargar el plan de vuelo
                </div>

                <h4 class="mx-2 my-4">Datos de las clases
                    <hr>
                </h4>

                <div class="input-group my-3">
                    <div class="mx-2">
                        <label for="">Plazas primera clase</label>
                        <input type="number" min="0" id="plazasPrimeraClase" name="plazasPrimeraClase"
                            value="{{ $boletos[1]->cantidad }}" placeholder="Plazas primera clase"
                            aria-label="Plazas primera clase" class="form-control" required disabled>
                    </div>

                    <div class="mx-2">
                        <label for="">Tarifa primera clase</label>
                        <input type="number" min="0" id="tarifaBoletoPrimera" name="tarifaBoletoPrimera"
                            value="{{ $boletos[1]->tarifaBoleto }}" placeholder="Tarifa boleto"
                            aria-label="tarifa boleto" class="form-control" required disabled>
                    </div>

                    <div class="mx-2">
                        <label for="">Plazas clase business</label>
                        <input type="number" min="0" id="plazasBusinessClase" name="plazasBusinessClase"
                            value="{{ $boletos[0]->cantidad }}" placeholder="Plazas Business clase"
                            aria-label="Plazas Business clase" class="form-control" required disabled>
                    </div>

                    <div class="mx-2">
                        <label for="">Tarifa clase business</label>
                        <input type="number" min="0" id="tarifaBoletoBusiness" name="tarifaBoletoBusiness"
                            value="{{ $boletos[0]->tarifaBoleto }}" placeholder="Tarifa boleto"
                            aria-label="tarifa boleto" class="form-control" required disabled>
                    </div>
                </div>

                <div class="input-group my-3">
                    <div class="mx-2">
                        <label for="">Plazas clase turista</label>
                        <input type="number" min="0" id="plazasTuristaClase" name="plazasTuristaClase"
                            value="{{ $boletos[2]->cantidad }}" placeholder="Plazas clase turista"
                            aria-label="Plazas clase turista" class="form-control" required disabled>
                    </div>

                    <div class="mx-2">
                        <label for="">Tarifa clase turista</label>
                        <input type="number" min="0" id="tarifaBoletoTurista" name="tarifaBoletoTurista"
                            value="{{ $boletos[2]->tarifaBoleto }}" placeholder="Tarifa boleto"
                            aria-label="Precio boleto" class="form-control" required disabled>
                    </div>
                </div>

                <h4 class="mx-2 my-4">Servicios
                    <hr>
                </h4>

                @foreach ($servicios as $servicio)
                    <div class="form-check my-3 mx-2">
                        <input type="checkbox" id="{{ $servicio->idServicio }}"
                            name="servicio{{ $servicio->idServicio }}" class="form-check-input" checked disabled>
                        <label class="form-check-label" for="flexCheckDefault">{{ $servicio->descripcion }}</label>
                    </div>
                @endforeach

                <button type="submit" class="btn btn-success float-end my-3 text-white mx-2">Actualizar Vuelo</button>
            </form>

        </div>
    </section>
</body>

</html>
