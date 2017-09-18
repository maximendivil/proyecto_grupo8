<?php
	session_start();

	require("../modelo/modelo_funciones.php");

	$passCorrecta = verificarPass($_SESSION["usuario"],$_POST["passAct"]);
	if( ! $passCorrecta){
		$msjError = "<p>La contrase&ntilde;a actual no es correcta</p>";
		require("../vista/modificar_pass.html");
	}
	else{
		if($_POST["pass1"] != $_POST["pass2"]){
			$msjError = "<p>Las contrase&ntilde;as no coinciden</p>";
			require("../vista/modificar_pass.html");
		}
		else {
			$resultado = modificarPass($_SESSION["usuario"],$_POST["pass1"]);
			if ($resultado){
				$msjExito = "<h3>La contrase&ntilde;a fue modificada correctamente!</h3>";
				require("../vista/exito.html");
			}
			else {
				echo "fallo";
			}
		}
	}
?>