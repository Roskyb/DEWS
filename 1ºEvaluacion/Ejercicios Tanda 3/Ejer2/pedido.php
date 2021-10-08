<?php
session_start();
if (!isset($_SESSION['userdata'])) {
	header('Location: ./entrada.php');
}


if (isset($_GET['tipo']) && isset($_GET['plato'])) {
	$_SESSION['userdata']['comanda'][$_GET['tipo']] = $_GET['plato'];
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
			<div class="col-3">
				<h3>Haga su pedido</h3>
				<ul class="list-group">
					<?php
					$tipos_platos = ['primero', 'segundo', 'postre', 'bebida'];
					foreach ($tipos_platos as $plato) {
						$url = './pedido_plato.php?tipo=' . $plato;
						$title = ucfirst($plato);
						echo <<<HTML
								<li class="list-group-item"><a href=$url>$title</a></li>
							HTML;
					}
					?>
				</ul>
			</div>
			<div class="col-6">
				<h3>Su eleccion:</h3>
				<div class="card">
					<div class="card-body">
						<?php
						foreach ($_SESSION['userdata']['comanda'] as $key => $value) {
							echo '<ul>';
							echo "<li><strong class='text-uppercase'>$key</strong> </li>";
							echo '<ul>';
							echo "<li>$value</li>";
							echo '</ul>';
							echo '</ul>';
						}

						echo "<a href='finpedido.php' class='btn btn-warning'><strong>QUE ME LO TRAIGA UN NEGRO EN BICI 🥵</strong></a>"
						?>
					</div>

				</div>

			</div>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>