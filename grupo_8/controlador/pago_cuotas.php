<?php
	
	function obtenerCuotasAlumno($idAlumno,$pagina){
		$titulo = obtenerInformacionTitulo();
		//$paginacion = cantidadPaginacionSitio();
		$_SESSION["idAlumno"] = $idAlumno;
		/*if (!$pagina) {
		   $inicio = 0;
		   $pagina = 1;
		}
		else {
		   $inicio = ($pagina - 1) * $paginacion;
		}*/	
		try{
			$rows = totalCuotasImpagas($idAlumno);
			
		}
		catch (Exception $e){
			$msjE = $e->getMessage();
		} 
		//$rows = buscarCuotasImpagasParaUnAlumno($idAlumno,$inicio,$paginacion);
		
		//$total_paginas = ceil(count($total) / $paginacion);		
		
		

		try {
			$paginacion = cantidadPaginacionSitio();
			if (!$pagina) {
			   $inicio = 0;
			   $pagina = 1;
			}
			else {
				$inicio = ($pagina - 1) * $paginacion;
			}
			$total = totalCuotasPagas($idAlumno);
			$rowsPagas = buscarCuotasPagas($idAlumno,$inicio,$paginacion);
			$total_paginas = ceil($total / $paginacion);
		}
		catch (Exception $e){ 
			$msjImpagas = $e->getMessage();						
		}

		finally {
			require("../vista/pagarCuota.html");
		}
		
	}
?>