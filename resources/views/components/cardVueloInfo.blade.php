<a data-bs-toggle="modal" data-bs-target="#vueloNro{{$nroVuelo}}{{$clase}}" class="card-vuelo-info border row my-3" style="cursor: pointer">
    <div class="d-none">{{$tarifaMenores=0}}</div>
    <div class="col-9 row">
        <div class="col-12 pt-3 pb-2">
            {{ $origen }}
            <i class="fas fa-plane mx-2"></i>
            {{ $destino }}
        </div>
        <hr>
        <div class="col-4 pb-3">
            @if ($clase == 'primera')
                {{ $clase }} clase
            @else
                clase {{ $clase }}
            @endif
        </div>
        <div class="col-4 pb-3 text-center">
            {{ $fechaVuelo }}
            {{ $horaVuelo }}
        </div>
    </div>

    {{-- Tabla precios --}}
    <div class="col-3 pb-3 ms-auto precio text-center pt-3 row">

        {{-- adultos --}}
        @if ($cantAdultos > 1)
            <div class="col-6"><strong>Por adulto</strong></div>
            <div class="col-6"><strong>${{ $tarifa }}</strong></div>
        @endif

        <div class="col-6">{{ $cantAdultos }} @if ($cantAdultos > 1)
                adultos
            @else
                adulto
            @endif
        </div>
        <div class="d-none">{{$tarifaAdultos = $tarifa * $cantAdultos }}</div>
        <div class="col-6">${{number_format($tarifaAdultos, 000, '.', '.')}}</div>

        {{-- menores --}}
        @if ($cantMenores > 0)
            <div class="col-6">
                {{ $cantMenores }}
                @if ($cantMenores > 1)
                    menores
                @else
                    menor
                @endif
            </div>
            <div class="d-none">{{ $tarifaMenores = ($tarifa - $tarifa * 0.1) * $cantMenores }}</div>
            <div class="col-6">${{number_format($tarifaMenores, 000, '.', '.')}}</div>
        @endif

        {{-- bebes --}}
        @if ($cantBebes > 0)
            <div class="col-6">{{ $cantBebes }}
                @if ($cantBebes > 1)
                    bebes
                @else
                    bebe
                @endif
            </div>
            <div class="col-6">$0</div>
        @endif

        <hr class="mt-3">
        <div class="d-none">{{ $total = $tarifaAdultos + $tarifaMenores }}</div>
        <div class="col-12">Total: ${{ number_format($total, 000, '.', '.') }}</div>
    </div>
</a>

@include('components.modales.compraReservaVuelo')