<?php
	
	function obtenerMatriculasPagas($pagina){
		require_once("cargarTwig.php");
		$titulo = obtenerInformacionTitulo();

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

		//Si es un usuario de consulta, solo puedo ver los alumnos que tengo a cargo
		if (rolConsulta($_SESSION["rol"])){
			try{
				$retorno = esResponsable($_SESSION["usuario"]);
				$total = totalAlumnosConMatriculaPagaDeUnResponsable($retorno[0]["id"]);
				$rows = obtenerAlumnosConMatriculaPagaDeUnResponsable($retorno[0]["id"],$inicio,$paginacion);//
				$total_paginas = ceil($total / $paginacion);
				$template = $twig->loadTemplate('VlistadoDeAlumnosConMatriculaPaga.twig.html');
				echo $template->render(array("usuario"=>$_SESSION["usuario"],"titulo"=>$titulo, "rol"=>$_SESSION["rol"],"total"=>$total_paginas,"pagina"=>$pagina,"cuotas"=>$rows));
				//$rows = obtenerAlumnosConMatriculaPagaDeUnResponsable($retorno[0]["id"]);
			}
			catch(Exception $e)
			{
				$msjE = $e->getMessage();
				$template = $twig->loadTemplate('VlistadoDeAlumnosConMatriculaPaga.twig.html');
				echo $template->render(array("usuario"=>$_SESSION["usuario"],"titulo"=>$titulo, "rol"=>$_SESSION["rol"],"msj"=>$msjE));
			}
		}
		//Para el rol de administracion o de gestion, muestro todos los alumnos
		else {
			try{
				$total = totalAlumnosConMatriculaPaga();
				$rows = alumnosConMatriculaPaga($inicio,$paginacion);//
				$total_paginas = ceil($total / $paginacion);
				$template = $twig->loadTemplate('VlistadoDeAlumnosConMatriculaPaga.twig.html');
				echo $template->render(array("usuario"=>$_SESSION["usuario"],"titulo"=>$titulo, "rol"=>$_SESSION["rol"],"total"=>$total_paginas,"pagina"=>$pagina,"cuotas"=>$rows));
				//$rows = alumnosConMatriculaPaga();
			}
			catch(Exception $e)
			{
				$msjE = $e->getMessage();
				$template = $twig->loadTemplate('VlistadoDeAlumnosConMatriculaPaga.twig.html');
				echo $template->render(array("usuario"=>$_SESSION["usuario"],"titulo"=>$titulo, "rol"=>$_SESSION["rol"],"msj"=>$msjE));
			}		
		}
		
		//require("../vista/VlistadoDeAlumnosConMatriculaPaga.html");
	}

?>