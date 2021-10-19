<?php
include './utils.php';
session_start();
// recogemos los temas seleccionados
function dibujarPreguntas()
{
    if (!isset($_SESSION['juego'])) return;
    $cont = count($_SESSION['juego']);
    foreach ($_SESSION['juego'] as $tema => $datos) {
        if (isset($_POST[$tema])) {
            if (isset($_POST['radio' . $tema]) && isset($datos['preguntas'][$datos['indice']]['correcta'])) {
                if (htmlspecialchars($_POST['radio' . $tema]) != $_SESSION['juego'][$tema]['preguntas'][$_SESSION['juego'][$tema]['indice']]['correcta']) {
                    if (isset($_SESSION['juego'][$tema]['fallos']))
                        $_SESSION['juego'][$tema]['fallos'] += 1;
                    if (isset($_SESSION['textofallos'])) {
                        $_SESSION['textofallos'] .= $tema . " - " . $_SESSION['juego'][$tema]['indice']  . ". " . $datos['preguntas'][$_SESSION['juego'][$tema]['indice']]['pregunta'] . " ---> " . $datos['preguntas'][$_SESSION['juego'][$tema]['indice']]['correcta'] . "\n";
                    } else $_SESSION['textofallos'] = "";
                } else {
                    $_SESSION['juego'][$tema]['aciertos'] += 1;
                }
                $_SESSION['juego'][$tema]['indice']++;
            }
            
        }
        $aciertos =  $_SESSION['juego'][$tema]['aciertos'] . "/" . $datos['cantPreguntas'];
        if ($_SESSION['juego'][$tema]['indice'] == $datos['cantPreguntas']) {
            echo "<div class='col-4'>";
            echo "<strong>Acertaste:</strong> " . $aciertos . "<br>";
            if (isset($_SESSION['juego'][$tema]['fallos'])) echo "<strong>Fallaste:</strong>" . $_SESSION['juego'][$tema]['fallos'] . "<br>";
            echo "</div>";
            $cont--;
        } else {
            $pregunta = $datos['preguntas'][$_SESSION['juego'][$tema]['indice']]['pregunta'];
            $respuestas = $datos['preguntas'][$_SESSION['juego'][$tema]['indice']]['respuestas'];
            include 'form_pregunta.php';
        }
        if ($cont == 0) {
            if (isset($_SESSION['textofallos'])) {
                $fecha = new DateTime();
                $name = "fallos" . $fecha->getTimestamp();
                writeFile($name, $_SESSION['textofallos']);
                echo "<a href='$name.txt'>Ver fallos</a>";
                $_SESSION['textofallos'] = "";
            }
        }
    }
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
    <title>Jugar</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-8">

                <h1>JUGAR</h1>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="row justify-content-center">
                        <?php
                        dibujarPreguntas()
                        ?>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>