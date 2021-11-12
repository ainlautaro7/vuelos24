<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gestion Vuelos 24 | Administrar Empleados</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    
    <!-- styles table -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">

    <!-- styles propio -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Estilos correspondientes al navbar -->
    <style>
        a.nav-link.administrarEmpleados {
            color: #fff;
            background-color: #0d6efd;
        }
    </style>
</head>

<body class="administrarEmpleados">

    <x-Sidebar />

    <section class="mx-auto">
        <x-NavbarEmpleado section="Administrar Empleados" />

        <div class="container mx-auto mt-5">

            <a class="btn btn-dark mb-3 float-end text-white" href="{{ url('/gestion/administrarEmpleados/nuevoEmpleado') }}">
                Nuevo Empleado <i class="fas fa-plus"></i>
            </a>

            <div class="input-group mb-3">
                <input id="search" type="text" class="form-control" placeholder="Buscar Empleado" aria-label="Buscar Empleado" aria-describedby="basic-addon2">
                <span class="input-group-text" id="btn-buscar-vuelo">
                    <i class="fa fa-search"></i>
                </span>
            </div>

            <table id="empleados" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Cod Empleado</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($empleados as $empleado)
                    <tr>
                        <th scope="row">{{$empleado->codEmpleado}}</th>
                        <td>{{$empleado->nombre}}</td>
                        <td>{{$empleado->apellido}}</td>
                        <td>{{$empleado->telefono}}</td>
                        <td>{{$empleado->email}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

    <script>
        var table = $('#empleados').DataTable({
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