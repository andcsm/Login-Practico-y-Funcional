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


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registrar Nuevo Usuario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container" style="margin-top: 100px;">
      <div class="row justify-content-center">
        <div class="col-md-5 col-md-offset-3" align="center">
          <h1>Nuevo Usuario</h1><br><br>
          <form>
            <input class="form-control" type="text" name="email" placeholder="E-mail" id="email"><br>
            <input class="form-control" type="password" name="password" placeholder="Contraseña" id="password"><br>
            <input class="form-control" type="password" name="confirmPassword" placeholder="Confirmar Contraseña" id="confirmPassword"><br>
            <button class="btn btn-primary form-control" type="submit">Registrar</button>
            <div id="response"></div>
          </form>
        </div>
      </div>
    </div>
    
    <script src="app.js" charset="utf-8"></script>
  </body>
</html>