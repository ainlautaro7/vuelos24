<!-- Modal Iniciar Vuelo-->
<div class="modal fade text-center" id="finalizar{{$vuelo->nroVuelo}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center mx-auto" id="exampleModalLabel">¿Seguro desea marcar el Vuelo Nro {{$vuelo->nroVuelo}} como finalizado?</h5>
      </div>
      <div class="modal-body">
        <form action="{{route('vuelo.finalizar')}}" method="POST">
        @method('PUT')  
        @csrf
          <input type="hidden" name="nroVuelo" value="{{$vuelo->nroVuelo}}">
          <input type="hidden" name="estadoVuelo" value="realizado">
          <button type="submit" class="btn btn-success btn-lg">SI</button>
          <button type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal">NO</button>
        </form>
      </div>
    </div>
  </div>
</div>