<?php

define('DIRIMG', './img');

function rutasImag($ruta)
{

	$rutas  = [];

	if (is_dir($ruta)) {
		if ($dh = opendir($ruta)) {
			$arratExt = ["jpg", "png", "tif"];
			while (($file = readdir($dh)) !== false) {
				if(!($file == '.' || $file == '..')) {
					$ext = pathinfo($file, PATHINFO_EXTENSION);
					if(in_array($ext, $arratExt)) 
					$rutas[] = $ruta . '/' . $file;
				} 
					

			}
			closedir($dh);
		}
	}


	return $rutas;
}

function dibujarImagenes()
{
	$imagenes = rutasImag(DIRIMG);
	$rand = array_rand($imagenes, $_POST['cantFotos']);

	foreach ($rand as $value) {
		$img = $imagenes[$value];
		$rutaImg = $img;
		$ext = pathinfo($img, PATHINFO_EXTENSION);
		$name = basename($img, $ext);
		$fileName = $name . $ext;
		echo <<<HTML
		<label>
			<img src=$rutaImg alt=$name>
		</label>
		<div>
			<input type="checkbox" name="fotos[]" id="$name" value=$fileName>
			<label for=$name>Me gusta</label>
		</div>

	HTML;
	}

}


function dibujarPagina(){
	if(isset($_POST['valorar'])){

	}else {
		if (isset($_POST['cantFotos'])) {
			dibujarImagenes($_POST['cantFotos'], DIRIMG);
			echo '	<input type="submit" name="valorar" value="ENVIAR VALORACIONES">';
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
	<title>Seleciona cantidada - Ejer 2</title>
	<style>
		form {
			display: grid;
			width: 500px;
			grid-template-columns: repeat(2, auto);
			align-items: center;
		}

		img {
			width: 100%;
			height: auto;
		}
	</style>
</head>

<body>
	<h1></h1>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

		<?php


dibujarPagina();
		?>



	
	</form>


</body>

</html>