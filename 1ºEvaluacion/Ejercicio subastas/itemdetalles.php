<?php include 'cabecera.php' ?>
<?php
$item = getItem($_GET['id']);

$cantidad = $errCantidad =  "";
if (isset($_GET['pujar'])) {
    if (isset($_GET['cantidad'])) {
        $cantidad = $_GET['cantidad'];
        // comprobar que la el usuario no haya echo 3 pujas
        $pujas = getPujasFromUser($_SESSION['sesion_usuario']['id']);
        if ($pujas < 3) {
            // compropar que la puja supera la actual
            if ($cantidad > $item['subastas'][0]['cantidad']) {
                $res = addPuja($_GET['id'], $_SESSION['sesion_usuario']['id'], $cantidad);
                if ($res == -1) {
                    $errCantidad = "No ha sido posible pujar devido a un error, intentalo denuevo más tarde";
                }else $item = getItem($_GET['id']);
            } else $errCantidad = "La cantidad pujada es demasiado baja";
        } else $errCantidad = "Ya has hecho 3 pujas el dia de hoy! Espera a mañana";
    } else {
        $errCantidad = "Deves introducir una cantidad!";
    }
}
?>

<?php if (!empty($item) &&  new DateTime($item['fechafin']) > new DateTime()) : ?>
    <?php
    $nombre = $item['nombre'];
    $descripcion = $item['descripcion'];
    $imagenes = $item['imagenes'];
    ?>
    <section>
        <article>
            <h1><?php echo $nombre ?></h1>
            <p>
                Número de pujas: <?php echo count($item['subastas']) ?> - Precio actual: <?php echo count($item['subastas']) == 0 ? $item['preciopartida'] : $item['subastas'][0]['cantidad'] ?> €
                - Fecha fin para pujar: <?php echo date('d/M/y h.i A', strtotime($item['fechafin'])) ?>
            </p>

            <div>
                <?php foreach ($imagenes as $img) : ?>

                    <img src="<?php echo IMAGES . $img['imagen'] ?>" width="200" height="200">

                <?php endforeach; ?>
            </div>

            <p>
                <?php echo $descripcion ?>
            </p>
        </article>
    </section>

    <?php if (!$logged) : ?>
        <section>
            <h2>Puja por este item</h2>
            <p>Para pujar, debes <a href="login.php">autenticarte</a></p>
        </section>

    <?php else : ?>
        <p>Añade tu puja en el cuadro inferior</p>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
            <table>
            
                <tr>
                    <td>
                        <input type="number" name="cantidad" id="cantidad">
                        <?php echo "<small>".$errCantidad."</small>"?>
                    </td>
                    <td>
                        <input type="submit" value="Pujar!" name="pujar">
                    </td>
                </tr>
            </table>
        </form>
    <?php endif; ?>
<?php else : ?>
    <h2>No hemos encontrado lo que estas buscando</h2>
<?php endif; ?>





<?php include 'pie.php' ?>