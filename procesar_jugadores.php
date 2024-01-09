<?php

require_once "bootstrap.php";
require_once './src/Equipo.php';
require_once './src/Jugador.php';

$id_seleccionado = $_POST["equipos"];
$jugadores = $entityManager->getRepository('Jugador')->findBy(array('equipo' => $id_seleccionado));
foreach ($jugadores as $jugador) {
    $id_jugador = $jugador->getId();
    echo "<form action='borrar_jugador.php?id_borrar=$id_jugador' method='get'><p>" . $jugador->getNombre() . "</p>";
    echo "<button type='submit'>Borrar jugador</button></form><hr>";
}

?>