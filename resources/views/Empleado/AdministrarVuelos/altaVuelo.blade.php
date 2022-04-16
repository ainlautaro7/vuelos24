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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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
        <x-NavbarEmpleado section="Administrar Vuelos / Nuevo Vuelo" />

        <div class="container mx-auto mt-5">

            <a href="{{ url('/gestion/administrarVuelos') }}" class="btn btn-dark my-3 text-white mx-2 d-start">Volver</a>

            <h1 class="text-center">REGISTRAR NUEVO VUELO</h1>

            @if (session()->has('message'))
            <div class="alert alert-danger text-start mt-2" role="alert">
                <div>{{ session ('message') }}</div>
                {!! session()->forget('message') !!}
            </div>
            @endif

            <form class="container mt-5" action="{{route('vuelo.alta')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <h4 class="mx-2 my-4">Datos del vuelo
                    <hr>
                </h4>

                <div class="input-group my-3">

                    <select name="origen" id="origen" class="form-select mx-2" aria-label="Ciudad de origen">
                        <option selected>Seleccione una ciudad de origen</option>
                        @foreach($ciudades as $ciudad)
                        <option value="{{$ciudad->idCiudad}}">{{$ciudad->nombre}} - {{$ciudad->codigoIATACiudad}}</option>
                        @endforeach
                    </select>

                    <select name="destino" id="destino" class="form-select mx-2" aria-label="Ciudad de origen">
                        <option selected>Seleccione una ciudad de destino</option>
                        @foreach($ciudades as $ciudad)
                        <option value="{{$ciudad->idCiudad}}">{{$ciudad->nombre}} - {{$ciudad->codigoIATACiudad}}</option>
                        @endforeach
                    </select>

                    <input type="date" id="fechaVuelo" name="fechaVuelo" placeholder="Fecha vuelo" aria-label="Fecha vuelo" class="form-control mx-2" min="{{ $now->format('Y-m-d') }}" required>
                    <input type="time" id="horaVuelo" name="horaVuelo" placeholder="Hora vuelo" aria-label="Hora vuelo" class="form-control mx-2" required>
                </div>

                <div class="input-group my-3">
                    <input type="file" id="planVuelo" name="planVuelo" aria-label="Plan de Vuelo" aria-describedby="Plan de Vuelo" class="form-control mx-2" required>
                </div>

                <h4 class="mx-2 my-4">Datos de las clases
                    <hr>
                </h4>

                <div class="input-group my-3">
                    <input type="number" min="0" id="plazasPrimeraClase" name="plazasPrimeraClase" placeholder="Plazas primera clase" aria-label="Plazas primera clase" class="form-control mx-2" required>
                    <input type="number" min="0" id="tarifaBoletoPrimera" name="tarifaBoletoPrimera" placeholder="Tarifa boleto" aria-label="tarifa boleto" class="form-control mx-2" required>
                    <input type="number" min="0" id="plazasBusinessClase" name="plazasBusinessClase" placeholder="Plazas Business clase" aria-label="Plazas Business clase" class="form-control mx-2" required>
                    <input type="number" min="0" id="tarifaBoletoBusiness" name="tarifaBoletoBusiness" placeholder="Tarifa boleto" aria-label="tarifa boleto" class="form-control mx-2" required>
                </div>

                <div class="input-group my-3">
                    <input type="number" min="0" id="plazasTuristaClase" name="plazasTuristaClase" placeholder="Plazas clase turista" aria-label="Plazas clase turista" class="form-control mx-2" required>
                    <input type="number" min="0" id="tarifaBoletoTurista" name="tarifaBoletoTurista" placeholder="Tarifa boleto" aria-label="Precio boleto" class="form-control mx-2" required>
                </div>

                <h4 class="mx-2 my-4">Servicios
                    <hr>
                </h4>

                @foreach($servicios as $servicio)
                <div class="form-check my-3 mx-2">
                    <input type="checkbox" id="{{$servicio->idServicio}}" name="servicio{{$servicio->idServicio}}" class="form-check-input">
                    <label class="form-check-label" for="flexCheckDefault">{{$servicio->descripcion}}</label>
                </div>
                @endforeach

                <button type="submit" class="btn btn-success float-end my-3 text-white mx-2">Registrar Vuelo</button>
            </form>

        </div>
    </section>
</body>

</html>