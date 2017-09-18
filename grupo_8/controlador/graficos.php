<?php
	function verGraficos(){
		require_once("cargarTwig.php");

		$titulo = obtenerInformacionTitulo();
		$ingresosTotales = ingresosTotales();
		$ingresosCuota = ingresosCuota();
		$ingresosMatricula = ingresosMatricula();
		$porcentajeCuota = $ingresosCuota * 100 / $ingresosTotales;
		$porcentajeMatricula = $ingresosMatricula * 100 / $ingresosTotales;
		$pagos = array();
		$cuotas = array();
		$cuotas["nombre"]="Cuotas";
		$cuotas["total"]=$ingresosCuota;
		$cuotas["porcentaje"]=$porcentajeCuota;
		$matriculas= array();
		$matriculas["nombre"]="Matrículas";
		$matriculas["total"]=$ingresosMatricula;
		$matriculas["porcentaje"]=$porcentajeMatricula;
		$pagos[0]=$cuotas;
		$pagos[1]=$matriculas;
		$template = $twig->loadTemplate("graficos.twig.html");
		echo $template->render(array("usuario"=>$_SESSION["usuario"],"titulo"=>$titulo, "rol"=>$_SESSION["rol"],"total"=>$ingresosTotales,"cuotas"=>$ingresosCuota,"matriculas"=>$ingresosMatricula,"pCuota"=>$porcentajeCuota,"pMatricula"=>$porcentajeMatricula,"pagos"=>$pagos));
	}
?>