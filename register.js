// Obtenemos el formulario y el div con sus respectivos ID´s
var form = document.getElementById('register-form');
var response = document.getElementById('response');

console.log(form[1]);

// Monitoremos los eventos del formulario para saber cuendo hacen un submit
form.addEventListener('submit', function(event){
    
    //Se detinen las acciones por defecto del formulario al hacer submit
    event.preventDefault();

    //Obtenemos los datos ingresados en los campos del formulario
    var userData = new FormData(form);

    //Validamos el email
    if (!validEmail(userData.get('email'))) {
        borderedBox(0,1);
        showResponse(1, 'Introduce una dirección de correo electrónico valida');
        return false;
    } else {
        borderedBox(0,0);
    }

    //Validmos la contraseña
    if (emptyInput(userData.get('password'))) {
        borderedBox(1,1);
        showResponse(1, 'Introduce una contraseña');
        return false;
    } else {
        borderedBox(1,0);
    }

    //Validamos la confirmación de la contraseña
    if (emptyInput(userData.get('confirmPassword'))) {
        borderedBox(2,1);
        showResponse(1, 'Confirma la contraseña');
        return false;
    } else {
        borderedBox(2,0);
    }

    //Validamos que las contraseñas coincidan
    if (userData.get('password') != userData.get('confirmPassword')) {
        borderedBox(1,1);
        borderedBox(2,1);
        showResponse(1, 'Las contraseñas no coinciden');
        return false;
    } else {
        borderedBox(1,0);
        borderedBox(2,0);
    }

    //Usamos el metodo Fetch API para enviar al servidor los datos de usuario a verifivar
    fetch('register-user.php',{
        method: 'POST',
        body: userData
    })
        .then( res => res.json())
        .then( data => {
            if(data === 'Registed'){
                form.reset();
                borderedBox(0,2);
                borderedBox(1,2);
                borderedBox(2,2);
                showResponse(0, 'Registrado con exito con exito');
            }else{
                borderedBox(0,2);
                borderedBox(1,2);
                borderedBox(2,2);
                showResponse(1, data);
            }
        });
});