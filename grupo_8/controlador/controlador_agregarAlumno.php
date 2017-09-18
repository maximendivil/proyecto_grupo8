<?php
	//Verifico que no entren directo por la url
	//Si entran directo por la url, estan evitando al controlador (backend.php)
	//Y pueden violar los roles
	if(!isset($_GET["controller"])){
		header("Location: backend.php?controller=index");
	}
        
        function agregarAlumnoNM($titulo,$dni,$apellido,$nombre,$fechaNac,$sexo,$mail,$direccion,$fechaIngreso,$latitud,$longitud){
            $titulo = obtenerInformacionTitulo();
            try{
                agregarAlumno($dni, $apellido, $nombre, $fechaNac, $sexo, $mail, $direccion, $fechaIngreso,$latitud,$longitud);
                $msjE = "El alumno se agreg&oacute; correctamente!";
                require "../vista/mensajeAlumno.html";
            } catch (Exception $e) {
                $msjE = $e->getMessage();
		require "../vista/mensajeAlumno.html";
            }
        }
?>