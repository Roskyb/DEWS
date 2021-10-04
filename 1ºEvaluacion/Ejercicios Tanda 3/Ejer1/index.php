<?php
session_start();

function validarNombre($nombre)
{
	foreach (str_split($nombre) as $letra) {
		if (ctype_digit($letra)) {
			return false;
		}
	}
	return true;
}

if (isset($_GET['clear'])) {
	unset($_SESSION['lista']);
	session_destroy();
} else {
	if (isset($_POST['add'])) {
		if (isset($_POST['nombre']) && !empty($_POST['nombre'])) {

			if (validarNombre($_POST['nombre'])) {
				if (isset($_SESSION['lista'])) {
					$_SESSION['lista'][] = $_POST['nombre'];
				} else 	$_SESSION['lista'] =  [$_POST['nombre']];
			} else {
				$errMsg = "El nombre solo puede contener letras y espacios!";
			}
		}
	}

	if (isset($_POST['delete'])) {
		if (isset($_POST['nombre']) && !empty($_POST['nombre'])) {
			if (isset($_SESSION['lista'])) {
				if (($key = array_search($_POST['nombre'], $_SESSION['lista'])) !== false) {
					unset($_SESSION['lista'][$key]);
				}
			}
		}
	}
}




?>

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
	<title>Ejer 1</title>
</head>

<body>
	<?php
	if(isset($errMsg)){
		echo <<<HTML
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			$errMsg
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		HTML;
	}


	?>
	<div class="container mt-5">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<div class="form-group">
				<label class="form-labe" for="nombre">Escriba algún nombre:</label>
				<input type="text" name="nombre" class="form-control">
			</div>
			<input class="btn btn-primary mt-3" type="submit" name="add" value="Añadir">
			<input class="btn btn-secondary mt-3" type="submit" name="delete" value="Borrar">
		</form>
	</div>

	<div class="container mt-5">
		<h6>Datos introducidos:</h6>
		<ul>
			<?php

			if (isset($_SESSION['lista'])) {
				foreach ($_SESSION['lista'] as $value) {
					echo "<li>$value</li>";
				}
			}
			?>
		</ul>
		<?php
		if (isset($_SESSION['lista'])) {
			echo '<a href="index.php?clear">Cerrar sesion, se perderan los datos de la lista </a>';
		}

		?>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>