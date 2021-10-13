<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="Description" content="Enter your description here" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<title>Ejercicio 2</title>
</head>

<body>
	<?php

	if (isset($_GET['error'])) {

		echo <<<HTML
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
				Las credenciales son incorrectas!
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		HTML;
	}
	?>
	<div class="conteiner mt-5">
		<div class="row justify-content-center">
			<div class="col-8">
				<form action="autenticacion.php" method="POST">
					<div class="mb-3">
						<label for="username" class="form-label">Usuario</label>
						<input type="text" class="form-control" name="username" id="username">
					</div>
					<div class="mb-3">
						<label for="pass" class="form-label">Contraseña</label>
						<input type="password" class="form-control" name="pass" id="pass">
					</div>
					<input type="submit" name="socio" class="btn btn-primary" value="Acesso Socio">
					<input type="submit" name="invitado" class="btn btn-warning" value="Acesso Invitado">
				</form>
			</div>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>