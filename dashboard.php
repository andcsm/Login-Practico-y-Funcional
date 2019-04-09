<?php
	require "verify-authentication.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Dasboard</title>
  </head>
  <body>

  	<!-- Barra de menus -->
	<nav class="navbar navbar-dark bg-dark">
	  <a class="navbar-brand" href="#">
	    <img src="girl.svg" width="30" height="30" class="d-inline-block align-top" alt="user-avatar">
	    Bienvenido <span id="user"><?php echo $_SESSION['email'];?></span>
	  </a>
	</nav>

	<div class="d-flex justify-content-center align-items-center vh-100">
		<div class="jumbotron">
		  <h1 class="display-4">Holla, <?php echo $_SESSION['email'];?>!</h1>
		  <p class="lead">Bien hecho. Si has llegado hasta aqui significa que has instalado correctamente el login en tu sitio web. Ahora puedes mejorarlo y adaptarlo a tu gusto o requerimientos.</p>
		  <hr class="my-4">
		  <p>Recuerda hacer recomendaciones para el proyecto.</p>
		  <a class="btn btn-primary btn-lg" href="logout.php" role="button">Cerrar Sesión</a>
		</div>
	</div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>