<?php


class PreguntaFormulario {
    public $preguntas = [];

    function __construct($preguntas){
        $this->preguntas = shuffle($preguntas);
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

function dibujarPreguntas($pregunta)
{
    $action = $_SERVER['self'];
    echo "<form action=$action method='POST'>";
    echo <<<HTML
                        <div class="item col-4">
                            <div class="col-md-12 col-xs-8  border-5 border-bg-danger">
                                <div class="panel panel-primary">
                                    <div class="panel-heading bg-primary text-white p-1">
                                        <h4>TEMA - Nº1</h4>
                                    </div>
                                    <div class="panel-body">
                                        <p>pregunta pregunta pregutna pregunte?</p>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked=""> Risposta uno — Io prenderei questa
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"> Questa è la risposta due;
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" disabled=""> E volendo anche la tre
                                            </label>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <p> <strong>PREGUNTA 1 / 3</strong> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
        HTML;
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

                    </div>

                </form>

            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>