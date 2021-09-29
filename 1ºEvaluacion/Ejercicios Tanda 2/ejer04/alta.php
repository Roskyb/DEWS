<?php
include 'utils.php';

//
$errorMsg  ="";
if (!isset($_GET['registered'])) {
	if (
		isset($_POST['usuario']) && !empty($_POST['usuario']) &&
		isset($_POST['password']) && !empty($_POST['password'])
	) {

		$usuario = $_POST['usuario'];
		$pass = $_POST['password'];
		$users = getUsers(false);
		
		if (in_array($usuario, $users)) {
			$errorMsg = "El usuario ya existe! Prueba con otro nombre";
		}else {
			addLineToFile('usuarios.txt', $usuario . ":" . $pass);
			$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$msg = "?registered=true";
			header('Location: ' . $url.$msg);
		}
	}
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

	<main>

		<div class="container">

			<?php if (!isset($_GET['registered'])) : ?>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="mt-5">
					<h2>Registrate</h2>
					<div class="row mb-3">
						<label for="usuario" class="col-sm-2 col-form-label">User</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="usuario" name="usuario">
							<?php
							errorMessage($errorMsg)
							?>

						</div>

					</div>
					<div class="row mb-3">
						<label for="password" class="col-sm-2 col-form-label">Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" id="password" name="password">
						</div>
					</div>


					<input type="submit" name="register" id="register" class="btn btn-primary">
				</form>
			<?php endif; ?>


			<?php if (isset($_GET['registered'])) : ?>
				<h1>Usuario registrado correctamente</h1>
				<a href="login.php">Ir al chat</a>
			<?php endif; ?>


		</div>
	</main>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>