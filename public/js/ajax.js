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

                for (var i = 0; i < obj.length; i++) {
                    pasajeros += "<div class='form-check my-3 mx-2'>" +
                        "<input type='checkbox' onChange='obtenerVuelos()' name='nombrePasajero" + i + "' id='nombrePasajero" + i + "' value = '" + obj[i].nombrePasajero + " " + obj[i].apellidoPasajero + "'>" +
                        "<input type='hidden' name='documentoPasajero" + i + "' id='documentoPasajero" + i + "' value = '" + obj[i].documentoPasajero +"'>" +
                        "<label class='ps-2 form-check-label' for='nombrePasajero" + i + "'>" + obj[i].nombrePasajero + " " + obj[i].apellidoPasajero + "</label>" +
                        "<label class='ps-2 form-check-label' for='documentoPasajero" + i + "'>" + obj[i].documentoPasajero + "</label>" +
                        "</div>";
                }
                filtro2.innerHTML = pasajeros;
                var filtro3 = document.getElementById("vuelos");
                vuelos = "";
                filtro3.innerHTML = vuelos;
            }
        }
    }
    
}

function obtenerVuelos() {
    var peticion = ObtenerXHR();
    var claseBoleto = document.getElementById("claseBoleto").value;
    var origenVuelo = document.getElementById("origenVuelo").value;
    var destinoVuelo = document.getElementById("destinoVuelo").value;
    var nroVuelo = document.getElementById("nroVuelo").value;
    var nroPasajeros = document.querySelectorAll('input[type=checkbox]:checked').length;

    if (nroPasajeros > 0) {
        peticion.open("GET", "http://localhost/vuelos24/public/php/api.php?opcion=2&nroPasajeros=" + nroPasajeros + "&claseBoleto=" + claseBoleto + "&nroVuelo=" + nroVuelo + "&origenVuelo=" + origenVuelo + "&destinoVuelo=" + destinoVuelo + "&nroVuelo=" + nroVuelo, true);
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

                        vuelos += "<div class='card' style='width: 18rem;'>" +
                            "<div class='card-body'>" +

                            "<input type='hidden' id='vuelo" + (i + 1) + "' name='vuelo" + (i + 1) + "' value='" + obj[i].nroVuelo + "'>" +
                            "<input type='hidden' id='fechaVuelo" + (i + 1) + "' name='fechaVuelo" + (i + 1) + "' value='" + obj[i].fechaVuelo + "'>" +
                            "<input type='hidden' id='horaVuelo" + (i + 1) + "' name='horaVuelo" + (i + 1) + "' value='" + obj[i].horaVuelo + "'>" +

                            "<h5 class='card-title text-center'>Vuelo Nro " + obj[i].nroVuelo + "</h5>" +
                            "<hr>"+
                            "<p>Fecha del Vuelo: " + obj[i].fechaVuelo + "</p>" +
                            "<p>Hora del Vuelo: " + obj[i].horaVuelo + "</p>" +
                            "<a type='submit' class='btn btn-primary'>Reasignar pasajeros a este vuelo</a>" +
                            "</div>" +
                            "</div>";
                    }
                    filtro3.innerHTML = vuelos;
                }
            }
        }
    } else {
        var filtro3 = document.getElementById("vuelos");
        vuelos = "";
        filtro3.innerHTML = vuelos;
    }
}
