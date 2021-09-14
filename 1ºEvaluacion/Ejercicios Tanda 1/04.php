<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 4</title>

    <style>
        body {
            width: 70%;
            margin: 0 auto;
            text-align: center;
        }
        table {
            width: 50%;
            margin: 0 auto;
        }
        img {
            width: 100%;
            height: auto;
        }
    </style>

</head>

<body>
        <h1>Imagenes repetidas sin repetir representadas en una tabla sin repetidos de tres columnas sin repeticon cada 3 no repetidos</h1>

    <table>
        <?php



        $arrayRutasImagenes = [
            './img/121-206x206.jpg',
            './img/423-205x205.jpg',
            './img/526-207x207.jpg',
            './img/718-200x200.jpg',
            './img/937-202x202.jpg',
            './img/983-200x200.jpg',
            './img/983-200x200.jpg',
            './img/718-200x200.jpg',
        ];

        $mdma = [];
        $contCol = 0;
        foreach ($arrayRutasImagenes as $img) {
            $imgM = md5_file($img);
            if($contCol === 0) echo "<tr>";
            if (!in_array($imgM, $mdma)) {
                array_push($mdma, $imgM);
                
                echo "<td><img src=\"$img\"></td>";
                $contCol++;
            }
            if($contCol === 3){
                $contCol = 0;
                echo "</tr>";
            } 


        };


        ?>
    </table>


</body>

</html>