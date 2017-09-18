<?php
	//Verifico que no entren directo por la url
	//Si entran directo por la url, estan evitando al controlador (backend.php)
	//Y pueden violar los roles
	if(!isset($_GET["controller"])){
		header("Location: backend.php?controller=index");
	}
	function agregarCuotaNM($titulo){
		$titulo = obtenerInformacionTitulo();
		try{
			agregarCuota($_POST["anioCuota"],$_POST["mes"],$_POST["monto"],$_POST["tipoCuota"],$_POST["comisionCobrador"],$_POST["cantCuotas"]);
			$msjE = "Éxito al agregar la(s) cuotas(s)";
            
            require "../vista/mensajeCuotas.html";
		}
		catch (Exception $e) {
		   	$msjE = $e->getMessage();
		   	require "../vista/mensajeCuotas.html";
		}
	}

	
?>