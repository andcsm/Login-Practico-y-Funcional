<?php

        require "connection.php";
        $conn = new Conexion();

        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);
        $confirmPassword = $conn->real_escape_string($_POST['confirmPassword']);

        if ($email != '' and $password != '' and $confirmPassword != '') {
          if (strlen($dane) < 10 or strlen($dane) > 15 or !is_numeric($dane)) {
            exit('Ingrese un DANE valido');
          } else {
            $sql = $conn->query("SELECT id FROM instituciones WHERE dane = '$dane'");
            if ($sql->num_rows > 0) {
              if (strlen($name) < 4 or strlen($name) > 50) {
                exit('El Nombre debe estar entre 4 y 50 caracteres');
              } else {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  if ($password == $confirmPassword) {
                    $sql = $conn->query("SELECT id FROM users WHERE email = '$email'");
                    if ($sql->num_rows > 0) {
                          exit('Este Email ya esta registrado');
                    } else {
                      $hash = password_hash($password, PASSWORD_BCRYPT);
                      $sql = "INSERT INTO users (name, email, password) VALUES ('".$name."','".$email."', '".$hash."')";
                      $conn->query($sql);
                      $sql = $conn->query("SELECT id FROM users WHERE email = '$email'");
                      while ($data = $sql->fetch_array()) {
                        $id = $data['id'];
                      }
                      $sql = "INSERT INTO user_ie (user_id, dane_ie) VALUES ('".$id."','".$dane."')";
                      $conn->query($sql);
                      $conn->close();
                      exit('1');
                    }
                  } else {
                    exit('Las contraseñas no coinciden');
                  }
                } else {
                  exit('Ingrese un Email valido');
                }
              }
            } else {
              exit('Este DANE no corresponde a ninguna sede');
            }
          }
        } else {
          exit('Por favor llene todos los campos del registro');
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