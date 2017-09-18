<?php
	//Verifico que no entren directo por la url
	//Si entran directo por la url, estan evitando al controlador (backend.php)
	//Y pueden violar los roles
	if(!isset($_GET["controller"])){
		header("Location: backend.php?controller=index");
	}
	function eliminarUsuarios($pagina){
		$titulo = obtenerInformacionTitulo();
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
			//$rows = obtenerUsuarios();
		}
		catch (Exception $e) {
		   	$msjE = $e->getMessage();
		}
		finally {			
		   	require '../vista/listadosEliminar.html';
		}
	}

	
?>