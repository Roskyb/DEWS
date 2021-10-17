<?php
include './utils.php';
session_start();
// recogemos los temas seleccionados
function dibujarPreguntas()
{
    if(!isset($_SESSION['juego'])) return;
    foreach ($_SESSION['juego'] as $tema => $datos) {
            if(isset($_POST[$tema])){
                if(isset($_POST['radio' . $tema]) && isset($datos['preguntas'][$datos['indice']]['correcta'])){
                    if($_POST['radio' . $tema] != $datos['preguntas'][$datos['indice']]['correcta']){
                        if(isset($datos['fallos']))
                            $datos['fallos']++;
                    }
                    $_SESSION['juego'][$tema]['indice']++;
                }
            }
            if($datos['indice'] >= $datos['cantPreguntas']){
               echo "terminado";
            }else {
                $pregunta = $datos['preguntas'][$datos['indice']]['pregunta'];
                $respuestas = $datos['preguntas'][$datos['indice']]['respuestas'];
                include 'form_pregunta.php';    

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