<?php include 'config.php';
session_start();
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
		if (isset($_SESSION['USERNAME']) == TRUE) {
			echo "<a href='logout.php'>Logout</a>";
		} else {
			echo "<a href='login.php'>Login</a>";
		}
		?>
		<a href="newitem.php">New Item</a>
	</div>
	<div id="container">
		<div id="bar">
			<?php require("bar.php"); ?>
		</div>
		<div id="main">

