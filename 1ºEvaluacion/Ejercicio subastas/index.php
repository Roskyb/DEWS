<?php include 'cabecera.php' ?>

<h1>Items Disponibles</h1>

<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
	$cat_id = $_GET['id'];
	$items = getItems($cat_id);
}else $items = getItems();
$itemsFiltrados = [];
foreach($items as $item){
	$fecha = new DateTime($item['fechafin']);
	if($fecha > new DateTime()) $itemsFiltrados[] = $item;
}


drawItemTable($itemsFiltrados);



?>


<?php include 'pie.php' ?>