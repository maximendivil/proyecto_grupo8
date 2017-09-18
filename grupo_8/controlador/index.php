<?php
	require("../modelo/modelo_funciones.php");

	require_once('../Twig/vendor/autoload.php');
	$loader = new Twig_Loader_Filesystem('../vista');
	$twig = new Twig_Environment($loader); 

	$habilitado = verificarSitioHabilitado();

	if ($habilitado){
		$titulo = obtenerInformacionTitulo();
		$email = obtenerInformacionMail();
		$telefono = obtenerInformacionTelefono();
		$template = $twig->loadTemplate('vistaIndex.twig.html');
		echo $template->render(array("titulo"=>$titulo, "email"=>$email, "telefono"=>$telefono));	
		//require("../vista/vistaIndex.twig.html");
	}
	else {
		$msj = verMensajeDeshabilitado();		
		//require("../vista/vistaDeshabilitado.html");
	}
?>