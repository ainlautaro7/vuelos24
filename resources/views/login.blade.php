<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login | Vuelos 24</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body class="login">
    <section class="row">

        <div class="login-section col-xl-4 col-lg-4 col-md-4 col-sm-12">
            <h1 class="text-center">vuelos 24</h1>
            <h2 class="text-center">Iniciar Sesion</h2>

            <form action="{{route('usuario.iniciarSesion')}}" method="PUT">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="usuario" placeholder="Usuario" aria-label="Usuario" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2">
                </div>
                <button type="submit" class="btn btn-info text-white">INICIAR SESION</button>
                <br>

                @error('message')
                <div class="alert alert-danger mt-3" role="alert">
                    {{$message}}
                  </div>
                @enderror
            </form>

            <a class="" href="{{url('/registrarse')}}">Registrarse</a>
        </div>
    </section>
</body>

</html>