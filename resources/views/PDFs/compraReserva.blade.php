<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ public_path('css/comprobante.css') }}" rel="stylesheet" type="text/css">
    <title>Comprobante</title>
    <style>
        table{
    border:1px black solid; 
    border-collapse: collapse;
    width: 50%;
    font-size: 20px;
}
header{
    font-size: 60px;
    text-align: center;
}
p{
    font-size: 24px;
}
th{
    height: 30px;
    text-align: top;
}
td{
    text-align: center;
}
h3{
    text-align: center;
    font-size: 30px;
}
h2{
    text-align: right;
}
div{
    display: none;
}
table{
    margin: 0 auto;
}
    </style>   
</head>
<body>
    <header>Vuelos24</header><hr>

    @if ($request->estadoBoleto == 'reservado')
        <h3>Comprobante de reserva del boleto</h3>
    @else
        <h3>Comprobante de compra del boleto</h3>
    @endif

    <p><u><b>Datos del vuelo:</b></u></p>
    <table>
        <tr>
            <td> <b> Número de vuelo </b> </td>
            <td> {{ $request->nroVuelo }} </td>
        </tr>
        <tr>
            <td> <b> Origen </b> </td>
            <td> {{ $request->origenVuelo }} </td>
        </tr>
        <tr>
            <td> <b> Destino </b> </td>
            <td> {{ $request->destinoVuelo }} </td>
        </tr>
        <tr>
            <td> <b> Tipo boleto </b> </td>
            <td> {{ $request->tipoBoleto }} </td>
        </tr>
        <tr>
            <td> <b> Clase boleto </b> </td>
            <td> {{ $request->claseBoleto }} </td>
        </tr>
        <tr>
            <td> <b> Fecha </b> </td>
            <td> {{ $request->fechaVuelo }} </td>
        </tr>
        <tr>
            <td> <b> Hora </b> </td>
            <td> {{ $request->horaVuelo }} </td>
        </tr>
    </table><br>
    <p><u><b>Datos del pasajero:</b></u></p>
    <table>
        <tr>
            <th> Nombre </th>
            <th> Apellido </th>
            <th> Documento </th>
        </tr>
          
        <tr>
            <td> {{ $request->nombrePasajero }} </td>
            <td> {{ $request->apellidoPasajero }} </td>
            <td> {{ $request->documentoPasajero }} </td>
        </tr>
    </table><br>
    <h2>Tarifa: ${{ number_format($request->tarifaBoleto, 000, '.', '.') }}</h2>
</body>
</html>