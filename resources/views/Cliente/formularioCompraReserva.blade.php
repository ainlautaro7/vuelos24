<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vuelos24</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
</head>

<body class="inicioCliente">

    <!-- navbar -->
    @include('components.cliente.navbar')
    {{-- {{ auth()->user()->id }} codCliente --}}
    <div class="container mx-auto my-5 row">
        <h1 class="my-3 col-12 text-center">Formulario de {{ Session::get('tipoFormulario') }}</h1>

        <div class="col-8"></div>
        <div class="col-4 row">
            <div class="col-12">
                <h4 class="text-left">Vuelo con destino a {{ Session::get('destinoVuelo') }}</h4
                    class="text-center">
            </div>

            {{-- itinerario --}}
            <div class="col-12 row">
                <strong class="col-12">Itinerario
                    <hr class="mt-1">
                </strong>
                <div class="col-2">IDA</div>
                <div class="col-6">{{ Session::get('origenVuelo') }}</div>
                <div class="col-4">{{ Session::get('fechaVuelo') }}</div>
            </div>

            {{-- pasajeros --}}
            <div class="col-12 row mt-3">
                <strong>Pasajero/s
                    <hr class="mt-1">
                </strong>
                <div class="col-6 row ">

                    <div class="col-12">{{ Session::get('cantAdultos') }} Adulto</div>
                    <div class="col-12">{{ Session::get('cantMenores') }} Menor</div>
                    <div class="col-12">{{ Session::get('cantBebes') }} Bebe</div>
                </div>
                <div class="col-6 row ">
                    <div class="col-12">${{ Session::get('tarifaAdultos') }}</div>
                    <div class="col-12">${{ Session::get('tarifaMenores') }}</div>
                    <div class="col-12">${{ Session::get('tarifaBebes') }}</div>
                </div>
            </div>

            {{-- precio total --}}
            <div class="col-12 row mt-3">
                <strong>Precio Total</strong>
                <div class="col-12">
                    ARS ${{ Session::get('total') }}
                </div>
            </div>
            <div class="col-12 mt-3">
                <button class="btn btn-info text-white">
                    @if (Session::get('tipoFormulario') == 'comprar')
                        Comprar Boletos
                    @else
                        Reservar Boletos
                    @endif
                </button>
            </div>
        </div>

        {{ Session::get('nroVuelo') }}



        {{ Session::get('horaVuelo') }}









    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
