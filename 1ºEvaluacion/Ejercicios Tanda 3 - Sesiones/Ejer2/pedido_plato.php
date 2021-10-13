<?php
include 'utils/libmenu.php';
session_start();
if (!isset($_SESSION['userdata'])) {
	header('Location: ./entrada.php');
} else if (isset($_GET['tipo'])) {
	$tipo = $_GET['tipo'];
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
	<title>Pedido</title>
</head>

<body>
	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-8">
				<div class="card">
					<div class="card-body">
						<form action="pedido.php" method="GET">
							<small class="text-danger">
								<?php 
								if(isset($_SESSION['userdata']['comanda'][$_GET['tipo']])){
									$plato_viejo = $_SESSION['userdata']['comanda'][$_GET['tipo']];
									echo "Estas a punto de cambiar $plato_viejo por:";
								}
								?>
							</small>
							<select class="form-control" name="plato" id="plato">
								<?php
								$platos = getPlatesByType($tipo);
								foreach ($platos as $key => $value) {
									$title = $key . ' - ' . $value['precio'] . '€';
									echo <<<HTML
											<option value=$key>$title</option>
										HTML;
								}

								?>
							</select>
							<input type="hidden" name="tipo" value="<?php echo $tipo ?>">
							<input class="btn btn-success mt-2" type="submit" value="<?php echo 'Elegir '.$tipo ?>">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>



	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>