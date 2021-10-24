<?php include 'cabecera.php' ?>
<?php include 'utils.php' ?>



<h1>Añade nuevo item</h1>
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
                    echo "<option value='$value[0]'>$value[1]</option>";
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
            <input type="text" id="nombre" name="nombre">
        </td>
    </tr>

    <tr>
        <td>
            <label for="descripcion">Descripción</label>
        </td>
        <td>
            <textarea name="descripcion" id="descripcion" cols="30" rows="10">

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

                        </select>
                    </td>
                    <td>
                        <select name="mes" id="mes">

                        </select>
                    </td>
                    <td>
                        <select name="anio" id="anio">

                        </select>
                    </td>

                    <td>
                        <select name="hora" id="hora">

                        </select>
                    </td>


                    <td>
                        <select name="minutos" id="minutos">

                        </select>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
    <tr>
        <td><label for="precio">Precio</label></td>
        <td>
            <input type="text" name="precio" id="precio">€
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <input type="submit" name="enviar" value="Enviar!" style="width: 100%;">
        </td>
    </tr>
</table>

<?php include 'pie.php' ?>