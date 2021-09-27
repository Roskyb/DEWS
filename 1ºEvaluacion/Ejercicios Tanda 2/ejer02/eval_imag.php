<?php

define('DIRIMG', './img');

function rutasImag($ruta)
{

	$rutas  = [];

	if (is_dir($ruta)) {
		if ($dh = opendir($ruta)) {
			$arratExt = ["jpg", "png", "tif"];
			while (($file = readdir($dh)) !== false) {
				if (!($file == '.' || $file == '..')) {
					$ext = pathinfo($file, PATHINFO_EXTENSION);
					if (in_array($ext, $arratExt))
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


function dibujarPagina()
{
	if (isset($_POST['valorar'])) {
	} else {
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
	<title>Seleciona cantidad - Ejer 2</title>
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
		if (isset($_POST['valorar']) && isset($_POST['fotos'])) {
			if (count($_POST['fotos']) > 0) {
				$ip = $_SERVER["REMOTE_ADDR"];
				$lineaNueva = $ip . ": ";
				$filePath = './log.txt';
				foreach ($_POST['fotos'] as $foto) {
					$lineaNueva .= $foto . " ";
					echo "fajs";
				}
				$file = fopen($filePath, "a");
				fwrite($file, "\n");
				fwrite($file, $lineaNueva);
				fclose($file);

				echo "<h1>Gracias por valorar las imagenes</h1><br>";
				echo "<a href='./select_cantidad.php'>Go home</a>";
			} else {
				echo "<h1>SENTIMOS QUE SU GUSTO SEA UNA MIERDA </h1><br>";
				echo "<a href='./select_cantidad.php'>SI QUIERE RECCTIFICAR CLICK AQUI</a>";
			}
		} else {
			dibujarPagina();
		}
		?>




	</form>


</body>

</html>