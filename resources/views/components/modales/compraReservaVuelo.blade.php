<!-- Modal -->
<div class="modal fade" id="vueloNro{{ $nroVuelo }}{{$clase}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="max-width: 45%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $origen }} <i
                        class="fas fa-plane mx-2" style="color:#0d6efd;"></i> {{ $destino }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mx-1">
                    <div class="col-12 row">
                        <h3 class="p-0 m-0">Información del vuelo</h3>
                        <hr>
                        <div class="col-3"><strong>Origen:</strong> {{ $origen }}</div>
                        <div class="col-3"><strong>Destino:</strong> {{ $destino }}</div>
                        <div class="col-4"><strong>Fecha del vuelo:</strong> {{ $fechaVuelo }}</div>
                        <div class="col-2"><strong>Clase:</strong> {{ $clase }}</div>
                    </div>
                    <div class="col-12 row mt-4">
                        <h3 class="p-0 m-0">Información de los pasajeros</h3>
                        <hr>
                        <div class="col-6">
                            <strong>Cantidad adultos:</strong> {{ $cantAdultos }} <br>
                            <strong>Cantidad menores:</strong> {{ $cantMenores }} <br>
                            <strong>Cantidad Bebes:</strong> {{ $cantBebes }} <br><br>
                            <strong>Total:</strong> ${{ number_format($total, 000, '.', '.') }}
                        </div>
                        <div class="col-6">
                            <strong>Tarifa:</strong> ${{ number_format($tarifaAdultos, 000, '.', '.') }} <br>
                            <strong>Tarifa:</strong> ${{ number_format($tarifaMenores, 000, '.', '.') }} <br>
                            <strong>Tarifa:</strong> Gratis <br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-success mx-auto" style="width: 20%;">Comprar</button>
                <button type="button" class="btn btn-primary mx-auto" style="width: 20%;">Reservar</button>
            </div>
        </div>
    </div>
</div>
