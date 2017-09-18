<?php

	function listadoDeComisiones($pagina){

		require_once("cargarTwig.php"); 
		$titulo = obtenerInformacionTitulo();

		//Obtengo de la URL el numero de la pagina. Al principio desde el archivo ../vista/menuListados.html lo mando con valor = a 1.
				
		//Obtengo la cantidad de elementos a mostrar por pagina (es el valor que esta en el modulo de configuracion)
		$paginacion = cantidadPaginacionSitio();
		//Esto estaria al pedo, pregunta si no esta seteada la variable $pagina.
		if (!$pagina) {
		   $inicio = 0;
		   $pagina = 1;
		}
		else {
			//Obtengo el comienzo del paginador
			$inicio = ($pagina - 1) * $paginacion;
		}

		if($_SESSION["rol"] == "administracion"){
			try{
				$total = totalUsuariosGestion();
				$rows = obtenerUsuariosGestores($inicio,$paginacion);				
				$total_paginas = ceil($total / $paginacion);
				$template = $twig->loadTemplate('elegirGestor.twig.html');
				echo $template->render(array("usuario"=>$_SESSION["usuario"],"titulo"=>$titulo, "rol"=>$_SESSION["rol"],"total"=>$total_paginas,"pagina"=>$pagina,"usuarios"=>$rows));
			}
			catch(Exception $e)
			{
				$msjE = $e->getMessage();
				$template = $twig->loadTemplate('VlistadoDeCuotasPoBporAoM.twig.html');
				echo $template->render(array("usuario"=>$_SESSION["usuario"],"titulo"=>$titulo, "rol"=>$_SESSION["rol"],"msj"=>$msjE));
			}
		}
		else{
			header("Location: backend.php?controller=verComisiones&id=".$_SESSION["id"]."&pagina=$pagina");			
		}
		
	}

?>