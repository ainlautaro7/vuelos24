<section class="container my-5">
    @if (count($vuelos) > 0)
        <h3 class="mb-3">Vuelos encontrados: </h3>
        @foreach ($vuelos as $vuelo)
            <x-cardVueloInfo nroVuelo="{{ $vuelo->nroVuelo }}" origen="{{ $vuelo->origen }}"
                destino="{{ $vuelo->destino }}" fechaVuelo="{{ $vuelo->fechaVuelo }}"
                horaVuelo="{{ $vuelo->horaVuelo }}" clase="{{$vuelo->claseBoleto}}" tarifa="{{ $vuelo->tarifaBoleto }}"
                cantAdultos="{{ $form->cantAdultos }}" cantMenores="{{ $form->cantMenores }}"
                cantBebes="{{ $form->cantBebes }}" />
        @endforeach
    @else
        <div class="text-center">
            <h3>No encontramos disponibilidad para tu búsqueda.</h3>
            <img class="mt-5" src="{{ asset('/img/no-results.svg') }}" alt="">
        </div>
    @endif
</section>
