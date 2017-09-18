<?php
	session_start();

	require("../modelo/modelo_funciones.php");

	if ($_POST["email1"] != $_POST["email2"]){
		$msjError = "<p>Los emails no coinciden</p>";
		require("modificar_mail.php");
	}
	else {
		$resultado = modificarMail($_POST["email1"],$_SESSION["usuario"]);
		if($resultado){
			$_SESSION["email"] = $_POST["email1"];
			$msjExito = "<h3>El email fue modificado correctamente!</h3>";
			require("../vista/exito.html");
		}
	}
?>