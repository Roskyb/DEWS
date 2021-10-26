<?php
include 'config.php';
include_once 'utils.php';


session_start();
mysqli_set_charset($conn, 'utf8');
$_SESSION['ultimaPagina'] = ultimaPagina(); 




$logged = false;
if (isset($_SESSION['sesion_usuario'])) {
	$logged = true;
}
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
?>

<html>

<head>
	<title><?php echo SITE_NAME; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body>
	<div id="header">
		<h1><?php echo SITE_NAME ?></h1>
	</div>
	<div id="menu">
		<a href="index.php">Home</a>
		<?php
		if ($logged) {
			echo "<a href='logout.php'>Logout</a>";
			echo "<a href='newitem.php'>New Item</a>";
		} else {
			echo "<a href='login.php'>Login</a>";
		}
		?>

		
	</div>
	<div id="container">
		<div id="bar">
			<?php require("bar.php"); ?>
		</div>
		<div id="main">