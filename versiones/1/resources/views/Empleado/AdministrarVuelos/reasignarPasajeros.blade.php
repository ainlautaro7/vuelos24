<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gestion Vuelos 24 | Administrar Vuelos</title>

    <!-- styles table -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">

    <!-- Styles propios -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Estilos correspondientes al navbar -->
    <style>
        a.nav-link.administrarVuelos {
            color: #fff;
            background-color: #0d6efd;
        }
    </style>
</head>

<body class="administrarVuelos">

    <x-Sidebar />

    <section class="mx-auto">
        <x-NavbarEmpleado section="Administar Vuelo / Reasignar Pasajeros" />

        <div class="container mx-auto mt-5">

            <a href="{{ url('/gestion/administrarVuelos') }}" class="btn btn-dark my-3 text-white mx-2 d-start">Volver</a>

            <h1 class="text-center">REASIGNAR PASAJEROS - VUELO NRO 1</h1>

            <form class="container mt-5" action="">

                <div class="row">
                    <div class="col-6">
                        <h4 class="mx-2 my-4">Clases del vuelo
                            <hr>
                        </h4>
                        <div class="input-group my-3">
                            <div class="btn-group">
                                <button type="button" class="btn btn-info text-white dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Seleccionar una clase
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Primera</a></li>
                                    <li><a class="dropdown-item" href="#">Business</a></li>
                                    <li><a class="dropdown-item" href="#">Turista</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <h4 class="mx-2 my-4">Pasajeros del vuelo en la clase seleccionada
                            <hr>
                        </h4>
                        <div class="input-group my-3">
                            <div class="form-check my-3 mx-2">
                                <input type="checkbox" id="servicio1" name="servicio1" class="form-check-input">
                                <label class="form-check-label" for="flexCheckDefault">Servicio 1</label>
                            </div>
                            <div class="form-check my-3 mx-2">
                                <input type="checkbox" id="servicio1" name="servicio1" class="form-check-input">
                                <label class="form-check-label" for="flexCheckDefault">Servicio 1</label>
                            </div>
                        </div>
                    </div>
                </div>

                <h4 class="mx-2 my-4">Vuelos a los que pueden reasignarse los pasajeros seleccionados
                    <hr>
                </h4>

                <div class="input-group my-3">
                            <div class="btn-group">
                                <button type="button" class="btn btn-info text-white dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Seleccionar un vuelo
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Primera</a></li>
                                    <li><a class="dropdown-item" href="#">Business</a></li>
                                    <li><a class="dropdown-item" href="#">Turista</a></li>
                                </ul>
                            </div>
                        </div>

                <button class="btn btn-success float-end my-3 text-white mx-2">Reasignar Pasajeros</button>
            </form>

        </div>
    </section>
</body>

</html>