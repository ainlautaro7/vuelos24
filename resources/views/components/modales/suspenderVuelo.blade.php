<!-- Modal suspender Vuelo-->
<div class="modal fade text-center" id="suspender{{$vuelo->nroVuelo}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center mx-auto" id="exampleModalLabel">¿Seguro desea suspender el Vuelo Nro {{$vuelo->nroVuelo}}?</h5>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#opcionesSuspender{{$vuelo->nroVuelo}}" data-bs-dismiss="modal">SI</button>
          <button type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal">NO</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal opciones Vuelo-->
<div class="modal fade text-center" id="opcionesSuspender{{$vuelo->nroVuelo}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center mx-auto" id="exampleModalLabel">¿Que desea hacer con el Vuelo Nro {{$vuelo->nroVuelo}}?</h5>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <a href="{{url('/gestion/administrarVuelos/modificarVuelo', $vuelo->nroVuelo)}}"><button type="button" class="btn btn-success btn-lg">Modificar Vuelo</button></a>
          <a href="{{url('/gestion/administrarVuelos/reasignarPasajeros')}}"><button type="button" class="btn btn-info text-white btn-lg">Reasignar Pasajeros</button></a>
        </form>
      </div>
    </div>
  </div>
</div>