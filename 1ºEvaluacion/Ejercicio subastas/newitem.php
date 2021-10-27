<?php include 'cabecera.php' ?>

<?php

if (isset($_POST['enviar'])) {
    $formularioCorrecto = true;
    $errores = "<small>Revisa los siguientes campos del formulario: <br>";
    if(!isset($_POST['nombre']) || empty($_POST['nombre'])) {
        $formularioCorrecto = false;
        $errores .= "- Nombre: deves introducir un nombre <br>";
    }
    if(!isset($_POST['categoria'])){
        $formularioCorrecto = false;
        $errores .= "- Categoria: Deves elegir una categoria! <br>";
    }
    if(!isset($_POST['descripcion']) || empty($_POST['descripcion'])){
        $formularioCorrecto = false;
        $errores .= "- Descripcion: Deves introducir una descripcion para el producto <br>";
    }

    if(!isset($_POST['precio']) || empty($_POST['precio']) || !floatval($_POST['precio'])){
        
        $formularioCorrecto = false;
        $errores .= "- Precio: Deves introducir un precio correcto! <br>";
    }

    

    $errores .= "</small>";

    if($formularioCorrecto){
        if(isset($fecha)){

        }else {

        }
        addNewItem($_POST['nombre'], 
        $_POST['categoria'], 
        $_POST['descripcion'], $_POST['fecha'],
        $_POST['precio'], 
        $_SESSION['sesion_usuario']['id']);
    }
 
}

?>


<h1>Añade nuevo item</h1>
<?php echo isset($formularioCorrecto) && !$formularioCorrecto ? (isset($errores) ? $errores :'') : ''  ?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <table>
        <tr>
            <td>
                <label for="categoria">Categoría</label>
            </td>
            <td>
                <select name="categoria" id="categoria">
                    <?php

                    $categorias = getCategories();

                    foreach ($categorias as $value) {
                        if (isset($_POST['categoria']) && $_POST['categoria'] == $value[0]) {
                            echo "<option value='$value[0]' selected>" . $value[1] . "</option>";
                        } else {
                            echo "<option value='$value[0]'>$value[1]</option>";
                        }
                    }

                    ?>
                </select>
            </td>
        </tr>

        <tr>
            <td>
                <label for="nombre">Nombre</label>
            </td>
            <td>
                <input type="text" id="nombre" name="nombre" value="<?php echo isset($_POST['nombre']) ? $_POST['nombre'] : '' ?>">
            </td>
        </tr>

        <tr>
            <td>
                <label for="descripcion">Descripción</label>
            </td>
            <td>
                <textarea name="descripcion" id="descripcion" cols="30" rows="10"><?php echo isset($_POST['descripcion']) ? trim($_POST['descripcion']) : '' ?>
                </textarea>
            </td>
        </tr>
        <tr>
            <td>
                Fecha de fin de pujas
            </td>
            <td>
                <table>
                    <tr>
                        <td>Día</td>
                        <td>Mes</td>
                        <td>Año</td>
                        <td>Hora</td>
                        <td>Minutos</td>
                    </tr>
                    <tr>
                        <td>
                            <select name="dia" id="dia">
                                <?php
                                $dias = 31;
                                for ($i = 1; $i <= 31; $i++) {
                                    echo "<option value='$i'>$i</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <select name="mes" id="mes">
                                <?php
                                $mes = 12;
                                for ($i = 1; $i <= 12; $i++) {
                                    echo "<option value='$i'>$i</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <select name="anio" id="anio">
                                <?php

                                $year = intval(date('Y'));

                                for ($i = $year; $i < $year + 5; $i++) {
                                    echo "<option value='$i'>$i</option>";
                                }
                                ?>
                            </select>
                        </td>

                        <td>
                            <select name="hora" id="hora">
                                <?php
                                $hora = 24;
                                for ($i = 0; $i < $hora; $i++) {
                                    echo "<option value='$i'>$i</option>";
                                }
                                ?>
                            </select>
                        </td>


                        <td>
                            <select name="minutos" id="minutos">
                                <?php
                                $minutos = 60;
                                for ($i = 0; $i < $minutos; $i++) {
                                    echo "<option value='$i'>$i</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
        <tr>
            <td><label for="precio">Precio</label></td>
            <td>
                <input type="text" name="precio" id="precio" value="<?php echo isset($_POST['precio']) ? $_POST['precio'] : '' ?>"> €
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="enviar" value="Enviar!" style="width: 100%;">
            </td>
        </tr>
    </table>
</form>
<?php include 'pie.php' ?>