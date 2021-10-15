<?php
session_start();
// recogemos los temas seleccionados
print($_SESSION['partida']);



class PreguntaFormulario {
    public $preguntas;
    public $cantPreguntas;
    public $fallos;

    function __construct($preguntas){
        $this->cantPreguntas = 0;
        $this->preguntas = shuffle($preguntas);
    }


    public function draw()
    {
        include './form_pregunta.php';
    }
    

}
class Pregunta
{
    public $enunciado;
    public $opciones;
    public $respuesta;
    public $tema;

    function __construct($enunciado, $opciones, $respuesta, $tema)
    {
        $this->$enunciado = $enunciado;
        $this->$opciones = $opciones;
        $this->$respuesta = $respuesta;
        $this->$tema = $tema;
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
    <div class="conteiner mt-5">
        <div class="row justify-content-center">
            <div class="col-8">

                <h1>JUGAR</h1>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="row justify-content-center">
                        <?php  ?>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>