<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gestion Vuelos 24 | Administrar Vuelos | Nuevo Vuelo</title>

    <!-- styles table -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">

    <!-- Styles propios -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- Estilos correspondientes al navbar -->
    <style>
        a.nav-link.administrarVuelos {
            color: #fff;
            background-color: #0d6efd;
        }

    </style>


<body class="administrarVuelos">

    <x-Sidebar />

    <section class="mx-auto">
        <x-NavbarEmpleado section="Administrar Vuelos" />

        <div class="container mx-auto mt-5">

            @if (session()->has('registro'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('registro') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('message') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <a class="btn btn-dark mb-3 float-end text-white"
                href="{{ url('/gestion/administrarVuelos/nuevoVuelo') }}">
                Nuevo Vuelo <i class="fas fa-plus"></i>
            </a>

            <div class="input-group mb-3">
                <input id="search" type="text" class="form-control" placeholder="Buscar Vuelo"
                    aria-label="Buscar Vuelo" aria-describedby="basic-addon2">
                <span class="input-group-text" id="btn-buscar-vuelo">
                    <i class="fa fa-search"></i>
                </span>
            </div>

            <table id="vuelos" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Nro Vuelo</th>
                        <th scope="col">Origen</th>
                        <th scope="col">Destino</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Horario</th>
                        <th scope="col">Estado</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vuelos as $vuelo)
                        <tr>
                            <th scope="row">{{ $vuelo->nroVuelo }}</th>
                            <td>{{ $vuelo->origen }}</td>
                            <td>{{ $vuelo->destino }}</td>
                            <td>{{ $vuelo->fechaVuelo }}</td>
                            <td>{{ $vuelo->horaVuelo }}</td>
                            <td>{{ $vuelo->estadoVuelo }}</td>
                            <td class="text-center">
                                <button data-bs-toggle="modal" data-bs-target="#iniciar{{ $vuelo->nroVuelo }}"
                                    type="button" class="btn btn-success text-white" title="Iniciar vuelo" @if (($vuelo->estadoVuelo == 'en vuelo') | ($vuelo->estadoVuelo == 'realizado'))
                                    disabled
                    @endif>
                    <i class="fas fa-plane-departure"></i>
                    </button>
                    <button data-bs-toggle="modal" data-bs-target="#finalizar{{ $vuelo->nroVuelo }}" type="button"
                        class="btn btn-info text-white" title="Finalizar vuelo" @if (($vuelo->estadoVuelo == 'realizado') | ($vuelo->estadoVuelo == 'activo'))
                        disabled
                        @endif>
                        <i class="fas fa-plane-arrival"></i>
                    </button>
                    <button data-bs-toggle="modal" data-bs-target="#suspender{{ $vuelo->nroVuelo }}" type="button"
                        class="btn btn-danger" title="Suspender vuelo" @if (($vuelo->estadoVuelo == 'en vuelo') | ($vuelo->estadoVuelo == 'realizado'))
                        disabled
                        @endif>
                        <i class="fas fa-plane-slash"></i>
                    </button>
                    </td>
                    </tr>
                    <!-- modal iniciar vuelo -->
                    @include('components.modales.iniciarVuelo')
                    <!-- modal finalizar vuelo -->
                    @include('components.modales.finalizarVuelo')
                    <!-- modal suspender vuelo -->
                    @include('components.modales.suspenderVuelo')
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

    <script>
        var table = $('#vuelos').DataTable({
            "lengthMenu": [
                [5, 10, 25, 50],
                [5, 10, 25, 50], "All"
            ]
        });
        // #myInput is a <input type="text"> element
        $('#search').on('keyup', function() {
            table.search(this.value).draw();
        });
    </script>
</body>

</html>
