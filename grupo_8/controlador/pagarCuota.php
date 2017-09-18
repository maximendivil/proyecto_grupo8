<?php
	/*$idCuota = $_GET["idCuota"];
	$idAlumno = $_SESSION["idAlumno"];

	$resultado = pagarCuota($idCuota,$idAlumno);

	if ($resultado){
		require("pago_cuotas.php");
	}*/
	function pagarCuotas($idAlumno){
		$titulo = obtenerInformacionTitulo();
		$cuotas = $_POST["cuota"];
		if (count($cuotas)==0){
			$_SESSION["error"] =  "Debe seleccionar al menos una cuota";
			header("Location: backend.php?controller=cobrarCuotas&id=$idAlumno");
		}
		else {
			$_SESSION["error"] = "";
			if(isset($_POST["cobrar"])){
				$i = 0;
				$sigo = true;
				while(($i < count($_POST["cuota"]))and($sigo)) {
					try {
						pagarCuota($_POST["cuota"][$i],$idAlumno,$_SESSION["id"]);
						header("Location: backend.php?controller=cobrarCuotas&id=".$idAlumno);
						$i ++;
					}
					catch (Exception $e){
						$sigo = false;
						$msjE = $e->getMessage();
						require "../vista/error.html";
					}
				}
				
			}
			else {
				$i = 0;
				$sigo = true;
				while(($i < count($_POST["cuota"]))and($sigo)) {
					try {
						becarCuota($_POST["cuota"][$i],$idAlumno,$_SESSION["id"]);
						header("Location: backend.php?controller=cobrarCuotas&id=".$idAlumno);
						$i ++;
					}
					catch (Exception $e){
						$sigo = false;
						$msjE = $e->getMessage();
						require "../vista/error.html";
					}
				}
				//header("Location: pago_cuotas.php?id=$idAlumno");
			}
			
		}
	}
	

?>