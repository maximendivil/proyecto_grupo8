<?php
	session_start();
	
	require("../modelo/modelo_funciones.php");
	
	$apellido = $_POST["apellidoTutor"];
	$nombre = $_POST["nombreTutor"];
	$tipo = $_POST["tipoParentezco"];
	$fechaNac = $_POST["fechaNac"];
	$sexo = $_POST["sexo"];
	$mail = $_POST["email"];
	$tel = $_POST["tel"];
	$direccion = $_POST["direccion"];
	$user=NULL;
	$resultado = agregarResponsable($apellido,$nombre,$tipo,$fechaNac,$sexo,$mail,$tel,$direccion,$user);
		
	
	if($resultado){
		$msjExito = "<h3>El responsable se agreg&oacute; correctamente!</h3>";
		require("../vista/exito.html");		
	}
	else {
		require("../vista/responsableNoCreado.html");
	}
?>