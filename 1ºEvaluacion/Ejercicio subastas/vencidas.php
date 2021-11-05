<?php include 'cabecera.php' ?>
<?php
$items = getItems();
$itemsFinalizados = [];
foreach ($items as $item) {
	$fecha = new DateTime($item['fechafin']);
	if ($fecha < new DateTime()) $itemsFinalizados[] = $item;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST['borrar']) && isset($_POST['id'])) {
		foreach($_POST['id'] as $value){
			$queryString = "DELETE FROM item WHERE id = '$value'";
			$result = mysqli_query($conn, $queryString);
			if (mysqli_errno($conn)) print('ERROR: ' .mysqli_errno($conn));
			else {

			}
		}
	}
}
  

?>

<h1>Subastas vencidas</h1>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
	<table>
		<thead>
			<tr>
				<th colspan="2">Item</th>
				<th>Precio Final</th>
				<th>Ganador</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($itemsFinalizados as $item) : ?>
				<tr>
					<td>
						<input type="checkbox" name="id[]" value="<?php echo $item['id'] ?>">
					</td>
					<td><a href="<?php echo 'itemdetalles.php?id=' . $item['id'] ?>">
							<?php echo $item['nombre'] ?>
						</a></td>
					<td>Precio final: <?php
										$pujas = getItemPujas($item['id']);
										if (count($pujas) > 0)  echo $pujas[0]['cantidad'];
										else echo $item['preciopartida'];
										?>€</td>
					<td>Ganador: <?php
									if (count($pujas) > 0) echo getUserById($pujas[0]['id_user'])[0]['nombre'];
									else echo "---";
									?> </td>
				</tr>
			<?php endforeach; ?>
			<tr>
				<td colspan="4">
					<input type="submit" value="Borrar" name="borrar" style="width: 100%;">
				</td>
			</tr>
		</tbody>
	</table>

</form>


<?php include 'pie.php' ?>