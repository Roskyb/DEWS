<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3</title>

</head>

<body>

    

    <?php

    $ciudades = ["Cut and Shoot, Texas", "Big Arm, Montana", "Cut and Shoot, Texas", "Chicken, Alaska", "Los Baños, California", "Big Arm, Montana"];
    // $ol = 1;
    // for ($i=0; $i < count($ciudades); $i++) { 
    //     $repetido = false;
    //     for ($j=$i + 1; $j < count($ciudades); $j++) { 
    //         if($ciudades[$j] == $ciudades[$i]) $repetido = true;
    //     }
    //     if(!$repetido){
    //         echo $ol . ".   " . $ciudades[$i] . "<br>";  
    //         $ol++;
    //     } 
    // }

        $ol = 1;
        foreach (array_unique($ciudades) as $key => $value) {
            echo $ol . ".   " . $value . "<br>";  
            $ol++;
        }

    ?>



</body>

</html>