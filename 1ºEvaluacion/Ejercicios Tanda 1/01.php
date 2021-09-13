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

        <p>Fecha actual: 
            <strong>

                <?php
                    echo date_format(new DateTime(), 'jS F Y, l');
                ?>
            </strong>
        </p>

        <p>Faltan 

    <strong>
        <?php
            $actual_year = date('Y');
            $next_year = date('Y', strtotime('+1year'));

            $now = date('d-m-y');

        ?>
    </strong>
        dias para acabar el año
        </p>

    </body>
</html>
