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