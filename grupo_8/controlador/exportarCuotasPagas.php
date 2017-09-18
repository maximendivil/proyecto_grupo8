<?php

	function exportar(){

		/*$titulo = obtenerInformacionTitulo();

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
		}*/


		//Si es un usuario de consulta, solo puedo ver los alumnos que tengo a cargo
		if (rolConsulta($_SESSION["rol"])){
			try{
				$retorno = esResponsable($_SESSION["usuario"]);
				$total = totalCuotasPoBporAoM($retorno[0]["id"]);
				$rows = obtenerCuotasPoBporAoM($retorno[0]["id"],0,$total);//ver si esta bien este store
				//$total_paginas = ceil($total / $paginacion);
			}
			catch(Exception $e)
			{
				$msjE = $e->getMessage();
			}
		}
		//Para el rol de administracion o de gestion, muestro todos los alumnos
		else {
			try{				
				//Para la paginacion siempre hay que hacer dos consultas:
				//1)La primera obtenemos el total de datos que vamos a paginar
				$total = totalCuotasPagadas();
				//2)En la segunda obtenemos los datos desde el inicio hasta el numero de paginacion.
				//echo $total;
				$rows = cuotasPagadasOBecadas(0,$total);
				//3)Calculamos el total de paginas que vamos a tener
				//$total_paginas = ceil($total / $paginacion);

				//Si tenes dudas, descomentá esta porcion de codigo y comenta el require de abajo de todo! 
				//Asi ves que te esta retornando cada cosa.
				/*echo "Paginacion: ".$paginacion;
				echo "<br>";
				echo "Pagina actual: ".$pagina;
				echo "<br>";
				echo "Total elementos: ".$total;
				echo "<br>";
				echo "Total paginas: ".$total_paginas;*/
				
			}
			catch(Exception $e)
			{
				$msjE = $e->getMessage();
			}		
		}
		//Recien en la vista muestro los botones "siguiente" y  "anterior" dependiendo del numero actual de pagina y del total
		//Desde la vista siempre se llama a este archivo, el cual vuelve a calcular en cada llamado el rango de datos a devolver.
		require("exportarListadoDeAlumnos.php");
	}

?>


