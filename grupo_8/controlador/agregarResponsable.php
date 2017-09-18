<?php
	//Verifico que no entren directo por la url
	//Si entran directo por la url, estan evitando al controlador (backend.php)
	//Y pueden violar los roles
	if(!isset($_GET["controller"])){
		header("Location: backend.php?controller=index");
	}

	function insertResponsable($user,$idResponsable){
		$titulo = obtenerInformacionTitulo();
		try {
			$resultado = agregarUsuarioAResponsable($user,$idResponsable);	
			$msjExito = "El responsable se agreg&oacute; correctamente!";
			require "../vista/exito.html";
		}
		catch (Exception $e){
			$msjE = $e->getMessage();
			header("Location: backend.php?controller=vistaAgregarResponsable&user=$user");
		}
	}
?>