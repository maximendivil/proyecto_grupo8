<?php
	session_start();
	require("../modelo/modelo_funciones.php");
	
	$usuario = $_POST["usuario"];
	$pass = $_POST["contraseña"];

	try {
		$resultado = iniciarSesion($usuario,$pass);
		$msjError = "";
		$_SESSION["usuario"] = $resultado[0]["username"];
		$_SESSION["rol"] = $resultado[0]["rol"];
		$_SESSION["email"] = $resultado[0]["email"];
		$_SESSION["id"] = $resultado[0]["id"];
		header("Location: backend.php?controller=index");
	}
	catch(Exception $e)
	{
	  	$msjError = $e->getMessage();
	  	require_once('../Twig/vendor/autoload.php');
		$loader = new Twig_Loader_Filesystem('../vista');
		$twig = new Twig_Environment($loader); 
		$titulo = obtenerInformacionTitulo();
		$template = $twig->loadTemplate('login.twig.html');
		echo $template->render(array("titulo"=>$titulo,"mensaje"=>$msjError));
	}
	
?>