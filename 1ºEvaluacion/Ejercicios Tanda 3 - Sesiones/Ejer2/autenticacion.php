<?php
include 'utils/libmenu.php';
if (isset($_POST['invitado'])) {
	session_start();
	$_SESSION['userdata'] =  ["usuario" => 'anon', "descuento" => 0, "comanda" => []];
	header('Location: ./pedido.php');
} else {
	if (
		isset($_POST['username']) && !empty($_POST['username']) &&
		isset($_POST['pass']) && !empty($_POST['pass'])
	) {
		if (autentica($_POST['username'], $_POST['pass'])) {
			session_start();
			$_SESSION['userdata'] =  ["usuario" => $_POST['username'], "descuento" => getDiscount($_POST['username']), "comanda" => []];
			header('Location: ./pedido.php');
		} else header('Location: entrada.php?error');
	} else {
		header('Location: entrada.php?error');
	}
}
