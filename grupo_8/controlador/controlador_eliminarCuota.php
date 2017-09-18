<?php
	//Verifico que no entren directo por la url
	//Si entran directo por la url, estan evitando al controlador (backend.php)
	//Y pueden violar los roles
	if(!isset($_GET["controller"])){
		header("Location: backend.php?controller=index");
	}
	function eliminarCuotaNM($titulo,$idCuota){
		$titulo = obtenerInformacionTitulo();
		try{			
			eliminarCuota($idCuota);
			$msjE = "La cuota se elimin&oacute; correctamente!";
			require "../vista/mensajeCuotas.html";
		}
		catch (Exception $e) {
		   	$msjE = $e->getMessage();
		   	require "../vista/mensajeCuotas.html";
		}
	}

	
?>