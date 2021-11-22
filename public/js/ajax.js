function ObtenerXHR() {
    req = false;
    if (window.XMLHttpRequest) {
        req = new XMLHttpRequest();
    } else {
        if (window.ActiveXObject) {
            req = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return req;
}

function obtenerPasajeros() {

    var peticion = ObtenerXHR();
    var claseBoleto = document.getElementById("claseBoleto").value;
    var nroVuelo = document.getElementById("nroVuelo").value;

    peticion.open("GET", "http://localhost/vuelos24/public/php/api.php?opcion=1&claseBoleto="+claseBoleto+"&nroVuelo="+nroVuelo, true);
    peticion.onreadystatechange = cargarResultados;
    peticion.send(null);

    function cargarResultados() {
        var filtro2 = document.getElementById("pasajeros");
        if (peticion.readyState == 4) {
            if (peticion.status == 200) { //Se proceso la peticion
                obj = JSON.parse(peticion.responseText); //.responseText;
                // console.log(peticion.responseText)

                // campos
                pasajeros = "";

                for (var i = 0; i < obj.length; i++) {
                    pasajeros += "<input type='checkbox'>" + obj[i].nombrePasajero + "</input>";
                }
                filtro2.innerHTML = pasajeros;
            }
        }
    }
}