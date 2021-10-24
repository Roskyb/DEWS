<?php include 'cabecera.php' ?>
<?php

if (isset($_POST['login'])) {

	if (isset($_POST['username']) && isset($_POST['pass'])) {
		$inputUsername = $_POST['username'];
		$inputPass = $_POST['pass'];
		$queryString = "SELECT id, nombre, count(*) as cont FROM usuario WHERE username = \"$inputUsername\" and password = \"$inputPass\"";
		$result = mysqli_query($conn, $queryString);
		if (mysqli_errno($conn)) die(mysqli_error($conn));
		$res = mysqli_fetch_assoc($result);
		if ($res['cont'] == 1) {
			// creamos la sesion 
			$_SESSION['sesion_usuario']['id'] = $res['id'];
			$_SESSION['sesion_usuario']['realname'] = $res['nombre'];
			header('Location: ' . $_SESSION['ultimaPagina']);
		} else echo "<small>Usuario o contraseña incorrectos</small>";
	}
}elseif(isset($_GET['newuser'])) {
	echo "<mark>Ya estas registrado! Prueba a iniciar sesión!</mark>";
}

?>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
	<table>
		<tr>
			<th><label for="username">Usuario</label></th>
			<td>
				<input type="text" name="username" id="username" value="<?php echo (isset($_POST['username']) ? $_POST['username'] : '') ?>">
			</td>
		</tr>
		<tr>
			<th><label for="pass">Password</label></th>
			<td>
				<input type="password" name="pass" id="pass">
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="submit" name="login" value="Login!">
			</td>
		</tr>
	</table>
</form>
<a href="registro.php">
	No tienes cuenta? Registrate!
</a>
<?php include 'pie.php' ?>