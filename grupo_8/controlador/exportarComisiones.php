<?php

function exportar($id){
	require_once("convertirMes.php");
	try{	
		$total = totalComisiones($id);
		$rows = comisionesUsuario($id,0,$total);
		for($i=0; $i < count($rows); $i++){
			$rows[$i]["montoCuotas"] = $rows[$i]["monto"];
			$rows[$i]["monto"] = $rows[$i]["monto"] * $rows[$i]["comisionCobrador"] / 100;
			$rows[$i]["mes"] = convertirMes($rows[$i]["mes"]); 
		}
		require("exportarComisionesUsuario.php");
		
	}
	catch(Exception $e)
	{
		$msjE = $e->getMessage();
		$template = $twig->loadTemplate('listadoDeComisiones.twig.html');
		echo $template->render(array("usuario"=>$_SESSION["usuario"],"titulo"=>$titulo, "rol"=>$_SESSION["rol"],"msj"=>$msjE));
	}
}
?>