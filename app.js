
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

// Función para validar los emails
function validEmail(email){
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (re.test(String(email).toLowerCase())) {
    return true;
  } else {
    return false;
  }
}


//Funcion para validar campos vacios
function emptyInput(input) {
	if (input == "") {
		return true;
	} else {
		return false;
	}
}


//Funcion para colorear borde de campos de formulario
function borderedBox(index, goodOrBad) {
	if (goodOrBad == 0) {
		form[index].className = "form-control my-3 border border-success";
	} else if (goodOrBad == 1) {
		form[index].className = "form-control my-3 border border-danger";
	} else {
		form[index].className = "form-control my-3";
	}
}