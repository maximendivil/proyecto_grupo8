<?php

function verComision($id, $pagina){
	require_once("cargarTwig.php");
	require_once("convertirMes.php");
	$titulo = obtenerInformacionTitulo();

	//Obtengo de la URL el numero de la pagina. Al principio desde el archivo ../vista/menuListados.html lo mando con valor = a 1.
			
	//Obtengo la cantidad de elementos a mostrar por pagina (es el valor que esta en el modulo de configuracion)
	$paginacion = cantidadPaginacionSitio();
	//Esto estaria al pedo, pregunta si no esta seteada la variable $pagina.
	if (!$pagina) {
	   $inicio = 0;
	   $pagina = 1;
	}
	else {
		//Obtengo el comienzo del paginador
		$inicio = ($pagina - 1) * $paginacion;
	}
	try{	
		$total = totalComisiones($id);
		$rows = comisionesUsuario($id,$inicio,$paginacion);
		$total_paginas = ceil($total / $paginacion);
		for($i=0; $i < count($rows); $i++){
			$rows[$i]["montoCuotas"] = $rows[$i]["monto"];
			$rows[$i]["monto"] = $rows[$i]["monto"] * $rows[$i]["comisionCobrador"] / 100;
			$rows[$i]["mes"] = convertirMes($rows[$i]["mes"]); 
		}
		$template = $twig->loadTemplate('listadoDeComisiones.twig.html');
		echo $template->render(array("usuario"=>$_SESSION["usuario"],"titulo"=>$titulo, "rol"=>$_SESSION["rol"],"total"=>$total_paginas,"pagina"=>$pagina,"cuotas"=>$rows,"id"=>$id));
		
	}
	catch(Exception $e)
	{
		$msjE = $e->getMessage();
		$template = $twig->loadTemplate('VlistadoDeCuotasPoBporAoM.twig.html');
		echo $template->render(array("usuario"=>$_SESSION["usuario"],"titulo"=>$titulo, "rol"=>$_SESSION["rol"],"msj"=>$msjE));
	}
}
?>