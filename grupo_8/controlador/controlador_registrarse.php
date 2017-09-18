<?php
	//Verifico que no entren directo por la url
	//Si entran directo por la url, estan evitando al controlador (backend.php)
	//Y pueden violar los roles
	if(!isset($_GET["controller"])){
		header("Location: backend.php?controller=index");
	}
	//Esta funcion la va a llamar el controlador
	function agregarUsuario(){
			$titulo = obtenerInformacionTitulo();
			if ($_POST["pass1"] != $_POST["pass2"]){
				$msjError = "Las contrase&ntilde;as no coinciden";
				require '../vista/registrarse.html';
			}
			else {
				$user = $_POST["user"];
				$pass = $_POST["pass1"];
				$mail = $_POST["mail"];
				$rol = "";
				switch ($_POST["rol"]) {
					case '0':
						$rol = "gestion";
						break;
					case '1':
						$rol = "administracion";
						break;
					case '2':
						$rol = "consulta";
						break;
				}
				//Aca antes validabamos que no exista el usuario
				//Ahora la logica esta en el metodo registrar()
				//Y en el caso de que ya exista, se levanta una excepcion
				try {
					registrar($user,$pass,$rol,$mail);
					$msjExito = "El usuario ha sido creado correctamente!";
					require '../vista/exito.html';
				}
				//Si ya existia, atrapo la excepcion y se la mando a la vista para que la muestre
				catch (Exception $e) {
				   	$msjError = $e->getMessage();
				   	require '../vista/registrarse.html';
				}
								
			
			}
	}



?>