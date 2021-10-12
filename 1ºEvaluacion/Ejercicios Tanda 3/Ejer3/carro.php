<?php
session_start();
$productos = ["Tornillos" => 10, "Tuercas" => 20, "Pack llaves Allen" => 30];
if(!isset($_SESSION['pedido'])) $_SESSION['pedido'] = [];

function dibujarTabla()
{
    global $productos;
    echo <<<HTML
        <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Elija Cantidad</th>
                <th scope="col">Pedido Actual</th>
            </tr>
        </thead>
    HTML;
    echo "<tbody>";

    foreach ($productos as $key => $value) {
        echo <<<HTML
            <tr>
                <th scope="row">
                <input type="checkbox" name="productos[]" value=$key id=$key>
                    $key
                </th>
                <td>$value</td>
            <td>
            HTML;
        echo "<select name=$key>";
        for ($i = 0; $i <= 10; $i++) echo "<option value='$i'>$i</option>";
        echo "</select>";
        if (isset($_SESSION['pedido'][$key]))
            $unidades = $_SESSION['pedido'][$key];
        else $unidades = 0;
        echo <<<HTML
            </td>
            <td>$unidades Unidades pedidas</td>
        </tr>
    HTML;
    }

    echo "</tbody>";

    echo "</table>";
}

if (isset($_POST['aniadir'])) {
    if (isset($_SESSION['pedido'])) {
        if (isset($_POST['productos']) && count($_POST['productos']) > 0) {

            foreach ($_POST['productos'] as $value) {
                $cant = intval($_POST[$value]);
                
                if (!isset($_SESSION['pedido'][$value])) $_SESSION['pedido'][$value] = 0;
                $_SESSION['pedido'][$value] += $cant;
            }
        }
    } else {
        $_SESSION['pedido'] = [];
    }
} else if (isset($_POST['formalizar'])) {
    
} else {
    session_unset();
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Carrito</title>
</head>

<body>
    <div class="conteiner mt-5">
        <div class="row justify-content-center">
            <div class="col-8">
            <?php
                echo "<h3 class='mt-5'>Tu pedido</h3>";
                if (isset($_POST['formalizar']) && isset($_SESSION['pedido'])){

                    echo '<ul>';
                    foreach ($_SESSION['pedido'] as $key => $value) {
                        $precio = $value * $productos[$key];
                        echo "<li>$key, $value unidades a $precio € </li>";
                    }
                    echo '</ul>';
                    session_unset();
                }
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <?php
                    dibujarTabla();
                    ?>
                    <input type="submit" name="aniadir" value="Añadir Unidades">
                    <input type="submit" name="formalizar" value="Formalizar Pedido">
                    <input type="submit" name="vaciar" value="Vaciar Carro">
                </form>

            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>