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
    $confirmPassword = $conn->real_escape_string($_POST['confirmPassword']);

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

    #Verificar que la confirmación del password no este vacio
    if ($confirmPassword == "") {
      $response = json_encode('Confirme su contraseña');
      exit($response);
    }

    #Verificar que el password y el comfirmPassword sean iguales
    if ($password !== $confirmPassword) {
      $response = json_encode('Las contraseñas no coinciden');
      exit($response);
    }

    $response = json_encode('Registed');
    exit($response);
  }

  #Si no exite la variable se redireciona al usuario y se termina la ejecución del script
  header("location: register-user.html");
  exit();
?>