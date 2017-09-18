<?php
	//Verifico que no entren directo por la url
	//Si entran directo por la url, estan evitando al controlador (backend.php)
	//Y pueden violar los roles
	if(!isset($_GET["controller"])){
		header("Location: backend.php?controller=index");
	}
        function modificarResponsableDeAlumnoNM($titulo){
        	$titulo = obtenerInformacionTitulo();
            try{
			modificarResponsableDeAlumno($_GET["idResponsable"],$_POST["apellidoTutor"],$_POST["nombreTutor"],$_POST["tipoParentezco"],$_POST["fechaNac"],$_POST["sexo"],$_POST["email"],$_POST["tel"],$_POST["direccion"]);
			$msjE = "El responsable se modific&oacute; correctamente!";
			require "../vista/mensajeResponsables.html";
		}
		catch (Exception $e) {
		   	$msjE = $e->getMessage();
		   	require "../vista/mensajeResponsables.html";
		}
    }
?>