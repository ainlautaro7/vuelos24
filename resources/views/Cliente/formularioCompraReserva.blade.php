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

    <div class="container mx-auto my-5">
        <a href="javascript:history.back()" class="btn btn-dark">Volver</a>

        @if (Session::get('tipoFormulario') == 'compra')
            <form action="{{ route('cliente.comprarBoleto') }}" method="POST" class="row">
            @else 
                <form action="{{ route('cliente.reserva') }}" method="POST" class="row">
        @endif
        @csrf
        <h1 class="mt-3 mb-5 col-12 text-center">Formulario de {{ Session::get('tipoFormulario') }}</h1>

        {{-- datos pre-cargados --}}
        <input type="hidden" name="nroVuelo" value="{{ Session::get('nroVuelo') }}">
        <input type="hidden" name="codCliente" value="{{ auth()->user()->id }}">
        <input type="hidden" name="claseBoleto" value="{{Session::get('claseBoleto')}}">
        <input type="hidden" name="tipoBoleto" value="{{Session::get('tipoBoleto')}}">

        {{-- formularios --}}
        <div class="col-7 me-auto">
            @for ($i = 1; $i <= Session::get('cantAdultos') + Session::get('cantMenores') + Session::get('cantBebes'); $i++)
                <h4>Datos personales - Pasajero Nro {{ $i }}
                    <hr>
                </h4>
                {{-- nombre y apellido --}}
                <div class="input-group my-3">
                    <input type="text" class="form-control mx-2" name="apellidoPasajero{{ $i }}"
                        placeholder="apellido del pasajero {{ $i }}"
                        aria-label="apellidoPasajero{{ $i }}">
                    <input type="text" class="form-control mx-2" name="nombrePasajero{{ $i }}"
                        placeholder="nombre del pasajero {{ $i }}"
                        aria-label="nombrePasajero{{ $i }}">
                </div>

                {{-- nro documento --}}
                <div class="input-group mt-3 mb-5">
                    <input type="text" class="form-control mx-2" name="documentoPasajero{{ $i }}"
                        placeholder="documento del pasajero {{ $i }}"
                        aria-label="documentoPasajero{{ $i }}">
                </div>
            @endfor
        </div>

        {{-- informacion del vuelo --}}
        <div class="col-4 ms-auto  row">
            <div class="col-12">
                <h4 class="text-left">Vuelo con destino a {{ Session::get('destinoVuelo') }}</h4
                    class="text-center">
            </div>

            {{-- itinerario --}}
            <div class="col-12 row">
                <strong class="col-12">Itinerario
                    <hr class="mt-1">
                </strong>

                {{-- tipo boleto --}}
                <div class="col-12 row">
                    <div class="col-6">
                        Tipo Boleto
                    </div>
                    <div class="col-6 text-end">IDA</div>
                </div>

                {{-- origen del vuelo --}}
                <div class="col-12 row">
                    <div class="col-4">Origen</div>
                    <div class="col-8 text-end">{{ Session::get('origenVuelo') }}</div>
                </div>

                <div class="col-12 row">
                    <div class="col-4">Fecha vuelo</div>
                    <div class="col-8 text-end">{{ Session::get('fechaVuelo') }}</div>
                </div>

                <div class="col-12 row">
                    <div class="col-6">Hora vuelo</div>
                    <div class="col-6 text-end">{{ Session::get('horaVuelo') }}</div>
                </div>
            </div>

            {{-- pasajeros --}}
            <div class="col-12 row mt-3">
                <strong>Pasajero/s
                    <hr class="mt-1">
                </strong>

                {{-- adultos --}}
                <div class="col-12 row ">
                    <div class="col-6">{{ Session::get('cantAdultos') }}
                        @if (Session::get('cantAdultos') > 1)
                            Adultos
                        @else
                            Adulto
                        @endif
                    </div>
                    <div class="col-6 text-end">
                        ${{ number_format(Session::get('tarifaAdultos'), 000, '.', '.') }}
                    </div>
                </div>

                {{-- menores --}}
                @if (Session::get('cantMenores') > 0)
                    <div class="col-12 row">
                        <div class="col-6">
                            {{ Session::get('cantMenores') }}
                            @if (Session::get('cantMenores') > 1)
                                Menores
                            @else
                                Menor
                            @endif
                        </div>
                        <div class="col-6 text-end">
                            ${{ number_format(Session::get('tarifaMenores'), 000, '.', '.') }}
                        </div>
                    </div>
                @endif

                {{-- bebes --}}
                @if (Session::get('cantBebes') > 0)
                    <div class="col-12 row ">
                        <div class="col-6">{{ Session::get('cantBebes') }}
                            @if (Session::get('cantBebes') > 1)
                                Bebes
                            @else
                                Bebe
                            @endif
                        </div>
                        <div class="col-6 text-end">${{ Session::get('tarifaBebes') }}</div>
                    </div>
                @endif
            </div>

            {{-- precio total --}}
            <div class="col-12 row mt-3">
                <div class="col-12 row">
                    <div class="col-6">
                        <strong>Precio Total</strong>
                    </div>
                    <div class="col-6 text-end">
                        ${{ number_format(Session::get('total'), 000, '.', '.') }}
                    </div>
                </div>
            </div>

            {{-- boton comprar/reservar --}}
            <div class="col-12 mt-3">
                @if (Session::get('tipoFormulario') == 'compra')
                    <button type="submit" class="btn btn-success text-white">
                        @if ((Session::get('cantAdultos') > 1) | (Session::get('cantMenores') > 1) | (Session::get('cantBebes') > 1))
                            Comprar Boletos
                        @else
                            Comprar Boleto
                        @endif
                    </button>
                @else
                    <button type="submit" class="btn btn-primary text-white">
                        @if ((Session::get('cantAdultos') > 1) | (Session::get('cantMenores') > 1) | (Session::get('cantBebes') > 1))
                            Reservar Boletos
                        @else
                            Reservar Boleto
                        @endif
                    </button>
                @endif
            </div>
        </div>

        <div class="d-none">
            {{$cantPasajeros = Session::get('cantAdultos') + Session::get('cantMenores') + Session::get('cantBebes')}}
        </div>
        <input type="hidden" name="cantPasajeros" value="{{$cantPasajeros}}">

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
