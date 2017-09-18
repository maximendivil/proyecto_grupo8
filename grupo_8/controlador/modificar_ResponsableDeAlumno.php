<?php
	session_start();

	require("../modelo/modelo_funciones.php");

	$idResponsable = $_GET["id"];

	$rows = obtenerResponsableConId($idResponsable);
        
	if (count($rows)>0){
		require("../vista/form_modificar_ResponsableDeAlumno.html");
	}
?>