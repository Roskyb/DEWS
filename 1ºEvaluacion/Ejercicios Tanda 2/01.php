
<?php 


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicio 01</title>
</head>

<body>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<label for="textoCrudo">Texto a Cifrar:</label>
		<input type="text" name="textoCrudo" id="textoCrudo" value="<?php echo (textCorrecto() ? $_POST['textoCrudo'] : ' ') ?>">
		<?php

		?>
		<br>

		<label>Desplazamiento</label><br>
		<input type="radio" id="d3" name="desplazamiento" value="3">
		<label for="d3">3</label>
		<br>
		<input type="radio" id="d5" name="desplazamiento" value="5">
		<label for="d5">5</label>
		<br>
		<input type="radio" id="d10" name="desplazamiento" value="10">
		<label for="d10">10</label>
		<input type="submit" name="cesar" value="CIFRADO CESAR">

		<?php

		if (isset($_POST['cesar'])  && !(isset($_POST['desplazamiento']))) echo "¡Elige un valor de desplazamiento😡!";
		?>
		<br>
		<br>

		<label for="fichClave">Fichero de clave</label>
		<select name="fichClave" id="fichClave">
			<?php
			$dir = "./cifrados";
			if (is_dir($dir)) {
				if ($dh = opendir($dir)) {
					while (($file = readdir($dh)) !== false) {
						if (!($file == '.' || $file == '..')) echo "<option value=\"$file\">" . $file . "</option>";
					}
					closedir($dh);
				}
			}
			?>
		</select>
		<input type="submit" name="sustitucion" value="CIFRADO POR SUSTITUCIÓN">
	</form>

	<div>
		<?php

		if (isset($_POST['cesar'])) {
			if (strlen($_POST['textoCrudo']) > 0 && isset($_POST['desplazamiento'])) {
				$textoCrudo = $_POST['textoCrudo'];
				$textoCrifrado = "";
				$desp = $_POST['desplazamiento'];
				for ($i = 0; $i < strlen($textoCrudo); $i++) {
					$textoCrifrado = $textoCrifrado . (chr(mb_ord($textoCrudo[$i]) + $desp));
				}

				echo $textoCrudo . " => " . $textoCrifrado;

			}
		}


		if (isset($_POST['sustitucion'])) {

			$filePath = $dir . "/" . $_POST['fichClave'];
			$claveCifrado = "";
			$handle = fopen($filePath, "r");
			while (!feof($handle)) {
				$line = fgets($handle);
				$claveCifrado  = $line;
			}
			fclose($handle);

			if(strlen($claveCifrado) == 0) echo "Clave de cifrado no valida";
			else {
				
			}


		}

		?>
	</div>

</body>

</html>