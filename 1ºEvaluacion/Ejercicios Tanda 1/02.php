<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2</title>

</head>

<body>

    

    <?php

    $tempsMes = [30, 27, 22, 43, 10, 18, 48, -1];
    $media = array_sum($tempsMes) / count($tempsMes);
    echo "La media es de temperaturas es <strong>" . round($media, 0) . " / " . bcdiv($media, 1, 0) . "</strong><br>";

    sort($tempsMes);
    echo "Las temperaturas más bajas han sido: <strong>" . $tempsMes[1] . "," . $tempsMes[2] . ", " . $tempsMes[3] . ", " . $tempsMes[4] . ", " . $tempsMes[5] . "</strong> <br>";

    rsort($tempsMes);
    echo "Las temperaturas más altas han sido: <strong>" . $tempsMes[1] . "," . $tempsMes[2] . ", " . $tempsMes[3] . ", " . $tempsMes[4] . ", " . $tempsMes[5] . "</strong>";
    


    ?>



</body>

</html>