<?php
include 'utils.php';

$temas = ['Politica', 'PH', 'ESPAÑA', 'Ingenieria'];


if (isset($_POST['jugar'])) {
	if (isset($_POST['preguntas'])) {
		$cont = 0;
		$repes = [];
		for ($i = 1; $i <= 8; $i++) {
			if (!empty($_POST['preguntas'][$i]['tema'] && !in_array($_POST['preguntas'][$i]['tema'], $repes))) {
				$repes[] = $_POST['preguntas'][$i]['tema'];
				$cont += 1;
			}
		}
		if ($cont < 3) {
			$errorMsg = "Debes elegir al menos 3 temas";
		}else {
			header('Location: jugar.php');
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
	<title>Jugar</title>
</head>

<body>
	<?php
	if (isset($errorMsg)) {
		echo <<<HTML
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				$errorMsg
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		HTML;
	}
	?>
	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-6">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
					<?php
					dibujarConfigurador();
					?>
					<input class="btn btn-primary w-100" type="submit" name="jugar" value="Enviar tipos">
				</form>
			</div>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>