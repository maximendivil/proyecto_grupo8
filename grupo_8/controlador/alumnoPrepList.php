<?php
	session_start();

	require("../modelo/modelo_funciones.php");

	$rows = obtenerAlumnos();

	if(count($rows)==0){
		$msjE = "<h3>No hay alumnos!</h3>";
	}
	require("../vista/listadoAlumnos.html");

	
?>