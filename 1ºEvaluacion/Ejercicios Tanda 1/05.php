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

        }


        img {
            width: 100%;
            height: auto;
        }
    </style>

</head>

<body>

    <?php

    $persona_peliculas = [
        "Iker Martin" => ["Boku no Pico", "Sharknado 3", "Castores. La invasión"],
        "Ezequiel" => ["Brot**r f**c*ng s**st*r", "La sirenita", "Semen una historia de amor"],
        "Dorito" => ["Boku no Pico", "Semen una historia de amor", "Toy story 3"]
    ];

    function buscadorPersonasConPeliFavorita($pelicula, $db)
    {
        $personas = [];

        foreach ($db as $key => $value) {
            if(in_array($pelicula, $value )){
                array_push($personas, $key);
            }
        }

        return $personas;
    }

    function pelisFavoritasAlAzar($db){

        

    }


    $personas = buscadorPersonasConPeliFavorita("Boku no Pico", $persona_peliculas);

    echo "<p>La pelicula Boku no Pico le gusta a las siguientes personas: </p>";
    echo "<ul>";

    foreach ($personas as $persona) {

        echo "<li>" . $persona . "</li>";
    }
    echo "</ul>";
    ?>

</body>

</html>