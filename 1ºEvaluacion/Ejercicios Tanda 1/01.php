<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <!-- Punto 1 -->
    <p>Fecha actual:
        <strong>

            <?php
            echo date_format(new DateTime(), 'jS F Y, l');
            ?>
        </strong>
    </p>

    <!-- Punto 2 -->
    <p>Faltan

        <strong>
            <?php

            $year = date('y', strtotime('+1 year'));
            $str_fecha1 =  "01/01/" . $year;
            $fecha1 = strtotime($str_fecha1);
            $fecha2 = time();
            echo (int)(($fecha1 - $fecha2) / (60 * 60 * 24));


            ?>
        </strong>
        dias para acabar el año
    </p>

    <!-- Punto 3 -->

    <p>
        <strong>
            <?php

            $array_palabras = ['Hola', ' necesito', 'ayuda', 'estoy', 'secuestrado'];
            foreach ($array_palabras as $value) {
                echo $value . " ";
            }

            ?>
        </strong>
    </p>


    <!-- Punto 4 -->

    <p>
        <strong>
            <?php

            $cadena = "España regaña y el capo de francia se empaña";
            echo str_replace('ñ', 'gn', $cadena);
            ?>
        </strong>
    </p>



    <!-- Punto 5 -->

    <p>
        <strong>
            <?php

            function numAleatorios($n, $startLimit, $endLimit)
            {
                $randArray = [];
                for ($i = 0; $i < $n; $i++) {
                    $randArray[] = rand($startLimit, $endLimit);
                }

                return $randArray;
            }

            print_r(numAleatorios(3, 1, 20));


            ?>
        </strong>
    </p>

    <!-- Punto 6 -->

    <p>
        <strong>
            <?php

            define("CIFRADO",     ['h' => 'pan', 'o' => 'ta', 'l' => 'lo', 'a' => 'nes']);
            $cadena = "hola";

            function cifrar($cadena): string
            {
                $cadena_cifrada = "";
                foreach (str_split($cadena) as $char) {
                    $cadena_cifrada .= CIFRADO[$char];
                }

                return $cadena_cifrada;

            }
            echo cifrar($cadena)

            ?>
        </strong>
    </p>






</body>

</html>