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
                        "<input type='checkbox' onChange='obtenerVuelos()' name='pasajero" + i + "' id='pasajero" + i + "' value = '" + obj[i].nombrePasajero+" "+obj[i].apellidoPasajero + "'>" +
                        "<label class='ps-2 form-check-label' for='pasajero" + i + "'>" + obj[i].nombrePasajero +" "+obj[i].apellidoPasajero+"</label>" +
                        "</div>";
                }
                filtro2.innerHTML = pasajeros;
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
    var checkboxes = document.querySelectorAll('input[type=checkbox]:checked');
    var nroPasajeros = checkboxes.length;

    if (nroPasajeros > 0) {
    peticion.open("GET", "http://localhost/vuelos24/public/php/api.php?opcion=2&nroPasajeros=" + nroPasajeros + "&claseBoleto=" + claseBoleto + "&nroVuelo=" + nroVuelo + "&origenVuelo=" + origenVuelo + "&destinoVuelo=" + destinoVuelo, true);
    peticion.onreadystatechange = cargarResultados;
    peticion.send(null);

    function cargarResultados() {
        var filtro3 = document.getElementById("vuelos");
        if (peticion.readyState == 4) {
            if (peticion.status == 200) { //Se proceso la peticion
                obj = JSON.parse(peticion.responseText); //.responseText;
                // console.log(peticion.responseText)

                // campos
                vuelos = "<option selected>Seleccione un vuelo</option>";

                for (var i = 0; i < obj.length; i++) {
                    vuelos += "<option value='"+ obj[i].nroVuelo +"'>" + obj[i].nroVuelo +" "+ obj[i].fechaVuelo +" "+ obj[i].horaVuelo + "</option>";
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
