<?php
	require("../modelo/modelo_funciones.php");
	$titulo = obtenerInformacionTitulo();
	require_once('../Twig/vendor/autoload.php');
	$loader = new Twig_Loader_Filesystem('../vista');
	$twig = new Twig_Environment($loader); 

	$template = $twig->loadTemplate('login.twig.html');
	echo $template->render(array("titulo"=>$titulo));

	//require("../vista/login.twig.html");
?>