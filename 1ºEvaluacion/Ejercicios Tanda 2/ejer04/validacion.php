<?php

include 'utils.php';

function validateLogin()
{

	$usuario = $_POST['usuario'];
	$pass = $_POST['password'];
	$registeredUsers = getUsers();
	foreach ($registeredUsers as $value) {
		if ($usuario == $value[0] && $pass != $value[1]) {
			$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$url = str_replace("validacion.php", "login.php", $url);
			$msg = "?error=Contraseña invalida para el usuario " . $usuario;
			$url .= $msg;
			header('Location: ' . $url);
		} else if ($usuario == $value[0] && $pass == $value[1]) {
			$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$url = str_replace("validacion.php", "charla.php", $url);
			$msg = "?usuario=" . $usuario;
			$url .= $msg;
			header('Location: ' . $url);
		} else {
			// pal registro
			$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$url = str_replace("validacion.php", "alta.php", $url);

			header('Location: ' . $url);
		}
	}
}

validateLogin();
