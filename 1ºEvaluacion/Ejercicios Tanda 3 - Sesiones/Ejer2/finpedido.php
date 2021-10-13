<?php
include 'utils/libmenu.php';
session_start()
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
	<title>
		Final del pedido
	</title>
</head>

<body>


	<div class="container mt-5">
		<div class="row justify-content-center">

			
			<div class="col-3 card">
				<div class="card-body">
					<h3>Su eleccion:</h3>
					<?php
					$precioBruto = 0;
					if (isset($_SESSION['userdata']['comanda'])) {
						foreach ($_SESSION['userdata']['comanda'] as $key => $value) {
							$precio = getPlatePrice($value);
							$precioBruto = $precioBruto + intval($precio);
							echo '<ul>';
							echo "<li><strong class='text-uppercase'>$key</strong> </li>";
							echo '<ul>';
							echo "<li>$value - ". $precio ." €</li>";
							echo '</ul>';
							echo '</ul>';
						}
						if(isset($_SESSION['userdata']['descuento']) && $_SESSION['userdata']['descuento'] > 0){
							$descuento =intval($_SESSION['userdata']['descuento']);
							$precioConDescuento = $precioBruto - ($precioBruto * ($descuento/100));
							echo "<strong>El precio total es: <strike class='text-danger'>$precioBruto €</strike> $precioConDescuento €  </strong>";
						}else {
							echo "<strong>El precio total es: $precioBruto €</strong>";
						}
					}

					?>
					<a href="pedido.php?resetPlate" class="btn btn-success">Hacer otro pedido</a>
				</div>
			</div>
		</div>


		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>