
// Obtenemos el formulario y el div con sus respectivos ID´s
var form = document.getElementById('login-form');
var response = document.getElementById('response');

// Monitoremos los eventos del formulario para saber cuendo hacen un submit
form.addEventListener('submit', function(event){
    
    //Se detinen las acciones por defecto del formulario al hacer submit
    event.preventDefault();

    //Obtenemos los datos ingresados en los campos del formulario
    var userData = new FormData(form);

    //Usamos el metodo Fetch API para enviar al servidor los datos de usuario a verifivar
    fetch('verify-user.php',{
        method: 'POST',
        body: userData
    })
        .then( res => res.json())
        .then( data => {
            if(data === 'logedin'){
                showResponse(0, 'Logeado con exito');
            }else{
                showResponse(1, data);
            }
        });
});

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