<?php include 'cabecera.php' ?>
<?php
$item = getItem($_GET['id']);

?>

<?php if (!empty($item)) : ?>
    <?php
    $nombre = $item['nombre'];
    $descripcion = $item['descripcion'];
    $imagenes = $item['imagenes'];
    ?>
    <section>
        <article>
            <h1><?php echo $nombre ?></h1>
            <p>
                Número de pujas: 1 - Precio actual: 10000€ - Fecha fin para pujar: 20/Dec/2020 12.00AM
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
        
    <?php endif; ?>
<?php else : ?>
    <h2>No hemos encontrado lo que estas buscando</h2>
<?php endif; ?>





<?php include 'pie.php' ?>