<?php
	session_start();
	
	require("../modelo/modelo_funciones.php");
	
	$rows = usuariosSinResponsable();
	
	require("../vista/listadoUsuariosSinResponsable.html");
?>