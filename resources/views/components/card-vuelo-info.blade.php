<a href="" class="card-vuelo-info border row my-3">
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
        <div class="col-6">${{ $tarifaAdultos = $tarifa * $cantAdultos }}</div>

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
            <div class="col-6">${{ $tarifaMenores = ($tarifa - $tarifa * 0.1) * $cantMenores }}</div>
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
        <div class="col-12">Total: ${{ $total = $tarifaAdultos + $tarifaMenores }}</div>
    </div>
</a>
