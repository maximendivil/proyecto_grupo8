<?php
	session_start();

	require("../modelo/modelo_funciones.php");

	$resultado = eliminarResponsable();

	if ($resultado){
		header("Location: mi_cuenta.php");
	}

?>