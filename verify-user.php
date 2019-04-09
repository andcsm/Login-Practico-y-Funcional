<?php
    #Verificar que existe la variable para poder iniciar la validación y procesamiento
    if (isset($_POST['email'])) {

        #llamar al archivo que nos conecta con la bade de datos
        require "connection.php";
        #Crear una nueva conexión
        $conn = new Conexion();

        #Variable donde se almacenara la respuesta del servidor
        $response = "";


        #Recibir los datos del formulario y escaparlos de caracteres especiales
        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);

        #Verificar que el email no este vacio
        if ($email == "") {
            $response = json_encode('Introduce una dirección de correo electrónico');
            exit($response);
        }

        #Verificar que el email sea valido
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response = json_encode('Dirección de correo electrónico invalido');
            exit($response);
        }

        #Verificar que el password no este vacio
        if ($password == "") {
            $response = json_encode('Introducir una contraseña');
            exit($response);
        }

        #Consultar en la base de datos si los datos ingresados existen, para compararlos con los ingresados
        $sql = $conn->query("SELECT email, password FROM users WHERE email = '$email';");

        if ($sql->num_rows == 1) {
            $data = $sql->fetch_array();
            if (password_verify($password, $data['password'])) {
                session_start();
                $_SESSION['email'] = $data['email'];
                $response = json_encode('logedin');
                exit($response);
            }else {
                $response = json_encode('Contraseña Incorrecta. Vuelve a intentarlo.');
                exit($response);
            }
        }else {
            $response = json_encode('Dirección de correo electrónico no encontrada');
            exit($response);
        }
    }

    #Si no exite la variable se redireciona al usuario y se termina la ejecución del script
    header("location: index.html");
    exit();
?>