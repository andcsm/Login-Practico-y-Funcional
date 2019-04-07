<?php

  require "connection.php";
  $conn = new Conexion();

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
?>


<!doctype html>
<html lang="en">

  <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"crossorigin="anonymous">

      <title>Registrar Usuario</title>
  </head>

  <body>

    <div class="container">
        <div class="row d-md-flex flex-column justify-content-center">
            <div class="col-md-6 text-center">
              <h2>Formulario para registro de usuario</h2>
              <form>
                <input class="form-control" type="text" name="email" placeholder="E-mail" id="email">
                <input class="form-control" type="password" name="password" placeholder="Contraseña" id="password">
                <input class="form-control" type="password" name="confirmPassword" placeholder="Confirmar Contraseña" id="confirmPassword">
                <button class="btn btn-primary form-control" type="submit">Registrar</button>
              </form>
              <div id="response">
                 <!-- Este div es para desplegar las respuestas que envie el servidor -->
              </div>
        </div>
      </div>
    </div>
    
    <script src="app.js" charset="utf-8"></script>
  </body>
</html>