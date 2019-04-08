
//Función para desplegar los mensages de error o exito usando el div con clase "response"
function showResponse(goodOrBad, msg) {
    if (goodOrBad == 0) {
        response.className = "alert alert-success mt-5";
    }else {
        response.className = "alert alert-danger mt-5";
    }
    response.innerHTML = msg;
    setTimeout(hideResponse, 3000)
}

//Función para ocultar las respuestas del servidor
function hideResponse () {
    response.className = "d-none";
}