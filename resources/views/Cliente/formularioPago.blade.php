<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vuelos24 | Comprar Boleto</title>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- estilos propios --}}
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    {{-- estilos tarjeta --}}
    <link rel="stylesheet" href="{{ 'css/paycard.css' }}">
</head>

<body>

    @include('components.cliente.navbar')

    <div class="row">

        <h1 class="mt-5 col-12 text-center" style="font-weight: normal;">Formulario de Pago</h1>
        <div class="contenedor col-8 me-auto">

            <!-- Tarjeta -->
            <section class="tarjeta" id="tarjeta">
                <div class="delantera">
                    <div class="logo-marca" id="logo-marca">
                        <!-- <img src="img/logos/visa.png" alt=""> -->
                    </div>
                    <img src="img/chip-tarjeta.png" class="chip" alt="">
                    <div class="datos">
                        <div class="grupo" id="numero">
                            <p class="label">Número Tarjeta</p>
                            <p class="numero">#### #### #### ####</p>
                        </div>
                        <div class="flexbox">
                            <div class="grupo" id="nombre">
                                <p class="label">Nombre Tarjeta</p>
                                <p class="nombre">Jhon Doe</p>
                            </div>

                            <div class="grupo" id="expiracion">
                                <p class="label">Expiracion</p>
                                <p class="expiracion"><span class="mes">MM</span> / <span
                                        class="year">AA</span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="trasera">
                    <div class="barra-magnetica"></div>
                    <div class="datos">
                        <div class="grupo" id="firma">
                            <p class="label">Firma</p>
                            <div class="firma">
                                <p></p>
                            </div>
                        </div>
                        <div class="grupo" id="ccv">
                            <p class="label">CCV</p>
                            <p class="ccv"></p>
                        </div>
                    </div>
                    <p class="leyenda">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus
                        exercitationem, voluptates illo.</p>
                    <a href="#" class="link-banco">www.tubanco.com</a>
                </div>
            </section>

            <!-- Contenedor Boton Abrir Formulario -->
            <div class="contenedor-btn d-none">
                <button class="btn-abrir-formulario" id="btn-abrir-formulario">
                    <i class="fas fa-plus"></i>
                </button>
            </div>

            <!-- Formulario -->
            <form action="{{ route('cliente.comprarBoleto') }}" id="formulario-tarjeta" class="formulario-tarjeta active mt-4">
                @csrf
                <div class="grupo">
                    <label for="inputNumero">Número Tarjeta</label>
                    <input type="text" id="inputNumero" maxlength="19" autocomplete="off">
                </div>
                <div class="grupo">
                    <label for="inputNombre">Nombre</label>
                    <input type="text" id="inputNombre" maxlength="19" autocomplete="off">
                </div>
                <div class="flexbox">
                    <div class="grupo expira">
                        <label for="selectMes">Expiracion</label>
                        <div class="flexbox">
                            <div class="grupo-select">
                                <select name="mes" id="selectMes">
                                    <option disabled selected>Mes</option>
                                </select>
                                <i class="fas fa-angle-down"></i>
                            </div>
                            <div class="grupo-select">
                                <select name="year" id="selectYear">
                                    <option disabled selected>Año</option>
                                </select>
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </div>
                    </div>

                    <div class="grupo ccv">
                        <label for="inputCCV">CCV</label>
                        <input type="text" id="inputCCV" maxlength="3">
                    </div>
                </div>
                <button type="submit" class="btn-enviar">Pagar</button>
            </form>
        </div>

        {{-- informacion del vuelo --}}
        <div class="col-4 me-auto row mt-5" style="height: 100%">
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
        </div>

        <div class="d-none">
            {{ $cantPasajeros = Session::get('cantAdultos') + Session::get('cantMenores') + Session::get('cantBebes') }}
        </div>
        <input type="hidden" name="cantPasajeros" value="{{ $cantPasajeros }}">
    </div>

    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/paycard.js') }}"></script>
</body>

</html>
