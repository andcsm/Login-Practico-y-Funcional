<?php
	require "connection.php";
    $conn = new Conexion();

    $response = "";

	$email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    if ($email == "") {
    	$response = json_encode('Introduce una dirección de correo electrónico');
    	exit($response);
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	$response = json_encode('Dirección de correo electrónico invalido');
    	exit($response);
    }

    if ($password == "") {
    	$response = json_encode('Introducir una contraseña');
    	exit($response);
    }

	
	$sql = $conn->query("SELECT email, password FROM users WHERE email = '$email';");

	if ($sql->num_rows == 1) {
		$data = $sql->fetch_array();
		if (password_verify($password, $data['password'])) {
			$_SESSION['email'] = $data['email'];
			header('lodation: dashborad.php');
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





?>