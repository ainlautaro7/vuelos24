<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Registarse | Vuelos 24</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
</head>

<body class="login">
    <section class="row">

        <div class="registrarse-section col-xl-4 col-lg-4 col-md-4 col-sm-12">
            <h1>vuelos 24</h1>
            <h3>Registrarse</h3>

            <form class="container mt-5" action="{{ route('usuario.alta') }}" method="POST">
                @csrf
                <input type="hidden" name="tipoUsuario" value="cliente" class="form-control mx-2">

                <div class="input-group my-3">
                    <input type="text" name="nombre" placeholder="Nombre" aria-label="Nombre" class="form-control mx-2"
                        required>

                    <input type="text" name="apellido" placeholder="Apellido" aria-label="Apellido"
                        class="form-control mx-2" required>
                </div>

                <div class="input-group my-3">
                    <input type="number" name="nroDocumento" placeholder="Nro. de Documento"
                        aria-label="Numero de Documento" class="form-control mx-2" min="5000000" max="50000000" required>
                    <input type="date" name="fechaNacimiento" placeholder="Fecha de Nacimiento"
                        aria-label="Fecha de Nacimiento" class="form-control mx-2" required>
                </div>

                <div class="input-group my-3">
                    <input type="email" name="email" placeholder="Correo Electronico" aria-label="Correo Electronico"
                        class="form-control mx-2" required>
                    <input type="number" name="telefono" placeholder="Teléfono" aria-label="Nro. Telefonos"
                        class="form-control mx-2" min="1000000" max="999999999999" required>
                </div>

                <div class="input-group my-3">
                    <input type="user" name="usuario" placeholder="Nombre de Usuario" aria-label="Nombre de Usuario"
                        class="form-control mx-2" required>
                    <input type="password" name="password" placeholder="Password" aria-label="Password"
                        class="form-control mx-2" required>
                </div>

                <input type="submit" class="btn btn-info my-3 text-white" value="REGISTRARSE">
            </form>

            <a href="./login">Iniciar Sesion</a>
        </div>
    </section>

        <script>
            $(function() {
                $("input[type=number]").on("invalid", function() {
                    this.setCustomValidity("El teléfono debe tener una longitud de entre 7 y 11 digitos (numéricos)");
                });
            });
        </script>
</body>

</html>
