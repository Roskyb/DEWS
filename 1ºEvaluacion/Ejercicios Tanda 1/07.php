<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 7</title>

    <style>
        body {
            width: 70%;
            margin: 0 auto;

        }

        table,
        td,
        tr th {
            border: 1px solid gray;
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
    $😒 = fopen("enlaces.txt", "r");
    while (!feof($😒)) {
        $🤣 = fgets($😒);
        $🤣 = explode("  ", $🤣);
        echo "<a href=\"{$🤣[0]}\">{$🤣[1]}</a> <br>";
    }
    fclose($😒);


    ?>

</body>

</html>