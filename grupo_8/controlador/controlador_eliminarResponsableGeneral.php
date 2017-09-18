<?php
	//Verifico que no entren directo por la url
	//Si entran directo por la url, estan evitando al controlador (backend.php)
	//Y pueden violar los roles
	if(!isset($_GET["controller"])){
		header("Location: backend.php?controller=index");
	}
        function eliminarResponsable2NM($titulo,$idResponsable){
        	$titulo = obtenerInformacionTitulo();
        try{
            eliminarResponsable2($idResponsable);
            $msjE = "El responsable se elimin&oacute; correctamente!";
            require "../vista/mensajeResponsables.html";;
        }
        catch (Exception $e) {
		   	$msjE = $e->getMessage();
		   	require "../vista/mensajeResponsables.html";
		}
    }
?>