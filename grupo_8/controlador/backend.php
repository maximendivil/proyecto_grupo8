<?php
	session_start();

    require("../modelo/modelo_funciones.php");
    require("controlador_funcionesDeVerificacion.php");
    require('../fpdf17/fpdf.php'); // -Librería para pasar listados a PDF-

    require_once('../Twig/vendor/autoload.php');
	$loader = new Twig_Loader_Filesystem('../vista');
	$twig = new Twig_Environment($loader);
        
    $twig->addExtension(new Twig_Extension_Debug());

	function controlarRoles($rol,$requerimiento){
		switch ($requerimiento) {
			case 'menuCuotas':
				if ($rol == "consulta"){
					return false; //Esto no debería devolver "True"?
				}
				else {
					return true;
				}
				break;
			case 'menuUsuarios':
				if ($rol == "administracion"){
					return true;
				}
				else {
					return false;
				}
				break;
			case 'menuAlumnos':
				if ($rol == "administracion"){
					return true;
				}
				else {
					return false;
				}
				break;
                        case 'menuResponsables':
				if ($rol == "administracion"){
					return true;
				}
				else {
					return false;
				}
				break;
			case 'menuConfig':
				if ($rol == "administracion"){
					return true;
				}
				else {
					return false;
				}
				break;
			case 'listadoComisiones':
				if (($rol == "administracion")or($rol=="gestion")){
					return true;
				}
				else {
					return false;
				}
				break;
			case 'menuMapas':
				if (($rol == "administracion")or($rol=="gestion")){
					return true;
				}
				else {
					return false;
				}
				break;
			case 'menuListados':
				return true;
				
				break;
			
			default:
				return false;
				break;
		}
	}

	if (isset($_SESSION["usuario"])){
                
		$titulo = obtenerInformacionTitulo();
		if (isset($_GET["controller"])){
			$requerimiento = $_GET["controller"];
			switch ($requerimiento) {
				case 'menuCuotas':
					if (controlarRoles($_SESSION["rol"],$requerimiento)){
						header("Location: backend.php?controller=listado_cuotas&pagina=1");
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
				case 'index':
					//require("../vista/operaciones.html");
					$template = $twig->loadTemplate('headerBackend.twig.html');
					echo $template->render(array("usuario"=>$_SESSION["usuario"],"titulo"=>$titulo, "rol"=>$_SESSION["rol"]));
					break;
				case 'menuUsuarios':
					if (controlarRoles($_SESSION["rol"],$requerimiento)){
						header("Location: backend.php?controller=cambiarRoles&pagina=1");
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
				case 'menuMapas':
					if (controlarRoles($_SESSION["rol"],"menuMapas")){
						/*$direccion = obtenerDireccion();
						$template = $twig->loadTemplate('mapas.twig.html');
						echo $template->render(array("usuario"=>$_SESSION["usuario"],"titulo"=>$titulo, "rol"=>$_SESSION["rol"], "direccion"=>$direccion));*/
						require_once("mapas.php");
						listadoAlumnos($titulo);
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
				case 'mostrarAlumnos':
					if (controlarRoles($_SESSION["rol"],"menuMapas")){
						require_once("mapas.php");
						mostrarMapa($titulo);
					}
					else {
						require("../vista/operaciones.html");
					}
					break;	
                                case 'menuAlumnos': //Acá debería ir el listado de los alumnos
					if (controlarRoles($_SESSION["rol"],$requerimiento)){
						header("Location: backend.php?controller=listadosAlumnos&pagina=1");
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
				case 'menuConfig':
					if (controlarRoles($_SESSION["rol"],$requerimiento)){
						require("menu_configuracion.php");
						verMenuConfig($titulo);
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
				case 'menuListados':
					if (controlarRoles($_SESSION["rol"],$requerimiento)){
						$template = $twig->loadTemplate('menuListados.html.twig');
						echo $template->render(array("usuario"=>$_SESSION["usuario"],"titulo"=>$titulo, "rol"=>$_SESSION["rol"]));
						//require("../vista/menuListados.html.twig");
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
                                case 'menuResponsables':
					if (controlarRoles($_SESSION["rol"],$requerimiento)){
						header("Location: backend.php?controller=listadoResponsables&pagina=1");
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
				case 'agregarUsuario':
					if (controlarRoles($_SESSION["rol"],"menuUsuarios")){
						require("../vista/registrarse.html");
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
				case 'listadosMatriculasPagas':
					if (controlarRoles($_SESSION["rol"],"menuListados")){
						$pagina = $_GET["pagina"];
						require("listadoDeAlumnosConMatriculaPaga.php");
						obtenerMatriculasPagas($pagina);
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
				case 'graficos':
					if (controlarRoles($_SESSION["rol"],"menuListados")){
						require("graficos.php");
						verGraficos();
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
				case 'porcentajeCuotas':
					if (controlarRoles($_SESSION["rol"],"menuListados")){
						require("porcentajeCuota.php");
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
				case 'listadoDeCuotasImpagas':
					if (controlarRoles($_SESSION["rol"],"menuListados")){
						$pagina = $_GET["pagina"];
						require("listadoDeCuotasImpagasPorAoM.php");
						listadoDeCuotasImpagas($pagina);
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
				case 'listadoDeComisiones':
					if (controlarRoles($_SESSION["rol"],"listadoComisiones")){
						$pagina = $_GET["pagina"];
						require("listadoDeComisiones.php");
						listadoDeComisiones($pagina);
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
				case 'verComisiones':
					if (controlarRoles($_SESSION["rol"],"listadoComisiones")){
                        $id = $_GET["id"];
                        $pagina = $_GET["pagina"];
                        require("verComisiones.php");
                        verComision($id,$pagina);
					}
					else {
                        require("../vista/operaciones.html");
					}
					break;
				case 'listadoDeAlumnos':
					if (controlarRoles($_SESSION["rol"],"menuListados")){
						$pagina = $_GET["pagina"];
						$paginacion = cantidadPaginacionSitio();
						if (!$pagina) {
						   $inicio = 0;
						   $pagina = 1;
						}
						else {
							$inicio = ($pagina - 1) * $paginacion;
						}
						if ($_SESSION["rol"] != "consulta") {
							try {
								$total = totalAlumnos();
								$rows = obtenerAlumnos($inicio,$paginacion);//
								$total_paginas = ceil($total / $paginacion);
							}
							catch (Exception $e) {
								$msjE = $e->getMessage();
							}
							finally {
								require "../vista/VlistadoDeAlumnos.html";
							}
						}
						else {
							try {
								$retorno = esResponsable($_SESSION["usuario"]);
								$total = totalAlumnosResponsable($retorno[0]["id"]);								
								$rows = obtenerAlumnosResponsable($retorno[0]["id"],$inicio,$paginacion);
								$total_paginas = ceil($total / $paginacion);
							}
							catch (Exception $e) {
								$msjE = $e->getMessage();
							}
							finally {
								require "../vista/VlistadoDeAlumnos.html";
							}
						}
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
				case 'listadoDeCuotasPagas':
					if (controlarRoles($_SESSION["rol"],"menuListados")){
						$pagina = $_GET["pagina"];
						require("listadoDeCuotasPoBporAoM.php");
						listadoDeCuotasPagas($pagina);
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
				case 'exportarListadoDeAlumnos':
					if (controlarRoles($_SESSION["rol"],"menuListados")){
						//$pagina = $_GET["pagina"];
						require("exportarCuotasPagas.php");
						exportar();
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
				case 'exportarComisiones':
					if (controlarRoles($_SESSION["rol"],"listadoComisiones")){
						//$pagina = $_GET["pagina"];
						require("exportarComisiones.php");
						$id = $_GET["id"];
						exportar($id);
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
				case 'exportarListadoDeMatriculas':
					if (controlarRoles($_SESSION["rol"],"menuListados")){
						//$pagina = $_GET["pagina"];
						require("exportarMatriculasPagas.php");
						exportarMatriculas();
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
				case 'exportarCuotasImpagas':
					if (controlarRoles($_SESSION["rol"],"menuListados")){
						//$pagina = $_GET["pagina"];
						require("exportarCuotasImpagas.php");
						exportarCuotasImpagas();
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
				case 'informacionConfig':
					if (controlarRoles($_SESSION["rol"],"menuConfig")){
						$titulo = obtenerInformacionTitulo();
						$email = obtenerInformacionMail();
						$telefono = obtenerInformacionTelefono();

						require("../vista/informacion.html");
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
				case 'establecerInformacion':
					if (controlarRoles($_SESSION["rol"],"menuConfig")){
                                            if ((isset($_POST["tit"])) && (isset($_POST["mail"])) && (isset($_POST["tel"])) && verificarCamposInformacion($_POST["tit"], $_POST["mail"], $_POST["tel"])){                                                                            
						$titulo = establecerInformacionTitulo($_POST["tit"]);
						$email = establecerInformacionMail($_POST["mail"]);
						$telefono = establecerInformacionTelefono($_POST["tel"]);
						header("Location: backend.php?controller=menuConfig");
                                            } else {
                                                $msjE = "No se pudo establecer la nueva información. Verifique que los datos que está ingresando sean válidos.";
                                                require("../vista/mensajeConfiguracion.html");
                                            }
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
				case 'paginacionConfig':
					if (controlarRoles($_SESSION["rol"],"menuConfig")){
						$paginacion = cantidadPaginacionSitio();
						require("../vista/paginacion.html");
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
				case 'establecerPaginacion':
					if (controlarRoles($_SESSION["rol"],"menuConfig")){
                                            if (isset($_POST["pag"]) && verificarCamposPaginacion($_POST["pag"])){
						$paginacion = establecerPaginacion($_POST["pag"]);
						header("Location: backend.php?controller=menuConfig");
                                            } else {
                                                $msjE = "Error al tratar de establecer la paginación. Verifique que los datos ingresados sean válidos.";
                                                require '../vista/mensajeConfiguracion.html';
                                            }
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
				case 'habilitarSitioConfig':
					if (controlarRoles($_SESSION["rol"],"menuConfig")){
						$habilitado = verificarSitioHabilitado();
						require("../vista/habilitar_sitio.html");
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
				case 'habilitarSitio':
					if (controlarRoles($_SESSION["rol"],"menuConfig")){
						if (isset($_POST["hab"])){
							$habilitado = habilitarSitio();
						}
						else {
							$habilitado = deshabilitarSitio();
						}
						header("Location: backend.php?controller=menuConfig");
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
				case 'mensajeDeshabilitadoConfig':
					if (controlarRoles($_SESSION["rol"],"menuConfig")){
						$msj = verMensajeDeshabilitado();
						require("../vista/mensaje_deshabilitado.html");
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
				case 'mensajeDeshabilitado':
					if (controlarRoles($_SESSION["rol"],"menuConfig")){
                                            if (isset($_POST["msj"]) && verificarCamposMensajeDeshabilitado($_POST["msj"])){
						$msj = establecerMensajeDeshabilitado($_POST["msj"]);
						header("Location: backend.php?controller=menuConfig");
                                            } else {
                                                $msjE= "Error al tratar de establecer el nuevo mensaje de sitio deshabilitado. Verifique que los datos ingresados son válidos.";
                                                require '../vista/mensajeConfiguracion.html';
                                            }
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
				case 'agregarUsuarioDB':
					if (controlarRoles($_SESSION["rol"],"menuUsuarios")){
                                            if (isset($_POST["user"]) && (isset($_POST["pass1"])) && (isset($_POST["mail"])) && (isset($_POST["rol"])) && (verificarCamposUsuario($_POST["user"], $_POST["pass1"], $_POST["mail"], $_POST["rol"]))){
						require("controlador_registrarse.php");
						agregarUsuario($titulo);
                                            } else {
                                                $msjExito = "El usuario no se pudo agregar. Verifique que los datos que ingresa sean válidos.";
                                                require ("../vista/exito.html");
                                            }
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
                                case 'deshabilitarAlumno':
                                    if (controlarRoles($_SESSION["rol"],"menuAlumnos")){
                                        require("deshabilitar_alumno.php");
                                        $pagina=$_GET["pagina"];
                                        deshabilitarAlumnoNM($pagina);
                                    } else {
                                        require("../vista/operaciones.html");
                                    }
                                    break;
                                case 'habilitarAlumno':
                                    if (controlarRoles($_SESSION["rol"],"menuAlumnos")){
                                        require("habilitar_alumno.php");
                                        $pagina=$_GET["pagina"];
                                        habilitarAlumnoNM($pagina);
                                    } else {
                                        require("../vista/operaciones.html");
                                    }
                                    break;
                                case 'formulario_agregarAlumno':
                                    if (controlarRoles($_SESSION["rol"],"menuAlumnos")){
                                        $template = $twig ->loadTemplate('formulario_agregarAlumno.twig.html');
                                        echo $template -> render(array("usuario"=>$_SESSION["usuario"],"rol"=>$_SESSION["rol"],"titulo"=>$titulo,"latitud"=>-34.90395296559004,"longitud"=>-57.93803215026855));
                                    } else {
                                        require("../vista/operaciones.html");
                                    }
                                    break;
                                case 'controlador_agregarAlumno':
                                    if (controlarRoles($_SESSION["rol"],"menuAlumnos")){
                                        if (isset($_POST["dni"]) && (isset($_POST["apellido"])) && (isset($_POST["nombre"])) && (isset($_POST["fechaNac"])) && (isset($_POST["sexo"])) && (isset($_POST["mail"])) && (isset($_POST["direccion"])) && (isset($_POST["fechaIngreso"])) && isset($_POST["latitud"]) && isset($_POST["longitud"]) && verificarCamposAlumno($_POST["dni"],$_POST["apellido"],$_POST["nombre"],$_POST["fechaNac"],$_POST["sexo"],$_POST["mail"],$_POST["direccion"],$_POST["fechaIngreso"],$_POST["latitud"], $_POST["longitud"])){
                                            require("controlador_agregarAlumno.php");
                                            agregarAlumnoNM($titulo,$_POST["dni"],$_POST["apellido"],$_POST["nombre"],$_POST["fechaNac"], $_POST["sexo"],$_POST["mail"],$_POST["direccion"],$_POST["fechaIngreso"],$_POST["latitud"], $_POST["longitud"]);
                                        } else{
                                            $msjE = "Los datos ingresados no son válidos. Verifique que no quedaron campos obligatorios sin completar y que no ingresó caracteres inválidos o números en los campos 'Nombre' y 'Apellido";
                                            require ("../vista/mensajeAlumno.html");
                                        }
                                    } else {
                                        require("../vista/operaciones.html");
                                    }
                                    break;
                                case 'formulario_editarAlumno':
                                    if (controlarRoles($_SESSION["rol"],"menuAlumnos")){
                                        $rows = obtenerAlumnoConId($_GET["id"]);
                                        if (count($rows)>0){
                                            $template = $twig ->loadTemplate('formulario_editarAlumno.twig.html');
                                            echo $template -> render(array("usuario"=>$_SESSION["usuario"],"rol"=>$_SESSION["rol"],"titulo"=>$titulo, "alumno" => $rows[0]));
                                        } else{
                                            die();
                                        }    
                                    } else {
                                        require("../vista/operaciones.html");
                                    }
                                    break;
                                case 'controlador_editarAlumno':
                                    if (controlarRoles($_SESSION["rol"],"menuAlumnos")){
                                        if (isset($_POST["dni"]) && (isset($_POST["apellido"])) && (isset($_POST["nombre"])) && (isset($_POST["fechaNac"])) && (isset($_POST["sexo"])) && (isset($_POST["mail"])) && (isset($_POST["direccion"])) && (isset($_POST["fechaIngreso"])) && isset($_POST["latitud"]) && isset($_POST["longitud"]) && verificarCamposAlumno($_POST["dni"],$_POST["apellido"],$_POST["nombre"],$_POST["fechaNac"],$_POST["sexo"],$_POST["mail"],$_POST["direccion"],$_POST["fechaIngreso"],$_POST["latitud"], $_POST["longitud"])){
                                            require("controlador_editarAlumno.php");
                                            editarAlumnoNM($titulo,$_GET["idAlumno"],$_POST["dni"],$_POST["apellido"],$_POST["nombre"],$_POST["fechaNac"], $_POST["sexo"],$_POST["mail"],$_POST["direccion"],$_POST["fechaIngreso"],$_POST["latitud"], $_POST["longitud"]);
                                        }else{
                                            $msjE = "Los datos ingresados no son válidos. Verifique que no quedaron campos obligatorios sin completar y que no ingresó caracteres inválidos o números en los campos 'Nombre' y 'Apellido";
                                            require ("../vista/mensajeAlumno.html");
                                        }
                                    } else {
                                        require("../vista/operaciones.html");
                                    }
                                    break;
				case 'cambiarRoles':
					if (controlarRoles($_SESSION["rol"],"menuUsuarios")){
						$pagina = $_GET["pagina"];
						require("cambiar_roles.php");
						cambiarRoles($pagina);
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
				case 'cambiarRol':
					if (controlarRoles($_SESSION["rol"],"menuUsuarios")){
                        if (isset($_GET["user"]) && isset($_POST["rol"]) && verificarCamposCambiarRol($_GET["user"], $_POST["rol"])){
						require("cambiar_rol.php");
						cambiarRol($_GET["user"]);
                                            }
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
				case 'formRol':
					if (controlarRoles($_SESSION["rol"],"menuUsuarios")){
						$user = $_GET["user"];
						require("../vista/cambiarRol.html");
						
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
				case 'eliminarUsuarios':
					if (controlarRoles($_SESSION["rol"],"menuUsuarios")){
						$pagina = $_GET["pagina"];
						require("eliminar_cuenta.php");
						eliminarUsuarios($pagina);
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
				case 'eliminarUsuarioDB':
					if (controlarRoles($_SESSION["rol"],"menuUsuarios")){
						$user = $_GET["user"];
						$valor = $_GET["valor"];
						require("eliminar_usuario.php");
						eliminarUser($user,$valor);
					}
					else {
						require("../vista/operaciones.html");
					}
					break;
	                                
                                case 'formulario_AgregarCuota':
                                    if (controlarRoles($_SESSION["rol"],"menuCuotas")){
                                        $template = $twig ->loadTemplate('formulario_AgregarCuotaAlumno.twig.html');
                                        echo $template -> render(array("usuario"=>$_SESSION["usuario"],"rol"=>$_SESSION["rol"],"titulo"=>$titulo));
                                    }
                                    else {
                                        require("../vista/operaciones.html");
                                    }
                                    break;
                                case 'agregarCuotaDB':
                                    if (controlarRoles($_SESSION["rol"],"menuCuotas")){
                                        if ((isset($_POST["anioCuota"])) && (isset($_POST["mes"])) && (isset($_POST["monto"])) && (isset($_POST["tipoCuota"])) && (isset($_POST["comisionCobrador"])) && (isset($_POST["cantCuotas"])) && verificarCamposCuota($_POST["anioCuota"],$_POST["mes"],$_POST["monto"], $_POST["tipoCuota"],$_POST["comisionCobrador"],$_POST["cantCuotas"])){
                                            require("../controlador/controlador_agregarCuota.php");
                                            agregarCuotaNM($titulo);
                                        } else {
                                            $msjE= "Hubo un error al agregar la(s) cuota(s). Verifique que los datos que está ingresando son válidos.";
                                            require "../vista/mensajeCuotas.html";
                                        }
                                    }
                                    else {
                                        require("../vista/operaciones.html");
                                    }
                                    break;
                                case 'formulario_agregarResponsable':
                                    if (controlarRoles($_SESSION["rol"],"menuResponsables")){
                                        require("../vista/formulario_agregarResponsable.html");
                                    }
                                    else {
                                        require("../vista/operaciones.html");
                                    }
                                    break;
                                case 'controlador_agregarResponsableGeneral':
                                    if (controlarRoles($_SESSION["rol"],"menuResponsables")){
                                        if (isset($_POST["apellidoTutor"]) && (isset($_POST["nombreTutor"])) && (isset($_POST["tipoParentezco"])) && (isset($_POST["fechaNac"])) && (isset($_POST["sexo"])) && (isset($_POST["email"])) && (isset($_POST["tel"])) && (isset($_POST["direccion"]))){
                                            require("controlador_agregarResponsableGeneral.php");
                                            agregarResponsableGeneral($titulo,$_POST["apellidoTutor"],$_POST["nombreTutor"],$_POST["tipoParentezco"],$_POST["fechaNac"],$_POST["sexo"],$_POST["email"],$_POST["tel"],$_POST["direccion"]);
                                        } else {
                                           $msjE = "El responsable no pudo ser agregado. Verifique que los datos que ingrese sean válidos.";
                                           require ("../vista/mensajeResponsables.html");
                                        }
                                    }
                                    else {
                                        require("../vista/operaciones.html");
                                    }
                                        break;
                                    case 'listadoResponsables':
                                        if (controlarRoles($_SESSION["rol"],"menuResponsables")){
                                            try{
                                                $pagina = $_GET["pagina"];
						$paginacion = cantidadPaginacionSitio();
						if (!$pagina) {
                                                    $inicio = 0;
                                                    $pagina = 1;
						}
						else {
                                                    $inicio = ($pagina - 1) * $paginacion;
                                                }
						$total = totalResponsables();
						$rows = obtenerResponsables($inicio,$paginacion);
						$total_paginas = ceil($total / $paginacion);
                                                $template = $twig ->loadTemplate('listadoResponsables.twig.html');
                                                echo $template -> render(array("usuario"=>$_SESSION["usuario"],"rol"=>$_SESSION["rol"],"titulo"=>$titulo, "responsables" => $rows,"total_paginas"=>$total_paginas,"pagina"=>$pagina));
						}
                                            catch (Exception $e){
                                                $msjE = $e->getMessage();
                                                $template = $twig ->loadTemplate('listadoResponsables.twig.html');
                                                echo $template -> render(array("usuario"=>$_SESSION["usuario"],"rol"=>$_SESSION["rol"],"titulo"=>$titulo, "msj" => $msjE));
                                            }                   
                                        }
                                        else {
                                            require("../vista/operaciones.html");
                                        }
                                        break;
                                    case 'formulario_editarResponsable':
                                        if (controlarRoles($_SESSION["rol"],"menuResponsables")){
                                            $rows = obtenerResponsableConId($_GET["idResponsable"]);
                                            if (count($rows)>0){
                                                require("../vista/form_modificar_ResponsableDeAlumno.html");
                                            } else {
                                                die();
                                            }
                                        }
                                        else {
                                            require("../vista/operaciones.html");
                                        }
                                        break;
                                    case 'controlador_editarResponsable':
                                        if (controlarRoles($_SESSION["rol"],"menuResponsables")){
                                            if (isset($_POST["apellidoTutor"]) && (isset($_POST["nombreTutor"])) && (isset($_POST["tipoParentezco"])) && (isset($_POST["fechaNac"])) && (isset($_POST["sexo"])) && (isset($_POST["email"])) && (isset($_POST["tel"])) && (isset($_POST["direccion"])) && verificarCamposResponsable($_POST["apellidoTutor"],$_POST["nombreTutor"],$_POST["tipoParentezco"],$_POST["fechaNac"],$_POST["sexo"],$_POST["email"],$_POST["tel"],$_POST["direccion"])){
                                                require("controlador_editarResponsableGeneral.php");
                                                modificarResponsableDeAlumnoNM($titulo);
                                            } else {
                                                $msjE = "El responsable no pudo ser modificado. Verifique que los datos que ingrese sean válidos.";
                                                require ("../vista/mensajeResponsables.html");
                                            }
                                        }
                                        else {
                                            require("../vista/operaciones.html");
                                        }
                                        break;
                                    case 'controlador_eliminarResponsableGeneral':
                                        if (controlarRoles($_SESSION["rol"],"menuResponsables")){
                                            require("controlador_eliminarResponsableGeneral.php");
                                            eliminarResponsable2NM($titulo,$_GET["idResponsable"]);
                                        }
                                        else {
                                            require("../vista/operaciones.html");
                                        }
                                        break;
                                    case 'agregarResponsableAUsuario':
					if (controlarRoles($_SESSION["rol"],"menuUsuarios")){
                                            $pagina = $_GET["pagina"];
                                            $paginacion = cantidadPaginacionSitio();
                                            if (!$pagina) {
						$inicio = 0;
                                                $pagina = 1;
                                            }
                                            else {
                                                $inicio = ($pagina - 1) * $paginacion;
                                            }
                                            $total = totalUsuariosSinResponsable();
                                            $rows = usuariosSinResponsable($inicio,$paginacion);
                                            $total_paginas = ceil($total / $paginacion);
                                            //$rows = usuariosSinResponsable();
                                            require("../vista/listadoUsuariosSinResponsable.html");
					}
					else {
                                            require("../vista/operaciones.html");
					}
					break;
                                    case 'agregarResponsableDB':
					if (controlarRoles($_SESSION["rol"],"menuUsuarios")){
                                            $user = $_GET["user"];
                                            $idResponsable = $_GET["responsable"];
                                            require("agregarResponsable.php");
                                            insertResponsable($user,$idResponsable);
					}
					else {
                                            require("../vista/operaciones.html");
					}
					break;
                                    case 'vistaAgregarResponsable':
					if (controlarRoles($_SESSION["rol"],"menuUsuarios")){
                                            $user = $_GET["user"];
                                            try {
						$pagina = $_GET["pagina"];
						$paginacion = cantidadPaginacionSitio();
						if (!$pagina) {
						    $inicio = 0;
						    $pagina = 1;
						}
						else {
                                                    $inicio = ($pagina - 1) * $paginacion;
						}
						$total = totalResponsablesDeAlumnosSinUsuario();
						$rows = obtenerResponsablesDeAlumnosSinUsuario($inicio,$paginacion);
						$total_paginas = ceil($total / $paginacion);
						//$rows = obtenerResponsablesDeAlumnosSinUsuario();
						}
                                            catch (Exception $e){
                                                $msjE = $e->getMessage();
                                            }
                                            finally{
                                                require("../vista/listadoResponsablesSinUsuario.html");
                                            }
					}
					else {
                                            require("../vista/operaciones.html");
					}
					break;
                                    case 'listado_cuotas':
                                        if (controlarRoles($_SESSION["rol"],"menuCuotas")){
                                            $pagina = $_GET["pagina"];
                                            $paginacion = cantidadPaginacionSitio();
                                            if (!$pagina) {
						$inicio = 0;
						$pagina = 1;
                                            }
                                            else {
						$inicio = ($pagina - 1) * $paginacion;
                                            }
                                            $total = totalCuotas();
                                            $rows = obtenerCuotas($inicio,$paginacion);
                                            if (count($rows)>0){
                                                $total_paginas = ceil($total / $paginacion);
                                                $template =  $twig ->loadTemplate('menuPagoCuotas.twig.html');
                                                echo $template->render(array("usuario"=>$_SESSION["usuario"],"rol"=>$_SESSION["rol"],"titulo"=>$titulo,"cuotas"=>$rows,"total_paginas"=>$total_paginas,"pagina"=>$pagina));
                                            } else {
                                                $msjE="No hay cuotas.";
                                                $template =  $twig ->loadTemplate('menuPagoCuotas.twig.html');
                                                echo $template->render(array(array("usuario"=>$_SESSION["usuario"],"rol"=>$_SESSION["rol"],"titulo"=>$titulo,"msj"=> $msjE)));
                                            }
					}
					else {
                                            require("../vista/operaciones.html");
					}
					break;  
                                    case 'eliminarCuotaBD':
                                        if (controlarRoles($_SESSION["rol"],"menuCuotas")){
                                            $idCuota = $_GET["idCuota"];
                                            require("../controlador/controlador_eliminarCuota.php");
                                            eliminarCuotaNM($titulo, $idCuota);
					}
					else {
                                            require("../vista/operaciones.html");
					}
					break;
                                    case 'formulario_editarCuota':
                                        if (controlarRoles($_SESSION["rol"],"menuCuotas")){
                                            $cuota = obtenerCuotaConId($_GET["idCuota"]);
                                            if(count($cuota)>0){
                                                $template = $twig ->loadTemplate('formulario_editarCuota.twig.html');
                                                echo $template -> render(array("usuario"=>$_SESSION["usuario"],"rol"=>$_SESSION["rol"],"titulo"=>$titulo, "cuota"=>$cuota[0]));
                                            } else{
                                                die();
                                            }
					}
					else {
                                            require("../vista/operaciones.html");
					}
					break;
                                    case 'editarCuotaBD':
                                        if (controlarRoles($_SESSION["rol"],"menuCuotas")){
                                            if ((isset($_POST["anioCuota"])) && (isset($_POST["mes"])) && (isset($_POST["monto"])) && (isset($_POST["tipoCuota"])) && (isset($_POST["comisionCobrador"])) && verificarCamposCuota($_POST["anioCuota"],$_POST["mes"], $_POST["monto"], $_POST["tipoCuota"],$_POST["comisionCobrador"],1)){
                                                require("../controlador/controlador_editarCuota.php");
                                                editarCuotaNM($titulo);
                                            } else {
                                                $msjE = "La cuota no pudo ser editada. Verifique que los datos que ingrese sean válidos.";
                                                require "../vista/mensajeCuotas.html";
                                            }
					}
					else {
                                            require("../vista/operaciones.html");
					}
					break;
                                    case 'verPagos':
					if (controlarRoles($_SESSION["rol"],"menuCuotas")){
                                            $pagina = $_GET["pagina"];
                                            $paginacion = cantidadPaginacionSitio();
                                            if (!$pagina) {
                                                $inicio = 0;
						$pagina = 1;
                                            }
                                            else {
                                                $inicio = ($pagina - 1) * $paginacion;
                                            }
                                            $total = totalAlumnos();
                                            $rows = obtenerAlumnos($inicio,$paginacion);
                                            $total_paginas = ceil($total / $paginacion);
                                            require("../vista/alumnosCuota.html");
                                            //insertResponsable($user,$idResponsable);
					}
					else {
                                            require("../vista/operaciones.html");
					}
					break;
                                    case 'verPagosAlumnos':
					if (controlarRoles($_SESSION["rol"],"menuCuotas")){
                                            $pagina = $_GET["pagina"];
                                            $paginacion = cantidadPaginacionSitio();
                                            if (!$pagina) {
                                                $inicio = 0;
						$pagina = 1;
                                            }
                                            else {
                                                $inicio = ($pagina - 1) * $paginacion;
                                            }
                                            $total = totalAlumnos();
                                            $rows = obtenerAlumnos($inicio,$paginacion);
                                            $total_paginas = ceil($total / $paginacion);
                                            require("../vista/alumnosCuotaPagas.html");
                                            //insertResponsable($user,$idResponsable);
					}
					else {
                                            require("../vista/operaciones.html");
					}
					break;
                                    case 'cobrarCuotas':
					if (controlarRoles($_SESSION["rol"],"menuCuotas")){
                                            $id = $_GET["id"];
                                            $pagina = $_GET["pagina"];
                                            require("pago_cuotas.php");
                                            obtenerCuotasAlumno($id,$pagina);
					}
					else {
                                            require("../vista/operaciones.html");
					}
					break;			
                                    case 'verCuotas':
					if (controlarRoles($_SESSION["rol"],"menuCuotas")){
                                            try {
                                                $id = $_GET["id"];
                                                $pagina = $_GET["pagina"];
                                                $paginacion = cantidadPaginacionSitio();
                                                if (!$pagina) {
                                                    $inicio = 0;
                                                    $pagina = 1;
                                                }
						else {
                                                    $inicio = ($pagina - 1) * $paginacion;
                                                }
						$total = totalCuotasPagas($id);
						$rowsPagas = buscarCuotasPagas($id,$inicio,$paginacion);
						$total_paginas = ceil($total / $paginacion);
                                            }
                                            catch (Exception $e){ 
                                                $msjE = $e->getMessage();						
                                            }
                                            finally {						
                                                require("../vista/cuotasPagas.html");
                                            }
					}
					else {
                                            require("../vista/operaciones.html");
					}
					break;	

                                    case 'cambiarResponsableAUsuario':
					if (controlarRoles($_SESSION["rol"],"menuUsuarios")){
                                            try {
						$rows = obtenerUsuariosResponsables();						
                                            }
                                            catch (Exception $e) {
						$msjE = $e->getMessage();
                                            }
                                            finally {
                                                require("../vista/listadosCambiarResponsable.html");
                                            }
					}
					else {
                                            require("../vista/operaciones.html");
					}
					break;
                                    case 'cambiarResponsable':
					if (controlarRoles($_SESSION["rol"],"menuUsuarios")){
                                            try {
                                                $user =  $_GET["user"];
                                                $rows = obtenerResponsableUsuario($user);
						require("../vista/modificar_responsable.html");					
                                            }
                                            catch (Exception $e) {
                                                $msjE = $e->getMessage();
                                                require("../vista/listadosCambiarResponsable.html");
                                            }
					}
					else {
                                            require("../vista/operaciones.html");
					}
					break;
                                    case 'cambiarResponsableDB':
					if (controlarRoles($_SESSION["rol"],"menuUsuarios")){
                                            try {
                                                if (isset($_GET["user"]) && isset($_POST["apellidoTutor"]) && (isset($_POST["nombreTutor"])) && (isset($_POST["tipoParentezco"])) && (isset($_POST["fechaNac"])) && (isset($_POST["sexo"])) && (isset($_POST["email"])) && (isset($_POST["tel"])) && (isset($_POST["direccion"])) && verificarCamposResponsableUsuario($_GET["user"],$_POST["apellidoTutor"],$_POST["nombreTutor"],$_POST["tipoParentezco"],$_POST["fechaNac"],$_POST["sexo"],$_POST["email"],$_POST["tel"],$_POST["direccion"])){
                                                    $user = $_GET["user"];
                                                    $apellido = $_POST["apellidoTutor"];
                                                    $nombre = $_POST["nombreTutor"];
                                                    $tipo = $_POST["tipoParentezco"];
                                                    $fechaNac = $_POST["fechaNac"];
                                                    $sexo = $_POST["sexo"];
                                                    $mail = $_POST["email"];
                                                    $tel = $_POST["tel"];
                                                    $direccion = $_POST["direccion"];
                                                    modificarResponsable($user,$apellido,$nombre,$tipo,$fechaNac,$sexo,$mail,$tel,$direccion);
                                                    $msjExito = "El responsable fue modificado correctamente!";
                                                    require("../vista/exito.html");
                                                } else {
                                                    $msjExito = "El responsable no pudo ser modificado. Verifique que los datos ingresados sean válidos.";
                                                    require("../vista/exito.html");
                                                    }
						}
                                            catch (Exception $e) {
						$msjE = $e->getMessage();
						//header("Location: backend.php?controller=cambiarResponsable&user=$user");							
                                            }
					}
					else {
                                            require("../vista/operaciones.html");
					}
					break;
                                    case 'eliminarResponsableAUsuario':
					if (controlarRoles($_SESSION["rol"],"menuUsuarios")){
                                            try {
                                                $rows = obtenerUsuariosResponsables();					
                                            }
                                            catch (Exception $e) {
						$msjE = $e->getMessage();
                                            }
                                            finally {
                                                require("../vista/listadosEliminarResponsable.html");
                                                
                                            }
					}
					else {
                                            require("../vista/operaciones.html");
					}
					break;
                                    case 'eliminarResponsable':
					if (controlarRoles($_SESSION["rol"],"menuUsuarios")){
                                            try {
                                                $user = $_GET["user"];
						eliminarResponsable($user);
                                            }
                                            catch (Exception $e) {
                                                $msjE = $e->getMessage();
                                            }
                                            finally {
                                                header("Location: backend.php?controller=cambiarRoles&pagina=1");
                                            }
					}
					else {
                                            require("../vista/operaciones.html");
					}
					break;
					case 'eliminarResponsableDB':
					if (controlarRoles($_SESSION["rol"],"menuUsuarios")){
                                            try {
                                                $user = $_GET["user"];
						eliminarResponsableDB($user);
                                            }
                                            catch (Exception $e) {
                                                $msjE = $e->getMessage();
                                            }
                                            finally {
                                                header("Location: backend.php?controller=listado_editarResponsable&pagina=1");
                                            }
					}
					else {
                                            require("../vista/operaciones.html");
					}
					break;
                                    case 'pagarCuotasAlumno':
					if (controlarRoles($_SESSION["rol"],"menuCuotas")){
                                            $id = $_GET["id"];
                                            require("pagarCuota.php");
                                            pagarCuotas($id);
					}
					else {
                                            require("../vista/operaciones.html");
					}
					break;
                                    case 'listadosAlumnos':
					if (controlarRoles($_SESSION["rol"],"menuAlumnos")){
                                            try {
						$pagina = $_GET["pagina"];
						$paginacion = cantidadPaginacionSitio();
						if (!$pagina) {
                                                    $inicio = 0;
                                                    $pagina = 1;
						}
                                                else {
                                                    $inicio = ($pagina - 1) * $paginacion;
                                                }
                                                $total = totalAlumnos();
                                                $rows = obtenerAlumnos($inicio,$paginacion);
                                                $total_paginas = ceil($total / $paginacion);
                                                $template = $twig->loadTemplate('listadoAlumnos.twig.html');
                                                echo $template->render(array("alumnos" => $rows, "total_paginas"=> $total_paginas, "pagina" => $pagina, "usuario"=>$_SESSION["usuario"],"titulo"=>$titulo, "rol"=>$_SESSION["rol"]));
                                            }
                                            catch (Exception $e) {
                                                $msjE = $e->getMessage();
                                                $template = $twig->loadTemplate('listadoAlumnos.twig.html');
                                                echo $template->render(array("msj" =>$msjE,"titulo"=>$titulo, "rol"=>$_SESSION["rol"],"usuario"=>$_SESSION["usuario"]));
                                            }
					}
					else {
                                            require("../vista/operaciones.html");
					}
					break;
                                    case 'agregarResponsableAlumno':
					if (controlarRoles($_SESSION["rol"],"menuAlumnos")){
                                            try {
                                                $idAlumno=$_GET["idAlumno"];
                                                $rows = obtenerResponsablesQueNoSeanDe($idAlumno);
                                            }
                                            catch (Exception $e) {
                                                $msjE = $e->getMessage();
                                            }
                                            finally{
                                                    require("../vista/listadoResponsables.html");
                                                
                                            }
					}
					else {
                                            require("../vista/operaciones.html");
					}
					break;
                                    case 'agregarResponsableAlumnoDB':
					if (controlarRoles($_SESSION["rol"],"menuAlumnos")){
                                            try {
                                                $idResponsable = $_GET["idResponsable"];
                                                $idAlumno = $_GET["idAlumno"];
                                                asignarAlumnoResponsable($idAlumno,$idResponsable);
                                                $msjE = "El responsable fue asignado correctamente al alumno!";
                                            }
                                            catch (Exception $e) {
                                                $msjE = $e->getMessage();	
                                            }
                                            finally{
                                                require("../vista/mensajeAlumno.html");
                                            }
					}
					else {
                                            require("../vista/operaciones.html");
					}
					break;
                                    case 'eliminarResponsableAlumno':
					if (controlarRoles($_SESSION["rol"],"menuAlumnos")){
                                            try {
						$idAlumno=$_GET["idAlumno"];        
						$rows = obtenerResponsablesDe($idAlumno);
                                            }
                                            catch (Exception $e) {
                                                $msjE = $e->getMessage();
                                            }
                                            finally{
                                                    require("../vista/listadoResponsablesDeAlumnoEliminar.html");
                                            }
					}
					else {
                                            require("../vista/operaciones.html");
					}
					break;
                                    case 'eliminarResponsableAlumnoDB':
					if (controlarRoles($_SESSION["rol"],"menuAlumnos")){
                                            try {
                                                $idResponsable = $_GET["idResponsable"];
	    					$idAlumno = $_GET["idAlumno"];    
	    					eliminarAlumnoResponsable($idAlumno,$idResponsable);
	    					$msjE = "Operación realizada con éxito!";
						require("../vista/mensajeAlumno.html");
                                            }
                                            catch (Exception $e) {
                                                $msjE = $e->getMessage();
                                                require("../vista/errorEliminarResponsableAlumno.html");
                                            }
					}
					else {
                                            require("../vista/operaciones.html");
					}
					break;
                                    default:
					$template = $twig->loadTemplate('headerBackend.twig.html');
					echo $template->render(array("usuario"=>$_SESSION["usuario"],"titulo"=>$titulo, "rol"=>$_SESSION["rol"]));
					break;
                                    }	
                }
                else {
                    require("../vista/operaciones.html");
                }
		
		//require '../vista/operaciones.html';
        }
	else {
		//$template = $twig->loadTemplate('home.twig.html');
		//echo $template->render(array());
		header("Location: index.php");
	}
?>