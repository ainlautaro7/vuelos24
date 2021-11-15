@php
// Mercado Pago SDK
require base_path('/vendor/autoload.php');
// Add Your credentials
MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

// Create a preference object
$preference = new MercadoPago\Preference();
@endphp

{{-- SCRIPT QUE DETECTA SI EL FORMULARIO ES DE COMPRA O RESERVA --}}
@if (Session::get('tipoFormulario') == 'compra')
    {{-- <form action="{{ route('cliente.comprarBoleto') }}" method="POST" class="row"> --}}
    <div class="row">
    @else
        <form action="{{ route('cliente.reserva') }}" method="POST" class="row">
@endif
@csrf

<h1 class="mt-3 mb-5 col-12 text-center">Formulario de {{ Session::get('tipoFormulario') }}</h1>

{{-- datos pre-cargados --}}
<input type="hidden" name="nroVuelo" value="{{ Session::get('nroVuelo') }}">
<input type="hidden" name="codCliente" value="{{ auth()->user()->id }}">
<input type="hidden" name="claseBoleto" value="{{ Session::get('claseBoleto') }}">
<input type="hidden" name="tipoBoleto" value="{{ Session::get('tipoBoleto') }}">

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
                aria-label="apellidoPasajero{{ $i }}    ">
            <input type="text" class="form-control mx-2" name="nombrePasajero{{ $i }}"
                placeholder="nombre del pasajero {{ $i }}" aria-label="nombrePasajero{{ $i }}">
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
        <h4 class="text-left">Vuelo con destino a {{ Session::get('destinoVuelo') }}</h4 class="text-center">
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
            <div class="cho-container">
            </div>
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
    {{ $cantPasajeros = Session::get('cantAdultos') + Session::get('cantMenores') + Session::get('cantBebes') }}
</div>
<input type="hidden" name="cantPasajeros" value="{{ $cantPasajeros }}">

@if (Session::get('tipoFormulario') == 'compra')
    </div>
@else
    </form>
@endif

@php
$contador = 0;

// creo los items de los adultos
for ($i = 0; $i < Session::get('cantAdultos'); $i++) {
    $item = new MercadoPago\Item();
    $item->title = 'Boleto clase ' . Session::get('claseBoleto');
    $item->quantity = 1;
    $item->unit_price = Session::get('tarifaAdultos') / Session::get('cantAdultos');
    $boletos[$contador] = $item;
    $contador++;
}

// creo los items de los menores si los hay
for ($i = 0; $i < Session::get('cantMenores'); $i++) {
    $item = new MercadoPago\Item();
    $item->title = 'Boleto clase ' . Session::get('claseBoleto');
    $item->quantity = 1;
    $item->unit_price = Session::get('tarifaMenores') / Session::get('cantMenores');
    $boletos[$contador] = $item;
    $contador++;
}

// creo los items de los bebes si los hay
for ($i = 0; $i < Session::get('cantBebes'); $i++) {
    $item = new MercadoPago\Item();
    $item->title = 'Boleto clase ' . Session::get('claseBoleto');
    $item->quantity = 1;
    $item->unit_price = Session::get('tarifaBebes') / Session::get('cantBebes');
    $boletos[$contador] = $item;
    $contador++;
}

// que ocurre segun el pago se acredito o no
$preference = new MercadoPago\Preference();
$preference->back_urls = [
    // pagina con los vuelos del cliente
    'success' => 'http://localhost/vuelos24/public/comprarBoleto',

    // al formulario de pago
    'failure' => 'http://www.tu-sitio/failure',

    // pagina con los vuelos del cliente
    'pending' => 'http://www.tu-sitio/pending',
];
$preference->auto_return = 'approved';

$preference->items = $boletos;
$preference->save();
@endphp

{{-- MERCADO PAGO --}}
{{-- SDK MercadoPago.js V2 --}}
<script src="https://sdk.mercadopago.com/js/v2"></script>

<script>
    // Add the SDK credentials
    const mp = new MercadoPago("{{ config('services.mercadopago.key') }}", {
        locale: 'en-US'
    });

    // Initialize the checkout
    mp.checkout({
        preference: {
            id: '{{ $preference->id }}'
        },
        render: {
            container: '.cho-container', // Indicates the name of the class where the payment button will be displayed
            label: 'Pagar', // Changes the button label (optional)
        }
    });
</script>
