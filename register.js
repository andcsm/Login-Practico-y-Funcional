// Obtenemos el formulario y el div con sus respectivos ID´s
var form = document.getElementById('register-form');
var response = document.getElementById('response');

// Monitoremos los eventos del formulario para saber cuendo hacen un submit
form.addEventListener('submit', function(event){
    
    //Se detinen las acciones por defecto del formulario al hacer submit
    event.preventDefault();

    //Obtenemos los datos ingresados en los campos del formulario
    var userData = new FormData(form);
    console.log(userData.get('submit'));

    //Usamos el metodo Fetch API para enviar al servidor los datos de usuario a verifivar
    fetch('register-user.php',{
        method: 'POST',
        body: userData
    })
        .then( res => res.json())
        .then( data => {
            if(data === 'Registed'){
                showResponse(0, 'Registrado con exito con exito');
            }else{
                showResponse(1, data);
            }
        });
});