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

        input {
            border: none;
            background: transparent;
            cursor: default;
            color: black;
            font-weight: 700;
            width: 100%;
        }

        input:focus-visible {
            outline: none;
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
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Apellido</th>
                    <th>Nombre</th>
                    <th>documento</th>
                    <th>Clase</th>
                    <th>Tarifa</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($boletos as $boleto)
                    <tr>
                        @if ($boleto->estadoBoleto == 'reservado')
                            <form action="{{ route('cliente.comprarBoleto') }}" method="POST">
                                @csrf
                                <input type="hidden" name="nroVuelo" value="{{ $boleto->nroVuelo }}">
                                <input type="hidden" name="codCliente"
                                    value="{{ DB::table('cliente')->where('idUsuario', auth()->user()->id)->value('codCliente') }}">
                                <input type="hidden" name="cantPasajeros" value="1">
                                <input type="hidden" name="tipoTransaccion" value="compra">
                                <input type="hidden" name="tipoBoleto" value="{{ $boleto->tipoBoleto }}">
                        @endif
                        <th><input readonly size="" type="text" value="{{ $boleto->origenVuelo }}" disabled></th>
                        <th><input readonly size="" type="text" value="{{ $boleto->destinoVuelo }}" disabled></th>
                        <th><input readonly size="" type="text" value="{{ $boleto->fechaVuelo }}" disabled></th>
                        <th><input readonly size="" type="text" value="{{ $boleto->horaVuelo }}" disabled></th>
                        <th><input readonly size="" type="text" name="apellidoPasajero1"
                                value="{{ $boleto->apellidoPasajero }}"></th>
                        <th><input readonly size="" type="text" name="nombrePasajero1"
                                value="{{ $boleto->nombrePasajero }}">
                        </th>
                        <th><input readonly size="" type="text" name="documentoPasajero1"
                                value="{{ $boleto->documentoPasajero }}"></th>
                        <th><input readonly size="" type="text" name="claseBoleto"
                                value="{{ $boleto->claseBoleto }}"></th>
                        <th>{{ $boleto->tarifaBoleto }}</th>
                        <th>{{ $boleto->estadoBoleto }}</th>
                        <th>
                            @if ($boleto->estadoBoleto == 'reservado')
                                <button type="submit" class="btn btn-success btn-sm">Comprar boleto</button>
                            @endif
                        </th>
                        @if ($boleto->estadoBoleto == 'reservado')
                            </form>
                        @endif
                    </tr>
                @endforeach
            </tbody>
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
