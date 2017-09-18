<!DOCTYPE html>
<head>
	<title>Inicio</title>	
	<link rel="stylesheet" type="text/css" media="(min-width: 376px)" href="../styles.css"> <!--probando-->
	<link rel="stylesheet" type="text/css" media="(max-width: 376px)" href="../stylesMoviles.css"> <!--probando-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<meta charset="UTF-8">
</head>
<body id="fondo">
	<div id="contenido">
		<div id="encabezado">
			<div id="login">
				<?php echo "<p>Hola, ".$_SESSION["usuario"]."!</p>"; ?>
				<p><a href="logout.php">Logout</a></p> 
			</div>
			<div id="tituloHeader"> 
				<center><h1><?php echo $titulo; ?></h1></center>
				<center><h5>Escuela de la Universidad Nacional de La Plata</h5></center>
			</div>
			
			<div id="menuHeader">
				<ul>
					<center>
					<li><a href="../controlador/backend.php?controller=index">Inicio</a></li>
					<?php
						if ($_SESSION["rol"] == "administracion"){
							//echo "<li><a href='mi_cuenta.php'>Mi cuenta</a></li>";
							echo "<li><a href='backend.php?controller=menuUsuarios'>Usuarios</a></li>";
                            echo "<li><a href='backend.php?controller=menuResponsables'>Responsables</a></li>";
                            echo "<li><a href='backend.php?controller=menuAlumnos'>Alumnos</a></li>";
                            echo "<li><a href='backend.php?controller=menuCuotas'>Cuotas</a></li>";
                            echo "<li><a href='backend.php?controller=menuConfig'>Configuraci&oacute;n</a></li>";
                            echo "<li><a href='backend.php?controller=menuMapas'>Mapas</a></li>";
						}
						if ($_SESSION["rol"] == "gestion"){
							echo "<li><a href='backend.php?controller=menuCuotas'>Cuotas y Matriculas</a></li>";
							echo "<li><a href='backend.php?controller=menuMapas'>Mapas</a></li>";
						}						
					?>
					<li><a href='../controlador/backend.php?controller=menuListados'>Listados</a></li>
					</center>
				</ul>
			</div>
		</div>