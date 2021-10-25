<?php

function ultimaPagina() {
    $url = $_SERVER['REQUEST_URI'];
	$page = basename($_SERVER['REQUEST_URI']);
	if($page != 'login.php' && $page != 'register.php'  && $page != 'logout.php') return $url;
	return $_SESSION['ultimaPagina'] ;
};


function getCategories(): array
{
    global $conn;
    $queryString = "SELECT id, categoria FROM categoria";
    $result = mysqli_query($conn, $queryString);
    if (mysqli_errno($conn)) die(mysqli_error($conn));
    return mysqli_fetch_all($result);
}

function getItems($cat_id = "")
{
    global $conn;
    if (!empty($cat_id)) {
        $queryString = "SELECT nombre, id, descripcion, preciopartida FROM item WHERE id_cat = \"$cat_id\"";
    } else {
        $queryString = "SELECT nombre, id, descripcion, preciopartida FROM item";
    }
    $result = mysqli_query($conn, $queryString);
    if (mysqli_errno($conn)) return [];
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getItemImages($id) {
    global $conn;
    $queryString = "SELECT imagen FROM imagen WHERE id_item = \"$id\"";
    $result = mysqli_query($conn, $queryString);
    if (mysqli_errno($conn)) return [];
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getItemPujas($id) {
    global $conn;
    
    $queryString = "SELECT * FROM puja WHERE id_item = \"$id\" ORDER BY cantidad DESC";

    $result = mysqli_query($conn, $queryString);
    if (mysqli_errno($conn)) return [];
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}





function getItem($id): array
{
    $items = getItems();
    $match = [];
    foreach ($items as $value) {
        if ($value['id'] == $id) {
            $match = $value;
            break;
        }
    }

    if (empty($match)) return [];

    $id = $match['id'];
    $match['subastas'] = getItemPujas($id);
    $match['imagenes'] = getItemImages($id);

    return $match;
}


function addNewItem($nombre, $id_categoria, $descripcion, $fecha, $precio, $id_usuario){
    global $conn;
    $queryString = "INSERT INTO item (id_cat, id_user, nombre, descripcion, preciopartida, fechafin)
                    VALUES (\"$id_categoria\", \"$id_usuario\",\"$nombre\",\"$descripcion\",\"$precio\",\"$fecha\" )";
    $result = mysqli_query($conn, $queryString);
    if (mysqli_errno($conn)) return [];
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}




function drawItemTable($items)
{
    if (count($items) > 0) {
        
        echo <<<HTML
            <table>
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Item</th>
                        <th>Pujas</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
        HTML;

        foreach ($items as $item) {
            $images = getItemImages($item['id']);
            $pujas = getItemPujas($item['id']);
            $cantPujas = count($pujas);
            $precio = isset($pujas[0]['cantidad']) ? $pujas[0]['cantidad'] : $item['preciopartida'];
            echo "<tr>";
            echo "<td>";
            if(count($images) > 0) {
                echo "<img src='";
                echo IMAGES . $images[0]['imagen'];
                echo "' width='100' height='100'>";
            }else {
                 echo "NO IMAGEN";
            }
           
            echo "</td>";
            echo "<td><a href='itemdetalles.php?id=" . $item['id'] . "'>" . $item['nombre'] . "</a></td>";
            echo "<td>" . $cantPujas . "</td>";
            echo "<td>" . $precio . "€</td>";
            echo "</tr>";
        }



        echo <<<HTML
                </tbody>
            </table>
        HTML;
    } else {
        echo "<h2>Lo sentimos, todavía no hay productos en esta categoría</h2>";
    }
}


