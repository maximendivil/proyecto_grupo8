<?php
	//Verifico que no entren directo por la url
	//Si entran directo por la url, estan evitando al controlador (backend.php)
	//Y pueden violar los roles
	if(!isset($_GET["controller"])){
		header("Location: backend.php?controller=index");
	}

	function eliminarUser($user,$valor){
		$titulo = obtenerInformacionTitulo();
		try {
			$exito = eliminarUsuario($user,$valor);
			header("Location: backend.php?controller=cambiarRoles&pagina=1");
		}
		catch (Exception $e) {
		   	$msjE = $e->getMessage();
		   	require '../vista/listadosEliminar.html';
		}
	}
?>