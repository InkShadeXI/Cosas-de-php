<?php
  require_once "bootstrap.php";
  require_once './src/Profesor.php';
  require_once './src/Asignatura.php';
  $id = $_GET['id'];
  
  // Buscar el profesor con el id indicado
  $profesor = $entityManager->find("Profesor", $id);
  if(!$profesor){
 	echo "profesor no encontrado";
  }else{
	echo "Nombre del profesor: ". $profesor->getNombre()."<br>";
	$equipo = $jugador->getEquipo();
	echo "Nombre del equipo: ". $equipo->getNombre();
  }