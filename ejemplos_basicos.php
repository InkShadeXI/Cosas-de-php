<?php
// ejemplo_basicos.php
require_once "bootstrap.php";
require_once './src/Equipo.php';

// Buscar por clave primaria
$eq = $entityManager->find("Equipo", 1);

// Mostrar datos
// echo $eq->getSocios();





// Cambiar el nombre del equipo
// $eq->setNombre("Madrid");
// $entityManager->flush();


// Cambiar el numero de socios
// $eq->setSocios(7000);
// $entityManager->flush();



// Si el equipo no existe devuelve null

// $eq = $entityManager->find("Equipo", 4);
// if(!$eq){
// 	echo "Equipo no encontrado";
// }