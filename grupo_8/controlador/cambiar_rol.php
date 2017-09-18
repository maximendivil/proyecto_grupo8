<?php
	
	//Verifico que no entren directo por la url
	//Si entran directo por la url, estan evitando al controlador (backend.php)
	//Y pueden violar los roles
	if(!isset($_GET["controller"])){
		header("Location: backend.php?controller=index");
	}

	function cambiarRol($user){
		$titulo = obtenerInformacionTitulo();
		$rol = "";
		switch ($_POST["rol"]) {
			case '0':
				$rol = "gestion";
				break;
			case '1':
				$rol = "administracion";
				break;
			case '2':
				$rol = "consulta";
				break;
		}
		try {
			modificarRol($user,$rol);
			$msjExito = "El rol para el usuario '$user' fue modificado correctamente!";
			require("../vista/exito.html");
		}
		catch (Exception $e) {
		   	$msjE = $e->getMessage();
		   	header("Location: backend.php?controller=cambiarRol&user=$user");
		}
	}
?>