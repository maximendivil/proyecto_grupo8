<?php
	//Verifico que no entren directo por la url
	//Si entran directo por la url, estan evitando al controlador (backend.php)
	//Y pueden violar los roles
	if(!isset($_GET["controller"])){
		header("Location: backend.php?controller=index");
	}
	function editarCuotaNM($titulo){
		$titulo = obtenerInformacionTitulo();
		try{
                        $idCuota = $_GET["idCuota"];
                        $anio = $_POST["anioCuota"];
                        $mes = $_POST["mes"];
                        $tipoCuota = $_POST["tipoCuota"];
                        $monto = $_POST["monto"];
                        $comisionCobrador = $_POST["comisionCobrador"];
			editarCuota($idCuota,$anio,$mes,$tipoCuota,$monto,$comisionCobrador);
			$msjE = "La cuota se edit&oacute; correctamente!";
			require "../vista/mensajeCuotas.html";
		}
		catch (Exception $e) {
		   	$msjE = $e->getMessage();
		   	require "../vista/mensajeCuotas.html";
		}
	}

	
?>