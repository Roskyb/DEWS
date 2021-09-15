<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 6</title>

    <style>
        body {
            width: 70%;
            margin: 0 auto;

        }

        table,
        td,
        tr th {
            border: 1px solid black;
            border-collapse: collapse;
        }


        img {
            width: 100%;
            height: auto;
        }
    </style>

</head>

<body>

    <?php

    function creadorDeTablaHoraria($dias, $horaInicio, $horaFin, $intervalo = 60)
    {


        $horaInicio = new DateTime($horaInicio);
        $horaFin = new DateTime($horaFin);
        $minutos = $horaInicio->diff($horaFin)->h * 60;
        $rows = $minutos / $intervalo;

        echo "<table>";
        // DIBUJAR THEAD
        echo "<thead>
                <tr><td></td>";

        foreach ($dias as $dia) {
            echo "<th>";
            echo $dia;
            echo "</th>";
        }

        echo "</tr>
            </thead>";

        // TBODY

        echo "<tbody>";
        $siguiente_hora = $horaInicio;
        for ($i = 0; $i < $rows; $i++) {
            echo "<tr>";
            if (($i) % 2 == 0) {
                echo "<th>";
            } else echo "<th style=\"background-color: gray;\">";
            echo $siguiente_hora->format('H:i') . "</th>";
            foreach ($dias as $dia) {
                if (($i) % 2 == 0) echo "<td></td>";
                else echo "<td style=\"background-color: gray;\"></td>";
            }
            echo "</tr>";
            $siguiente_hora = $siguiente_hora->modify("+{$intervalo} minutes");
        }

        echo "</tbody>";

        echo "</table>";
    }


    $dias = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes"];
    creadorDeTablaHoraria($dias, "09:00", "15:00", 55);
    ?>

</body>

</html>