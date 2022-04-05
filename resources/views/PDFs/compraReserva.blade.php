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
    <h3>Comprobante de {{ Session::get('tipoFormulario') }} de boletos</h3>
    <p><u><b>Datos del vuelo:</b></u></p>
    <table>
        <tr>
            <td> <b> Número de vuelo </b> </td>
            <td> {{ Session::get('nroVuelo') }} </td>
        </tr>
        <tr>
            <td> <b> Origen </b> </td>
            <td> {{ Session::get('origenVuelo') }} </td>
        </tr>
        <tr>
            <td> <b> Destino </b> </td>
            <td> {{ Session::get('destinoVuelo') }} </td>
        </tr>
        <tr>
            <td> <b> Tipo boleto </b> </td>
            <td> {{ Session::get('tipoBoleto') }} </td>
        </tr>
        <tr>
            <td> <b> Fecha </b> </td>
            <td> {{ Session::get('fechaVuelo') }} </td>
        </tr>
        <tr>
            <td> <b> Hora </b> </td>
            <td> {{ Session::get('horaVuelo') }} </td>
        </tr>
    </table><br>
    <p><u><b>Pasajeros:</b></u></p>
    <table>
        <tr>
            <th> Nombre </th>
            <th> Apellido </th>
            <th> Documento </th>
        </tr>
        @for ($i = 1; $i <= Session::get('cantAdultos') + Session::get('cantMenores') + Session::get('cantBebes'); $i++)   
        <div>     
            {{ $apellidoPasajero = 'apellidoPasajero' . $i }}
            {{ $nombrePasajero = 'nombrePasajero' . $i }}
            {{ $documentoPasajero = 'documentoPasajero' . $i }}
        </div>
        <tr>
            <td> {{ $request->$nombrePasajero }} </td>
            <td> {{ $request->$apellidoPasajero }} </td>
            <td> {{ $request->$documentoPasajero }} </td>
        </tr>
        @endfor
    </table><br>
    <h2>Precio final: ${{ number_format(Session::get('total'), 000, '.', '.') }}</h2>
</body>
</html>