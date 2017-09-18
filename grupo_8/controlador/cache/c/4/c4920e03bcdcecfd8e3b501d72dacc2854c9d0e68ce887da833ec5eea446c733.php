<?php

/* headerBackend.twig.html */
class __TwigTemplate_dbe1c67d773d7e2b2287f60eeffddbb948d6ee1ed3c1f27ca949efdce6843626 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'saludo' => array($this, 'block_saludo'),
            'titulo' => array($this, 'block_titulo'),
            'operacionesPermitidas' => array($this, 'block_operacionesPermitidas'),
            'contenido' => array($this, 'block_contenido'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<head>
\t<title>";
        // line 3
        $this->displayBlock('title', $context, $blocks);
        echo "</title>\t
\t<link rel=\"stylesheet\" type=\"text/css\" media=\"(min-width: 376px)\" href=\"../styles.css\"> <!--probando-->
\t<link rel=\"stylesheet\" type=\"text/css\" media=\"(max-width: 376px)\" href=\"../stylesMoviles.css\"> <!--probando-->
\t<link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/icon?family=Material+Icons\">
\t<meta charset=\"UTF-8\">
\t
</head>
<body id=\"fondo\">
\t<div id=\"contenido\">
\t\t<div id=\"encabezado\">
\t\t\t<div id=\"login\">
\t\t\t\t<p>Hola, ";
        // line 14
        $this->displayBlock('saludo', $context, $blocks);
        echo "!</p>
\t\t\t\t<p><a href=\"logout.php\">Logout</a></p> 
\t\t\t</div>
\t\t\t<div id=\"tituloHeader\"> 
\t\t\t\t<center><h1>";
        // line 18
        $this->displayBlock('titulo', $context, $blocks);
        echo "</h1></center>
\t\t\t\t<center><h5>Escuela de la Universidad Nacional de La Plata</h5></center>
\t\t\t</div>
\t\t\t
\t\t\t<div id=\"menuHeader\">
\t\t\t\t<ul>
\t\t\t\t\t<center>
\t\t\t\t\t<li><a href=\"../controlador/backend.php?controller=index\">Inicio</a></li>
\t\t\t\t\t";
        // line 26
        $this->displayBlock('operacionesPermitidas', $context, $blocks);
        // line 27
        echo "\t\t\t\t\t<!--<?php
\t\t\t\t\t\t/*if (\$_SESSION[\"rol\"] == \"administracion\"){
\t\t\t\t\t\t\t//echo \"<li><a href='mi_cuenta.php'>Mi cuenta</a></li>\";
\t\t\t\t\t\t\techo \"<li><a href='backend.php?controller=menuUsuarios'>Usuarios</a></li>\";
                            echo \"<li><a href='backend.php?controller=menuResponsables'>Responsables</a></li>\";
                            echo \"<li><a href='backend.php?controller=menuAlumnos'>Alumnos</a></li>\";
                            echo \"<li><a href='backend.php?controller=menuCuotas'>Cuotas</a></li>\";
                            echo \"<li><a href='backend.php?controller=menuConfig'>Configuraci&oacute;n</a></li>\";
\t\t\t\t\t\t}
\t\t\t\t\t\tif (\$_SESSION[\"rol\"] == \"gestion\"){
\t\t\t\t\t\t\techo \"<li><a href='backend.php?controller=menuCuotas'>Cuotas y Matriculas</a></li>\";
\t\t\t\t\t\t}*/\t\t\t\t\t\t
\t\t\t\t\t?>-->
\t\t\t\t\t<li><a href='../controlador/backend.php?controller=menuListados'>Listados</a></li>
\t\t\t\t\t</center>
\t\t\t\t</ul>
\t\t\t</div>
\t\t</div>
\t\t";
        // line 45
        $this->displayBlock('contenido', $context, $blocks);
        // line 46
        echo "
\t\t</div>
</body>";
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
    }

    // line 14
    public function block_saludo($context, array $blocks = array())
    {
    }

    // line 18
    public function block_titulo($context, array $blocks = array())
    {
        echo " ";
    }

    // line 26
    public function block_operacionesPermitidas($context, array $blocks = array())
    {
        echo " ";
    }

    // line 45
    public function block_contenido($context, array $blocks = array())
    {
        echo " ";
    }

    public function getTemplateName()
    {
        return "headerBackend.twig.html";
    }

    public function getDebugInfo()
    {
        return array (  112 => 45,  106 => 26,  100 => 18,  95 => 14,  90 => 3,  84 => 46,  82 => 45,  62 => 27,  60 => 26,  49 => 18,  42 => 14,  28 => 3,  24 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <head>*/
/* 	<title>{% block title %}{% endblock %}</title>	*/
/* 	<link rel="stylesheet" type="text/css" media="(min-width: 376px)" href="../styles.css"> <!--probando-->*/
/* 	<link rel="stylesheet" type="text/css" media="(max-width: 376px)" href="../stylesMoviles.css"> <!--probando-->*/
/* 	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">*/
/* 	<meta charset="UTF-8">*/
/* 	*/
/* </head>*/
/* <body id="fondo">*/
/* 	<div id="contenido">*/
/* 		<div id="encabezado">*/
/* 			<div id="login">*/
/* 				<p>Hola, {% block saludo %}{% endblock %}!</p>*/
/* 				<p><a href="logout.php">Logout</a></p> */
/* 			</div>*/
/* 			<div id="tituloHeader"> */
/* 				<center><h1>{% block titulo %} {% endblock %}</h1></center>*/
/* 				<center><h5>Escuela de la Universidad Nacional de La Plata</h5></center>*/
/* 			</div>*/
/* 			*/
/* 			<div id="menuHeader">*/
/* 				<ul>*/
/* 					<center>*/
/* 					<li><a href="../controlador/backend.php?controller=index">Inicio</a></li>*/
/* 					{% block operacionesPermitidas %} {% endblock %}*/
/* 					<!--<?php*/
/* 						/*if ($_SESSION["rol"] == "administracion"){*/
/* 							//echo "<li><a href='mi_cuenta.php'>Mi cuenta</a></li>";*/
/* 							echo "<li><a href='backend.php?controller=menuUsuarios'>Usuarios</a></li>";*/
/*                             echo "<li><a href='backend.php?controller=menuResponsables'>Responsables</a></li>";*/
/*                             echo "<li><a href='backend.php?controller=menuAlumnos'>Alumnos</a></li>";*/
/*                             echo "<li><a href='backend.php?controller=menuCuotas'>Cuotas</a></li>";*/
/*                             echo "<li><a href='backend.php?controller=menuConfig'>Configuraci&oacute;n</a></li>";*/
/* 						}*/
/* 						if ($_SESSION["rol"] == "gestion"){*/
/* 							echo "<li><a href='backend.php?controller=menuCuotas'>Cuotas y Matriculas</a></li>";*/
/* 						}*//* 						*/
/* 					?>-->*/
/* 					<li><a href='../controlador/backend.php?controller=menuListados'>Listados</a></li>*/
/* 					</center>*/
/* 				</ul>*/
/* 			</div>*/
/* 		</div>*/
/* 		{% block contenido %} {% endblock %}*/
/* */
/* 		</div>*/
/* </body>*/
