<?php include 'cabecera.php' ?>
<?php

if (isset($_POST['login'])) {

	if (isset($_POST['username']) && isset($_POST['pass'])) {
		$inputUsername = $_POST['username'];
		$inputPass = $_POST['pass'];
		$queryString = "SELECT count(*) as cont FROM usuario WHERE username = \"$inputUsername\" and password = \"$inputPass\"";
		$result = mysqli_query($conn, $queryString);
		if(mysqli_errno($conn)) die(mysqli_error($conn));
		if(mysqli_fetch_assoc ($result)['cont'] == 1) print('bien papapap');
	}
}

?>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
	<table>
		<tr>
			<th><label for="username">Usuario</label></th>
			<td>
				<input type="text" name="username" id="username">
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