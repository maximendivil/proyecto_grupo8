<?php
	//Verifico que no entren directo por la url
	//Si entran directo por la url, estan evitando al controlador (backend.php)
	//Y pueden violar los roles
	if(!isset($_GET["controller"])){
		header("Location: backend.php?controller=index");
	}
    function deshabilitarAlumnoNM($pagina){
    	$titulo = obtenerInformacionTitulo();
        try{
            $exito = deshabilitarAlumno($_GET["id"]);
            header("Location: backend.php?controller=listadosAlumnos&pagina=".$pagina);
        }
        catch (Exception $e) {
		   	$msjE = $e->getMessage();
		   	require "../vista/mensajeAlumno.html";
		}
    }
?>