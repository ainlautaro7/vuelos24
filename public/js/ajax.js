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

    peticion.open("GET", "http://localhost/vuelos24/public/php/api.php?opcion=1&claseBoleto=" + claseBoleto + "&nroVuelo=" + nroVuelo, true);
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
                total = obj.length;

                for (var i = 0; i < obj.length; i++) {
                    pasajeros += "<div class='form-check my-3 mx-2'>" +
                        "<input type='checkbox' onChange='obtenerVuelos()' name='documentoPasajero" + (i + 1) + "' id='documentoPasajero" + (i + 1) + "' value = "+obj[i].documentoPasajero+">" +
                        //"<input type='checkbox' onChange='obtenerVuelos()' name='documentoPasajero[]' id='documentoPasajero[]' value = "+obj[i].documentoPasajero+">" +
                        "<input type='hidden' name='nombrePasajero" + (i + 1) + "' id='nombrePasajero" + (i + 1) + "' value = '" + obj[i].nombrePasajero + "'>" +
                        // "<input type='hidden' name='documentoPasajero" + (i + 1) + "' id='documentoPasajero" + (i + 1) + "' value = '" + obj[i].documentoPasajero + "'>" +
                        "<input type='hidden' name='apellidoPasajero" + (i + 1) + "' id='apellidoPasajero" + (i + 1) + "' value = '" + obj[i].apellidoPasajero + "'>" +
                        "<input type='hidden' name='codCliente" + (i + 1) + "' id='codCliente" + (i + 1) + "' value = '" + obj[i].codCliente + "'>" +
                        "<input type='hidden' name='tipoBoleto" + (i + 1) + "' id='tipoBoleto" + (i + 1) + "' value = '" + obj[i].tipoBoleto + "'>" +
                        "<input type='hidden' name='estadoBoleto" + (i + 1) + "' id='estadoBoleto" + (i + 1) + "' value = '" + obj[i].estadoBoleto + "'>" +
                        "<label class='ps-2 form-check-label' for='nombrePasajero" + (i + 1) + "'>" + obj[i].nombrePasajero + " " + obj[i].apellidoPasajero + "</label>" +
                        "<label class='ps-2 form-check-label' for='documentoPasajero" + (i + 1) + "'>" + obj[i].documentoPasajero + "</label>" +
                        "</div>";
                }
                document.getElementById("cantPasajerosTotal").value = total;
                filtro2.innerHTML = pasajeros;
                var filtro3 = document.getElementById("vuelos");
                vuelos = "";
                filtro3.innerHTML = vuelos;
            }
        }
        document.getElementById("btnReasignar").disabled = true;
    }

}

function obtenerVuelos() {
    var peticion = ObtenerXHR();
    var claseBoleto = document.getElementById("claseBoleto").value;
    var origenVuelo = document.getElementById("origenVuelo").value;
    var destinoVuelo = document.getElementById("destinoVuelo").value;
    var nroVuelo = document.getElementById("nroVuelo").value;
    var fechaVuelo = document.getElementById("fechaVuelo").value;
    var nroPasajeros = document.querySelectorAll('input[type=checkbox]:checked').length;

    document.getElementById('cantPasajeros').value = nroPasajeros;


    if (nroPasajeros > 0) {
        peticion.open("GET", "http://localhost/vuelos24/public/php/api.php?opcion=2&nroPasajeros=" + nroPasajeros + "&claseBoleto=" + claseBoleto + "&nroVuelo=" + nroVuelo + "&origenVuelo=" + origenVuelo + "&destinoVuelo=" + destinoVuelo + "&nroVuelo=" + nroVuelo + "&fechaVuelo=" + fechaVuelo, true);
        peticion.onreadystatechange = cargarResultados;
        peticion.send(null);

        function cargarResultados() {
            var filtro3 = document.getElementById("vuelos");
            
            if (peticion.readyState == 4) {
                if (peticion.status == 200) { //Se proceso la peticion
                    obj = JSON.parse(peticion.responseText); //.responseText;
                    // console.log(peticion.responseText)

                    // campos
                    vuelos = "";

                    for (var i = 0; i < obj.length; i++) {

                        vuelos += "<label class='form-check-label mx-2' for='nroVueloSeleccionado" + (i + 1) + "'>" +
                            "<div class='card' style='width: 18rem;'>" +
                            "<div class='card-body'>" +
                            "<input class='form-check-input' type='radio' onChange='chequeado()' name='nroVueloSeleccionado' id='nroVueloSeleccionado" + (i + 1) + "' value='" + obj[i].nroVuelo + "'></input>" +
                            "<h5 class='card-title text-center'>Vuelo Nro " + obj[i].nroVuelo + "</h5>" +
                            "<hr>" +
                            "<p>Fecha del Vuelo: " + obj[i].fechaVuelo + "</p>" +
                            "<p>Hora del Vuelo: " + obj[i].horaVuelo + "</p>" +
                            "</div>" +
                            "</div>" +
                            "</label>";
                    }
                    filtro3.innerHTML = vuelos;
                }
            }
        }
    } else {
        var filtro3 = document.getElementById("vuelos");
        vuelos = "";
        filtro3.innerHTML = vuelos;
        document.getElementById("btnReasignar").disabled = true;
    }
}

function chequeado() {
    document.getElementById("btnReasignar").disabled = false;
}
