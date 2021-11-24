<?php
//Uso un header para tener permiso a acceder a los archivos
header("Access-Control-Allow-Origin: *");

//conexión a la base de datos
$servidor = 'localhost';
$usuario = 'root';
$password = '';
$db = 'vuelos24';

//Metodos
$conexion = new mysqli($servidor, $usuario, $password, $db) or die("error al conectarse");

//Obtengo la opción que elegí cuando hago el llamado
if (isset($_GET["opcion"]) && $_GET["opcion"] != "") {
    $opcion = $_GET["opcion"];
} else {
    $opcion = 0;
    $sql = NULL;
}

//Realizo un switch, ya que como en mi caso necesitare varias opciones de búsqueda; esto, depende de la variable opción
switch ($opcion) {

    case 1: // Obtener pasajeros segun la clase y nroVuelo
        if (isset($_GET["claseBoleto"])) {
            $claseBoleto = $_GET["claseBoleto"];
            $nroVuelo = $_GET["nroVuelo"];
            $estadoBoleto = "activo";
            $sql = "SELECT codCliente, nombrePasajero, apellidoPasajero, documentoPasajero, tipoBoleto, estadoBoleto FROM boleto WHERE nroVuelo = '" . $nroVuelo . "' AND claseBoleto = '" . $claseBoleto . "' AND estadoBoleto != '".$estadoBoleto."'";
        } else {
            $sql = NULL;
        }
        break;
    case 2: //obtener vuelos disponibles segun la clase, origen y destino
        if (isset($_GET["claseBoleto"]) & $_GET["nroPasajeros"] > 0) {
            $claseBoleto = $_GET["claseBoleto"];
            $nroPasajeros = $_GET["nroPasajeros"];
            $origenVuelo = $_GET["origenVuelo"];
            $destinoVuelo = $_GET["destinoVuelo"];
            $nroVuelo = $_GET["nroVuelo"];
            $sql = "SELECT nroVuelo, fechaVuelo, horaVuelo FROM vuelosdisponibles WHERE origen = '" . $origenVuelo . "' AND destino = '" . $destinoVuelo . "' AND claseBoleto = '".$claseBoleto."' AND cantBoletosDisponible >= '".$nroPasajeros."'";
        } else {
            $sql = NULL;
        }
        break;
    default:
        $sql = NULL;
        break;
}

//Realizo la consulta
if ($sql) {
    $result = $conexion->query($sql);

    //Creo un array.
    $pasajeros = array();

    //Pregunto si la consulta es correcta.
    if ($result) {
        while ($pasajero = mysqli_fetch_assoc($result)) {
            //Guardo los resultados mapeados en el array creado
            array_push($pasajeros, $pasajero);
        }
        //Codifico el array anterior en una variable para que lo retorne
        $res = json_encode($pasajeros, JSON_PRETTY_PRINT);
    } else {
        //Si la consulta no se hizo me retorna la variable como null
        $res = null;
        echo "Error de acceso a la API";
    }

    //Cierro la consulta
    $conexion->close();

    //Imprimo la variable con el array codificado
    echo $res;
} else {
    echo "Error de acceso a la API";
}
