<?php

	function listadoAlumnos($titulo){
		require_once("cargarTwig.php");

		$template = $twig->loadTemplate("listadoAlumnosMapa.html.twig");
		$title = "Generar recorrido";

		try {
			$total = totalAlumnos();
			$rows = obtenerAlumnos(0,$total);//			
			echo $template->render(array("titulo"=>$titulo,"title"=>$title,"usuario"=>$_SESSION["usuario"],"rol"=>$_SESSION["rol"],"rows"=>$rows));
		}
		catch (Exception $e) {
			$msjE = $e->getMessage();
			echo $template->render(array("titulo"=>$titulo,"title"=>$title,"usuario"=>$_SESSION["usuario"],"rol"=>$_SESSION["rol"],"msj"=>$msjE));
		}
	}

	function mostrarMapa($titulo){
		require_once("cargarTwig.php");

		if(isset($_POST['submit'])){
			$template = $twig->loadTemplate("mapas.twig.html");
			try{
				$i = 0;
				foreach ($_POST['alumno'] as $a):
					$arrayAlumno = obtenerAlumno($a);
					$array[$i]['lat'] = $arrayAlumno['latitud'];
					$array[$i]['lon'] = $arrayAlumno['longitud'];
					$array[$i]['nombre'] = $arrayAlumno['apellido']." ".$arrayAlumno['nombre'];
					$i++;
				endforeach;
				
			}catch(SException $e){
				$msj = "No se ha podido generar el recorrido";
			}
		}		
		echo $template->render(array("usuario"=>$_SESSION["usuario"],"titulo"=>$titulo,"rol"=>$_SESSION["rol"],'array' => $array, 'cantDir' => $i-1));
		//echo $twig->render('recorrido/mapa.html.twig',['titulo' => $titulo, 'user' => $_SESSION, 'mensaje' => $mensaje, 'array' => $array, 'cantDir' => $i-1]);
	}
?>