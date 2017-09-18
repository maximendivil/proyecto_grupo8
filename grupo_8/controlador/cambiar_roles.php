<?php
	//Verifico que no entren directo por la url
	//Si entran directo por la url, estan evitando al controlador (backend.php)
	//Y pueden violar los roles
	if(!isset($_GET["controller"])){
		header("Location: backend.php?controller=index");
	}
	
	function cambiarRoles($pagina){
		require_once("cargarTwig.php");
		$titulo = obtenerInformacionTitulo();
		$template = $twig->loadTemplate("listadosResponsables.html.twig");
		try{
			$paginacion = cantidadPaginacionSitio();
			if (!$pagina) {
			   $inicio = 0;
			   $pagina = 1;
			}
			else {
				$inicio = ($pagina - 1) * $paginacion;
			}
			$total = totalUsuarios();
			$rows = obtenerUsuarios($inicio,$paginacion);
			$total_paginas = ceil($total / $paginacion);
			echo $template->render(array("rol"=>$_SESSION["rol"],"titulo"=>$titulo,"usuarios"=>$rows,"usuario"=>$_SESSION["usuario"],"total_paginas"=>$total_paginas,"pagina"=>$pagina));		
		}
		catch (Exception $e) {
		   	$msjE = $e->getMessage();
		}
	}
?>