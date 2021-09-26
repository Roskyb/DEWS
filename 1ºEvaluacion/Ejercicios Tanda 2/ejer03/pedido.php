<?php
include 'utils.php';
session_start();

// CREAMOS VARIABLES DE ERROR SI EL SERVIDOR ESTA RECIVIENDO UNA PETICION POST

$errorNombre = $errorPrecio = $errorDescripcion = "";
$nombreArticulo = $precioArticulo = "";

// CHECKEAMOS EL FORMULARIO
if (isset($_POST['nuevoArticulo'])) {
    if (empty($_POST['nombreArticulo'])) $errorNombre = "Campo nombre obligatorio";
    else $nombreArticulo = $_POST['nombreArticulo'];
    if (empty($_POST['precioArticulo'])) $errorPrecio = "Campo precio obligatorio";
    else $precioArticulo = $_POST['precioArticulo'];

    // SI LOS CAMPOS ESTAN LLENOS
    if (!empty($nombreArticulo) && !empty($precioArticulo)) {
        aniadirArticulo($nombreArticulo, $precioArticulo);
    }
}


function fileToArray($filePath)
{
    $content = [];
    $handle = fopen($filePath, "r");
    while (!feof($handle)) {
        $line = fgets($handle);
        $content[] = $line;
    }
    fclose($handle);
    return $content;
}

function dibujarArticulos()
{
    $articulos = fileToArray('articulos.txt');

    foreach ($articulos as $art) {
        $art = explode(';', $art);
        $nombre = $art[0];
        $precio = trim($art[1]);

        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $url = strtok($url, "?");
        $nombre_url = str_replace(' ', '%20', $nombre);
        $enlace = $url . "?nombre=$nombre_url&precio=$precio";


        echo <<<HTML
            <tr>
                <th>$nombre</th>
                <td>$precio €</td>
                <td><a href=$enlace>Añadir al carrito</a></td>
            </tr>
            HTML;
    }
}



// function guardarArticulo()
// {
//     if (isset($_SESSION['carrito'])) {
//         if (
//             isset($_GET['nombre']) && !empty($_GET['nombre'])
//             && isset($_GET['precio']) && !empty($_GET['precio'])
//         ) {
//             $_SESSION['carrito'][] = [$_GET['nombre'], $_GET['precio']];
//         }else {

//         }

//     } else $_SESSION['carrito'] = [];
// }

function aniadirArticulo($nombre, $precio)
{
    $articulo = $nombre . ";" . $precio;
    $filePath = './articulos.txt';
    $file = fopen($filePath, "a");
    fwrite($file, "\n");
    fwrite($file, $articulo);
    fclose($file);
}

function calcularPrecio()
{
    if (!isset($_SESSION['carrito'])) echo 0 . '€';
    else {
        $precio = 0;
        foreach ($_SESSION['carrito'] as $art) {
            $precio += $art[1];
        }
        echo $precio . '€';
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejer 03</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>

    <main class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" colspan="3" class="text-center display-6">Elige tu pedido</th>
                </tr>
            </thead>
            <tbody>
                <?php
                dibujarArticulos();
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" class="text-center display-6">Precio: <?php calcularPrecio() ?></th>
                </tr>
            </tfoot>
        </table>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6">
                    <h3>Añadir articulo</h3>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nombreArticulo" class="form-label">Articulo</label>
                            <input type="text" class="form-control" id="nombreArticulo" name="nombreArticulo" value="<?php echo $nombreArticulo ?>">
                            <?php
                            errorMessage($errorNombre);
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="precioArticulo" class="form-label">Precio</label>
                            <input type="number" step=".01" class="form-control" id="precioArticulo" name="precioArticulo" value="<?php echo $precioArticulo ?>">
                            <?php
                            errorMessage($errorPrecio);
                            ?>

                        </div>
                        <div class="mb-3">
                            <label for="descripcionArticulo" class="form-label">Precio</label>
                            <input type="file" class="form-control" id="descripcionArticulo" name="descripcionArticulo">
                        </div>

                        <input type="submit" class="btn btn-primary" name="nuevoArticulo" value="Enviar">
                    </form>
                </div>
            </div>
        </div>


    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>