<section class="container my-5">
    @if (count($vuelos) > 0)
        <h3 class="mb-3">Vuelos encontrados: </h3>
        @foreach ($vuelos as $vuelo)
            @if ($vuelo->cantBusinessDisponible > 0)
                <x-cardVueloInfo nroVuelo="{{$vuelo->nroVuelo}}" origen="{{ $vuelo->origen }}" destino="{{ $vuelo->destino }}"
                    fechaVuelo="{{ $vuelo->fechaVuelo }}" horaVuelo="{{ $vuelo->horaVuelo }}" clase="business"
                    tarifa="{{ $vuelo->tarifaBusiness }}" cantAdultos="{{ $form->cantAdultos }}"
                    cantMenores="{{ $form->cantMenores }}" cantBebes="{{ $form->cantBebes }}" />
            @endif
            @if ($vuelo->cantPrimeraDisponible > 0)
                <x-cardVueloInfo nroVuelo="{{$vuelo->nroVuelo}}" origen="{{ $vuelo->origen }}" destino="{{ $vuelo->destino }}"
                    fechaVuelo="{{ $vuelo->fechaVuelo }}" horaVuelo="{{ $vuelo->horaVuelo }}" clase="primera"
                    tarifa="{{ $vuelo->tarifaPrimera }}" cantAdultos="{{ $form->cantAdultos }}"
                    cantMenores="{{ $form->cantMenores }}" cantBebes="{{ $form->cantBebes }}" />
            @endif
            @if ($vuelo->cantTuristaDisponible > 0)
                <x-cardVueloInfo nroVuelo="{{$vuelo->nroVuelo}}" origen="{{ $vuelo->origen }}" destino="{{ $vuelo->destino }}"
                    fechaVuelo="{{ $vuelo->fechaVuelo }}" horaVuelo="{{ $vuelo->horaVuelo }}" clase="turista"
                    tarifa="{{ $vuelo->tarifaTurista }}" cantAdultos="{{ $form->cantAdultos }}"
                    cantMenores="{{ $form->cantMenores }}" cantBebes="{{ $form->cantBebes }}" />
            @endif
        @endforeach
    @else
    <div class="text-center">
        <h3>No encontramos disponibilidad para tu búsqueda.</h3>
        <img class="mt-5" src="{{asset('/img/no-results.svg')}}" alt="">
    </div>
    @endif
</section>
