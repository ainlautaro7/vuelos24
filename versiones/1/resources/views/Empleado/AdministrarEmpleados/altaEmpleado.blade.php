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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

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
        <x-NavbarEmpleado section="Administar Empleados / Nuevo Empleado" />

        <div class="container mx-auto mt-5">

            <a href="{{ url('/gestion/administrarEmpleados') }}"
                class="btn btn-dark my-3 text-white mx-2 d-start">Volver</a>

            <h1 class="text-center">REGISTRAR NUEVO EMPLEADO</h1>

            <form class="container mt-5" action="{{ route('usuario.alta') }}" method="POST">
                @csrf

                <input type="hidden" name="tipoUsuario" value="empleado" class="form-control mx-2">

                <h4 class="mx-2 my-4">Datos de personales
                    <hr>
                </h4>

                <div class="input-group my-3">
                    <input type="text" name="nombre" placeholder="Nombre" aria-label="Nombre" class="form-control mx-2">
                    <input type="text" name="apellido" placeholder="Apellido" aria-label="Apellido"
                        class="form-control mx-2">
                </div>

                <div class="input-group my-3">
                    <input type="dni" name="nroDocumento" placeholder="Nro. de Documento"
                        aria-label="Numero de Documento" class="form-control mx-2">
                    <input type="date" name="fechaNacimiento" placeholder="Fecha de Nacimiento"
                        aria-label="Fecha de Nacimiento" class="form-control mx-2" min="2003/11/12">
                </div>

                <h4 class="mx-2 my-4">Datos de contacto
                    <hr>
                </h4>

                <div class="input-group my-3">
                    <input type="email" name="email" placeholder="Correo Electronico" aria-label="Correo Electronico"
                        class="form-control mx-2">
                    <input type="tel" name="telefono" placeholder="Nro. telefono" aria-label="Nro. Telefonos"
                        class="form-control mx-2">
                </div>

                <h4 class="mx-2 my-4">Datos de usuario
                    <hr>
                </h4>

                <div class="input-group my-3">
                    <input type="text" name="usuario" placeholder="Nombre de Usuario" aria-label="Nombre de Usuario"
                        class="form-control mx-2">
                    <input type="password" name="password" placeholder="Password" aria-label="Password"
                        class="form-control mx-2">
                </div>

                <button class="btn btn-success float-end my-3 text-white mx-2">Registrar Empleado</button>
            </form>

        </div>
    </section>
</body>

</html>
