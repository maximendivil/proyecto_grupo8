<?php
	
	function exportarCuotasImpagas(){
		/*require_once("cargarTwig.php");
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
		}*/

		//Si es un usuario de consulta, solo puedo ver los alumnos que tengo a cargo
		if (rolConsulta($_SESSION["rol"])){
			try{
				$retorno = esResponsable($_SESSION["usuario"]);
				$total = totalCuotasImpagasPorAoM($retorno[0]["id"]);
				$rows = obtenerCuotasImpagasPorAoM($retorno[0]["id"],0,$total);//
				//$total_paginas = ceil($total / $paginacion);
				//$rows = obtenerCuotasImpagasPorAoM($retorno[0]["id"]);
			}
			catch(Exception $e)
			{
				$msjError = $e->getMessage();
			}
		}
		//Para el rol de administracion o de gestion, muestro todos los alumnos
		else {
			try{
				$total = totalCuotasImpagasListado();
				$rows = cuotasImpagas(0,$total);//
				//$total_paginas = ceil($total / $paginacion);
				/*$template = $twig->loadTemplate('VlistadoDeCuotasImpagasPorAoM.twig.html');
				echo $template->render(array("usuario"=>$_SESSION["usuario"],"titulo"=>$titulo, "rol"=>$_SESSION["rol"],"total"=>$total_paginas,"pagina"=>$pagina,"cuotas"=>$rows));
				//$rows = cuotasImpagas();//falta este store*/
			}
			catch(Exception $e)
			{
				$msjError = $e->getMessage();
			}		
		}
		
		require("exportarImpagas.php");
	}

?>