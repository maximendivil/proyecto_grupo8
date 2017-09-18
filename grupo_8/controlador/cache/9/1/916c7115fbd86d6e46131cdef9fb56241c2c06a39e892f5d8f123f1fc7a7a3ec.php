<?php

/* login.twig.html */
class __TwigTemplate_35e6ccf30f9faa989d352c87cbd78cdf3d2f3cece40dee703e13b08acbba38d0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<?php
\trequire(\"../vista/header.twig.html\");
?>

";
        // line 5
        $this->displayBlock('head', $context, $blocks);
        // line 11
        echo "
<body id=\"fondo\">\t\t
\t<div id=\"contenido\">
\t\t<div id=\"encabezado\">
\t\t\t<div id=\"titulo\"> 
\t\t\t\t<h1>";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["titulo"]) ? $context["titulo"] : null), "html", null, true);
        echo "</h1>
\t\t\t\t<h5>Escuela de la Universidad Nacional de La Plata</h5>
\t\t\t</div>
\t\t\t<div id=\"login\"> 
\t\t\t</div>
\t\t\t<div id=\"fotoPortada\">
\t\t\t\t<img id=\"img\" src=\"../fotoEscuela.jpg\" alt=\"Frente de la escuela Anexa\">
\t\t\t</div>
\t\t
\t\t\t<div id=\"menu\">
\t\t\t\t<ul>
\t\t\t\t\t<li><a href=\"../controlador/index.php\">Inicio</a></li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t</div>
\t\t<form method=\"POST\" action=\"../controlador/controlador_login.php\">
\t\t\t<div id=\"errorLogin\">
\t\t\t\t<?php
\t\t\t\t\tif (isset(\$msjError)){
\t\t\t\t\t\techo \$msjError;
\t\t\t\t\t}
\t\t\t\t?>
\t\t\t</div>
\t\t\t<fieldset>\t\t\t\t
\t\t\t\t<legend>Iniciar sesión</legend>\t\t\t\t\t
\t\t\t\t<div class=\"labels\">
\t\t\t\t\t<label for=\"usuario\" id=\"item_label\">Usuario(*) :</label>
\t\t\t\t\t<br>
\t\t\t\t\t<label for=\"contraseña\" id=\"item_label\">Contraseña(*) :</label>
\t\t\t\t\t<br>
\t\t\t\t</div>
\t\t\t\t<div id=\"inputs\">
\t\t\t\t\t<input type=\"text\" name=\"usuario\" id=\"usuario\" required>
\t\t\t\t\t<br>
\t\t\t\t\t<input type=\"password\" name=\"contraseña\" id=\"contraseña\" required>
\t\t\t\t\t<br>
\t\t\t\t</div>
\t\t\t</fieldset>
\t\t\t<br>
\t\t\t<input type=\"submit\" name=\"loguearse\" id=\"enviar\">
\t\t\t<br>
\t\t\t<br>
\t\t\t<em id=\"apartado\">Los campos marcados con * son considerados obligatorios</em>
\t\t\t<br>

\t\t</form>
\t</div>
</body>";
    }

    // line 5
    public function block_head($context, array $blocks = array())
    {
        // line 6
        echo "\t<link rel=\"stylesheet\" type=\"text/css\" media=\"(min-width: 376px)\" href=\"../styles.css\"> <!--probando-->
\t<link rel=\"stylesheet\" type=\"text/css\" media=\"(max-width: 376px)\" href=\"../stylesMoviles.css\"> <!--probando-->\t
\t<link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/icon?family=Material+Icons\">
\t<meta charset=\"UTF-8\">
";
    }

    public function getTemplateName()
    {
        return "login.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 6,  87 => 5,  35 => 16,  28 => 11,  26 => 5,  20 => 1,);
    }
}
/* <?php*/
/* 	require("../vista/header.twig.html");*/
/* ?>*/
/* */
/* {% block head %}*/
/* 	<link rel="stylesheet" type="text/css" media="(min-width: 376px)" href="../styles.css"> <!--probando-->*/
/* 	<link rel="stylesheet" type="text/css" media="(max-width: 376px)" href="../stylesMoviles.css"> <!--probando-->	*/
/* 	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">*/
/* 	<meta charset="UTF-8">*/
/* {% endblock %}*/
/* */
/* <body id="fondo">		*/
/* 	<div id="contenido">*/
/* 		<div id="encabezado">*/
/* 			<div id="titulo"> */
/* 				<h1>{{ titulo }}</h1>*/
/* 				<h5>Escuela de la Universidad Nacional de La Plata</h5>*/
/* 			</div>*/
/* 			<div id="login"> */
/* 			</div>*/
/* 			<div id="fotoPortada">*/
/* 				<img id="img" src="../fotoEscuela.jpg" alt="Frente de la escuela Anexa">*/
/* 			</div>*/
/* 		*/
/* 			<div id="menu">*/
/* 				<ul>*/
/* 					<li><a href="../controlador/index.php">Inicio</a></li>*/
/* 				</ul>*/
/* 			</div>*/
/* 		</div>*/
/* 		<form method="POST" action="../controlador/controlador_login.php">*/
/* 			<div id="errorLogin">*/
/* 				<?php*/
/* 					if (isset($msjError)){*/
/* 						echo $msjError;*/
/* 					}*/
/* 				?>*/
/* 			</div>*/
/* 			<fieldset>				*/
/* 				<legend>Iniciar sesión</legend>					*/
/* 				<div class="labels">*/
/* 					<label for="usuario" id="item_label">Usuario(*) :</label>*/
/* 					<br>*/
/* 					<label for="contraseña" id="item_label">Contraseña(*) :</label>*/
/* 					<br>*/
/* 				</div>*/
/* 				<div id="inputs">*/
/* 					<input type="text" name="usuario" id="usuario" required>*/
/* 					<br>*/
/* 					<input type="password" name="contraseña" id="contraseña" required>*/
/* 					<br>*/
/* 				</div>*/
/* 			</fieldset>*/
/* 			<br>*/
/* 			<input type="submit" name="loguearse" id="enviar">*/
/* 			<br>*/
/* 			<br>*/
/* 			<em id="apartado">Los campos marcados con * son considerados obligatorios</em>*/
/* 			<br>*/
/* */
/* 		</form>*/
/* 	</div>*/
/* </body>*/
