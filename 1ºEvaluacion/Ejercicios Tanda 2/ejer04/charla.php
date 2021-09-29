<?php
include 'utils.php';

if (isset($_POST['chateando']) && isset($_POST['mensaje']) && !empty($_POST['mensaje']) && isset($_POST['usuario'])) {
	$line = $_POST['usuario'] . ": " .$_POST['mensaje'];
	addLineToFile("charla.txt", $line);
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

		<div class="container mt-5">
			<div class="row justify-content-center">

				<div class="col-6">
				<iframe class="w-100 h-100" src="contenido_charla.php"></iframe>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
						<span>User: <?php 
								if(isset($_GET['usuario'])){
									echo $_GET['usuario'];
								}else {
									echo $_POST['usuario'];
								}
							?></span>
						<div class="input-group mb-3">
							<input type="text" id="mensaje" name="mensaje" class="form-control" placeholder="Message...">
							<input type="hidden" name="usuario" value="<?php 
								if(isset($_GET['usuario'])){
									echo $_GET['usuario'];
								}else {
									echo $_POST['usuario'];
								}
							?>">
							<input class="btn btn-outline-secondary" type="submit" id="chateando" name="chateando">
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>