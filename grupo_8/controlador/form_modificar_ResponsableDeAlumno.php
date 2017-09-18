<?php
	session_start();
        
        require("../modelo/modelo_funciones.php");
        
        $idResponsable = $_GET["idResponsable"];
        
        $rows = obtenerResponsableConId($idResponsable);
        
	require("../vista/form_modificar_ResponsableDeAlumno.html");
?>