<?php
// Librerias
require_once "bootstrap.php";
require_once './src/Equipo.php';

// Ejercicio 1 (joya)
function mostrar_datos ($id_encontrar, $entityManager) {
    $eq = $entityManager->find("Equipo", $id_encontrar);
    if (!$eq) {
        echo "ERROR: EQUIPO NO ENCONTRADO.";
    }
    else {
        echo "ID: " . $eq->getId() . "<br>";
        echo "Nombre: " . $eq->getNombre() . "<br>";
        echo "Socios: " . $eq->getSocios() . "<br>";
        echo "Ciudad: " . $eq->getCiudad() . "<br>";
    }
}

// Ejercicio 2 (joya)
function crear_equipo ($id_nuevo, $nombre_nuevo, $fundacion_nueva, $socios_nuevos, $ciudad_nueva, $entityManager) {
    $existe_equipo = $entityManager->find("Equipo", $id_nuevo);
    // La condición comprueba que los campos tienen el formato que toca y además de eso que no exista un equipo con el mismo id.
    if (is_numeric($id_nuevo) && is_string($nombre_nuevo) && is_numeric($fundacion_nueva) && is_numeric($socios_nuevos) && is_string($ciudad_nueva) && !$existe_equipo) {
        $nuevo = new Equipo();
        $nuevo->setNombre($nombre_nuevo);
        $nuevo->setFundacion($fundacion_nueva);
        $nuevo->setSocios($socios_nuevos);
        $nuevo->setCiudad($ciudad_nueva);
        $entityManager->persist($nuevo);
        $entityManager->flush();
    }
    else {
        echo "No se cumplen las condiciones.";
    }
}

// Ejercicio 3 (joya)
function borrar_equipo ($id_borrar, $entityManager) {
    $equipo = $entityManager->find("Equipo", $id_borrar);
    if ($equipo) {
        try {
        	$entityManager->remove($equipo);
        	$entityManager->flush();    
        } 
        catch (\Throwable $th) {
            echo "ERROR: NO SE HA PODIDO BORRAR EL EQUIPO, PROBABLEMENTE HAYA DEPENDENCIAS.";
        }
    }
    else {
        echo "ERROR: NO HAY EQUIPO QUE BORRAR.";
    }
}

// Ejercicio 4
function mostrar_equipos ($entityManager) {
    $equipos = $entityManager->getRepository('Equipo')->findAll();
    echo "<h2>Equipos y jugadores.</h2>";
    echo "<form action='procesar_jugadores.php' method='post'><label for='equpos'>Selecciona una opción:</label><select name='equipos' id='equipos'>";
    foreach ($equipos as $i) {
        $id = $i->getId();
        $nombre = $i->getNombre();
        echo "<option value='$id'>" . $nombre . "</option>";
    }
    echo "</select><button type='submit'>Ver jugadores</button></form>";
}


// Verificamos si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["crear_equipo"])) {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $fundacion = $_POST["fundacion"];
        $socios = $_POST["socios"];
        $ciudad = $_POST["ciudad"];
    
        // Llamamos a la función para crear el equipo
        crear_equipo($id, $nombre, $fundacion, $socios, $ciudad, $entityManager);
    }
    if (isset($_POST["borrar_equipo"])) {
        $id = $_POST["id"];

        // Llamamos a la función para borrar equipo
        borrar_equipo($id, $entityManager);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario para Crear Equipo</title>
    </head>
    <body>
        <h2>Formulario para crear equipo</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            ID: <input type="text" name="id"><br><br>
            Nombre: <input type="text" name="nombre"><br><br>
            Fundación: <input type="text" name="fundacion"><br><br>
            Socios: <input type="text" name="socios"><br><br>
            Ciudad: <input type="text" name="ciudad"><br><br>
            <input type="submit" value="Crear Equipo" name="crear_equipo"><br>
        </form>
        <hr>
        <h2>Formulario para borrar equipo</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            ID: <input type="text" name="id"><br><br>
            <input type="submit" value="Borrar Equipo" name="borrar_equipo">
        </form>
        <hr>
        <?php mostrar_equipos($entityManager); ?>
    </body>
</html>