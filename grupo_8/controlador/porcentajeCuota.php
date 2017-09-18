<?php
	header('Content-Type: application/json');
	$jsondata = array();
	$a = $_POST["porcentajeCuota"];
	$ingresosTotales = ingresosTotales();
	$ingresosCuota = ingresosCuota();
	$porcentajeCuota = $ingresosCuota * 100 / $ingresosTotales;
	echo json_encode($porcentajeCuota);
?>