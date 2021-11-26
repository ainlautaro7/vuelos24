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

    <!-- script ajax -->
    <script src="{{ asset('js/ajax.js') }}"></script>

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
        <x-NavbarEmpleado section="Administar Vuelo / Reasignar Pasajeros" />

        <div class="container mx-auto mt-5">

            <a href="{{ url('/gestion/administrarVuelos') }}"
                class="btn btn-dark my-3 text-white mx-2 d-start">Volver</a>

            <h1 class="text-center">REASIGNAR PASAJEROS {{ $vuelo->nroVuelo }}</h1>

            <form class="container mt-5" action="{{route('vuelo.reasignarPasajeros')}}" method="POST">
                @method('PUT')
                @csrf
                <input type="hidden" id="nroVuelo" name="nroVuelo" value="{{ $vuelo->nroVuelo }}">
                <input type="hidden" id="origenVuelo" name="origenVuelo" value="{{ $vuelo->origen }}">
                <input type="hidden" id="destinoVuelo" name="destinoVuelo" value="{{ $vuelo->destino }}">
                <input type="hidden" id="fechaVuelo" name="fechaVuelo" value="{{ $vuelo->fechaVuelo }}">

                @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('message') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="row">
                    <div class="col-6">
                        <h4 class="mx-2 my-4">Clases del vuelo
                            <hr>
                        </h4>
                        <div class="input-group my-3">
                            <div class="btn-group">
                                <select class="form-select" name="claseBoleto" id="claseBoleto"
                                    onChange="obtenerPasajeros();">
                                    <option selected>Seleccionar una clase</option>
                                    <option value="primera">Primera</option>
                                    <option value="business">Business</option>
                                    <option value="turista">Turista</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <h4 class="mx-2 my-4">Pasajeros del vuelo en la clase seleccionada
                            <hr>
                        </h4>
                        <div name="pasajeros" id="pasajeros">
                        </div>
                    </div>
                </div>

                <h4 class="mx-2 my-4">Vuelos a los que pueden reasignarse los pasajeros seleccionados
                    <hr>
                </h4>

                <div class="input-group my-3">
                    <div class="btn-group">
                        <div name="vuelos" id="vuelos">

                        </div>
                    </div>
                </div>

                <input type="hidden" name="cantPasajeros" id="cantPasajeros" value="">
                <input type="hidden" name="cantPasajerosTotal" id="cantPasajerosTotal" value="">

                <button class="btn btn-success float-end my-3 text-white mx-2" disabled>Reasignar Pasajeros</button>
            </form>

        </div>
    </section>
</body>

</html>
