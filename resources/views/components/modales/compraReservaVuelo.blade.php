<!-- Modal -->
<div class="modal fade" id="vueloNro{{ $nroVuelo }}{{ $clase }}" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 50%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $origen }} <i class="fas fa-plane mx-2"
                        style="color:#0d6efd;"></i> {{ $destino }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="form-compra-reserva-boleto-modal" action="{{ route('cliente.comprarReservarBoleto') }}"
                method="POST">
                @csrf
                <input type="hidden" name="nroVuelo" id="nroVuelo" value="{{$nroVuelo}}">
                <div class="modal-body">
                    <div class="row mx-1">
                        <div class="col-12 row">
                            <h3 class="p-0 m-0">Información del vuelo
                                <hr class="p-0 mt-1 mb-3">
                            </h3>

                            {{-- origen del vuelo --}}
                            <div class="col-3">
                                <strong>Origen</strong>
                                <input type="text" name="origenVuelo" id="origenVuelo" value="{{ $origen }}"
                                    readonly>
                            </div>

                            {{-- destino del vuelo --}}
                            <div class="col-3">
                                <strong>Destino</strong>
                                <input type="text" name="destinoVuelo" id="destinoVuelo" value="{{ $destino }}"
                                    readonly>
                            </div>

                            {{-- fecha del vuelo --}}
                            <div class="col-3">
                                <strong>Fecha del vuelo</strong>
                                <input type="text" name="fechaVuelo" id="fechaVuelo" value="{{ $fechaVuelo }}"
                                    readonly>
                            </div>

                            <div class="col-3">
                                <strong>Hora del vuelo</strong>
                                <input type="text" name="horaVuelo" id="horaVuelo" value="{{ $horaVuelo }}"
                                    readonly>
                            </div>

                            {{-- clase del boleto --}}
                            <div class="col-3">
                                <strong>Clase</strong>
                                <input type="text" name="claseBoleto" id="claseBoleto" value="{{ $clase }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-12 row mt-4">
                            <h3 class="p-0 m-0">Información de los pasajeros
                                <hr class="p-0 mt-1 mb-3">
                            </h3>

                            {{-- cantidad de personas --}}
                            <div class="col-6 row">

                                {{-- cantidad adultos --}}
                                <div class="col-12">
                                    <strong>Cantidad adultos:</strong>
                                    <input type="text" name="cantAdultos" id="cantAdultos" value="{{ $cantAdultos }}"
                                        readonly>
                                </div>

                                {{-- cantidad menores --}}
                                @if ($cantMenores > 0)
                                    <div class="col-12">
                                        <strong>Cantidad menores:</strong>
                                        <input type="text" name="cantMenores" id="cantMenores"
                                            value="{{ $cantMenores }}">
                                    </div>
                                @endif

                                {{-- cantidad bebes --}}
                                @if ($cantBebes > 0)
                                    <div class="col-12">
                                        <strong>Cantidad Bebes:</strong>
                                        <input type="text" name="cantBebes" id="cantBebes" value="{{ $cantBebes }}"
                                            readonly>
                                    </div>
                                @endif

                            </div>

                            {{-- tarifas x persona --}}
                            <div class="col-6 row">

                                {{-- tarifa adultos --}}
                                <div class="col-12">
                                    <strong>Tarifa:</strong>
                                    ${{ number_format($tarifaAdultos, 000, '.', '.') }}
                                    <input type="hidden" name="tarifaAdultos" id="tarifaAdultos"
                                        value="{{ $tarifaAdultos }}" />
                                </div>

                                {{-- tarifa menores --}}
                                @if ($cantMenores > 0)
                                    <div class="col-12">
                                        <strong>Tarifa:</strong> ${{ number_format($tarifaMenores, 000, '.', '.') }}
                                        <input type="hidden" name="tarifaMenores" id="tarifaMenores"
                                            value="{{ $tarifaMenores }}" />
                                    </div>
                                @endif

                                {{-- tarifa bebes --}}
                                @if ($cantBebes > 0)
                                    <div class="col-12">
                                        <strong>Tarifa:</strong> Gratis
                                        <input type="hidden" name="tarifaBebes" id="tarifaBebes" value="0" />
                                    </div>
                                @endif
                            </div>

                            {{-- tarifa total --}}
                            <div class="col-12 mt-3">
                                <strong>Total:</strong>
                                ${{ number_format($total, 000, '.', '.') }}
                                <input type="hidden" name="tarifaTotal" id="tarifaTotal" value="{{ $total }}" />
                            </div>
                        </div>
                    </div>
                </div>

                {{-- botones de compra/reserva --}}
                <div class="modal-footer text-center">

                    {{-- compra --}}
                    <button type="submit" name="tipoFormulario" value="compra" class="btn btn-success mx-auto"
                        style="width: 20%;">Comprar</button>

                    {{-- reserva --}}
                    <button type="submit" name="tipoFormulario" value="reserva" class="btn btn-primary mx-auto"
                        style="width: 20%;">Reservar</button>
                </div>
            </form>
        </div>
    </div>
</div>
