<?php
        //Verifico que no entren directo por la url
	//Si entran directo por la url, estan evitando al controlador (backend.php)
	//Y pueden violar los roles
	if(!isset($_GET["controller"])){
		header("Location: backend.php?controller=index");
	}
	function agregarResponsableGeneral($titulo,$apellido,$nombre,$tipo,$fechaNac,$sexo,$mail,$tel,$direccion){
        $titulo = obtenerInformacionTitulo();
            try{
                agregarResponsable($apellido,$nombre,$tipo,$fechaNac,$sexo,$mail,$tel,$direccion,NULL);
                $msjE = "El responsable se agreg&oacute; correctamente!";
                require "../vista/mensajeResponsables.html";
            } catch (Exception $e) {
                $msjE = $e->getMessage();
		require "../vista/mensajeResponsables.html";
            }
        }
        
        
?>