<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vuelos24</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- styles table -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
</head>

<body class="inicioCliente">

    <!-- navbar -->
    @include('components.cliente.navbar')

    <h1 class="text-center mt-5">Mis Vuelos</h1>

    <div class="container mx-auto mt-5">
        <table id="boletos" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Vuelo desde</th>
                    <th>Vuelo a</th>
                    <th>Fecha vuelo</th>
                    <th>Hora vuelo</th>
                    <th>Apellido pasajero</th>
                    <th>Nombre pasajero</th>
                    <th>Dni pasajero</th>
                    <th>Clase</th>
                    <th>Tarifa</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($boletos as $boleto)
                    <tr>
                        <th>{{$boleto->origenVuelo}}</th>
                        <th>{{$boleto->destinoVuelo}}</th>
                        <th>{{$boleto->fechaVuelo}}</th>
                        <th>{{$boleto->horaVuelo}}</th>
                        <th>{{$boleto->apellidoPasajero}}</th>
                        <th>{{$boleto->nombrePasajero}}</th>
                        <th>{{$boleto->documentoPasajero}}</th>
                        <th>{{$boleto->claseBoleto}}</th>
                        <th>{{$boleto->tarifaBoleto}}</th>
                        <th>{{$boleto->estadoBoleto}}</th>
                    </tr>
                @endforeach
            </tbody>
            {{-- <tfoot>
                <tr>
                    <th>Vuelo desde</th>
                    <th>Vuelo a</th>
                    <th>Fecha vuelo</th>
                    <th>Hora vuelo</th>
                    <th>Apellido pasajero</th>
                    <th>Nombre pasajero</th>
                    <th>Dni pasajero</th>
                    <th>Clase</th>
                    <th>Tarifa</th>
                    <th>Estado</th>
                </tr>
            </tfoot> --}}
        </table>
    </div>

    {{-- SCRIPTS --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#boletos').DataTable();
        });
    </script>

</body>

</html>
