<?php
	
	function verMenuConfig($titulo){
		require_once("cargarTwig.php");	

		$template = $twig->loadTemplate("menuConfiguracion.html.twig");
		echo $template->render(array("titulo"=>$titulo,"usuario"=>$_SESSION["usuario"],"rol"=>$_SESSION["rol"]));
	}

?>