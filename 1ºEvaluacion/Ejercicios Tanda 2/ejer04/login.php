<?php
	if(isset($_GET['error'])){
		$error_msg = $_GET['error'];
		echo <<<HTML
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				$error_msg
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		HTML;
	}
?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>


	<main>

		<div class="container">
			<form action="validacion.php" method="post" class="mt-5">
				<div class="row mb-3">
					<label for="usuario" class="col-sm-2 col-form-label">User</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="usuario" name="usuario">
					</div>
				</div>
				<div class="row mb-3">
					<label for="password" class="col-sm-2 col-form-label">Password</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="password" name="password">
					</div>
				</div>
			

				<input type="submit" name="login" id="login" class="btn btn-primary">
			</form>
		</div>

	</main>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>