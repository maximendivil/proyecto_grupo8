<?php

/* vistaIndex.twig.html */
class __TwigTemplate_1ba8f46574c78ff7f41024d2458e098483bc9779aebdd57e8d7cbd488382cade extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'footer' => array($this, 'block_footer'),
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
<body id=\"fondo\">
\t<div id=\"contenido\">
\t\t<header id=\"encabezado\">
\t\t\t<div id=\"titulo\"> 
\t\t\t\t<h1>";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["titulo"]) ? $context["titulo"] : null), "html", null, true);
        echo "</h1>
\t\t\t\t<h5>Escuela de la Universidad Nacional de La Plata</h5>
\t\t\t</div>
\t\t\t<div id=\"loginIndex\">
\t\t\t\t<p><a href=\"../controlador/login.php\">Login</a></p>
\t\t\t</div>
\t\t\t<div id=\"fotoPortada\">
\t\t\t\t<img id=\"img\" src=\"../fotoEscuela.jpg\" alt=\"Frente de la escuela Anexa\">
\t\t\t</div>
\t\t\t
\t\t\t<div id=\"menu\">
\t\t\t\t<ul>
\t\t\t\t\t<li><a href=\"index.php\">Inicio</a></li>
\t\t\t\t\t<li>Proyecto</li>
\t\t\t\t\t<li>Ense&ntilde;anza</li>
\t\t\t\t\t<li>Informaci&oacute;n Docente</li>
\t\t\t\t\t<li>Museo</li>
\t\t\t\t\t<li>Bolet&iacute;n Informativo</li>
\t\t\t\t\t<li>Biblioteca</li>
\t\t\t\t\t<li>Contacto</li>
\t\t\t\t</ul>\t\t
\t\t\t</div>
\t\t</header>
\t\t<div id=\"informacion\">
\t\t\t<h2>Inicio</h2>
\t\t\t<h3>Información institucional</h3>
\t\t\t<h3>AUTORIDADES</h3>
\t\t\t<p>Universidad Nacional de La Plata</p>
\t\t\t<p>Presidente: Lic. Raúl Anibal Perdomo</p>
\t\t\t<p>Vicepresidente Área Institucional: Dr. Fernando A. Tauber</p>
\t\t\t<p>Vicepresidente Área Académica: Prof. Ana María Barletta</p>
\t\t\t<p>Secretaria Académica: Dra. María Mercedes Medina</p>
\t\t\t<p>Prosecretaria de Asuntos Académicos: Prof. Laura Agratti</p>
\t\t\t<br>
\t\t\t<p>Escuela Graduada \"Joaquín V. González</p>
\t\t\t<p>Directora: Prof. Claudia Beatriz Binaghi</p>
\t\t\t<p>Vicedirectora: Prof. Violeta N. Pesci</p>
\t\t\t<p>Secretaria Docente: Prof. Mariela Boccia</p>
\t\t\t<p>Secretaria Académica de Educación Inicial: Prof. Rosa Mónica Bordagaray</p>
\t\t\t<p>Secretaria Académica de Educación Primaria: Prof. Aldana López</p>
\t\t\t<p>Secretaria Académica de Educación Primaria: Prof. Celeste Carli</p>
\t\t\t<p>Regente del turno mañana: Prof. Elina Rebolini</p>
\t\t\t<p>Regente del turno tarde: Prof. Leticia Peret</p>
\t\t\t<br>
\t\t\t<p>La Escuela es una Dependencia de la Presidencia de la Universidad. Los actos resolutivos que exceden la competencia de la Dirección de la Escuela, son refrendados por el Presidente de la Universidad. Dentro de la Secretaría de Asuntos Académicos de la Universidad, la Prosecretaría asesora a la Presidencia en los temas relacionados a la enseñanza preuniversitaria.</p>
\t\t\t<p>El CEMYP (Consejo de Enseñanza Media y Primaria), dependiente del Consejo Superior y supervisado por su Comisión de Enseñanza, fue creado con la finalidad de \"asegurar el cumplimiento de los objetivos establecidos, estudiando, estableciendo y perfeccionando la coordinación de los ciclos primario, medio y superior en procura de la unidad del proceso educativo\".Lo preside el Presidente de la Comisión de Enseñanza del Consejo Superior y está conformado por: un profesor de la Facultad de Humanidades y Ciencias de la Educación, los Directores de los Colegios y docentes elegidos por sus pares en cada centro educativo. Las sesiones son coordinadas por la Prosecretaría de Asuntos Académicos de la U.N.L.P. La Escuela participa del gobierno de la UNLP a través de un representante docente en la Asamblea Universitaria y del Director/a, quien integra el Consejo Superior con voz y voto con un sistema rotativo de pares entre los Directores/as del Sistema de Pregrado Universitario.</p>
\t\t\t<p>La Directora de la Escuela es elegida directamente por el voto secreto de los docentes. La escuela cuenta con cuatro Departamentos: Biblioteca, de Orientación Educativa, de Informática y de Multimedios. También cuenta con Coordinadores de Area, personal docente especializado en las disciplinas y su didáctica, que coordina la tarea de los docentes, a la vez que los capacita, en las diferentes áreas disciplinares, y en los distintos niveles (Coordinadores de Lengua, Matemática, Música, Plástica, Educación Física, Ciencias Sociales, Ciencias Naturales, Inglés, Francés, Tecnología Educativa y Talleres).</p>
\t\t\t<p>La designación de los docentes se realiza a través de un sistema de concurso de antecedentes y oposición por el término de cuatro años, la cual puede ser prorrogada habiendo aprobado la instancia de evaluación correspondiente al finalizar cada período. La escuela cuenta con cargos de Maestro de Grado, Maestro de Sección, Auxiliar Docente, Preceptor y Ayudante de Clases Prácticas. El resto de las funciones se rentan con horas cátedra.</p>
\t\t\t<p>La escuela tiene una Asociación Cooperadora de padres. Cobra una matrícula de 100 pesos por única vez cuando los niños ingresan a la escuela y luego cuotas mensuales.</p>
\t\t
\t\t</div>
\t\t<footer class=\"footer\">
\t\t";
        // line 68
        $this->displayBlock('footer', $context, $blocks);
        // line 72
        echo "\t\t</footer>
\t</div>\t
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

    // line 68
    public function block_footer($context, array $blocks = array())
    {
        // line 69
        echo "\t\t\t<h4>Informaci&oacute;n de contacto</h4>
\t\t\t<p>Email: ";
        // line 70
        echo twig_escape_filter($this->env, (isset($context["email"]) ? $context["email"] : null), "html", null, true);
        echo " <span>Telefono: ";
        echo twig_escape_filter($this->env, (isset($context["telefono"]) ? $context["telefono"] : null), "html", null, true);
        echo "</span></p>
\t\t";
    }

    public function getTemplateName()
    {
        return "vistaIndex.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 70,  113 => 69,  110 => 68,  102 => 6,  99 => 5,  93 => 72,  91 => 68,  36 => 16,  29 => 11,  27 => 5,  21 => 1,);
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
/* <body id="fondo">*/
/* 	<div id="contenido">*/
/* 		<header id="encabezado">*/
/* 			<div id="titulo"> */
/* 				<h1>{{	titulo }}</h1>*/
/* 				<h5>Escuela de la Universidad Nacional de La Plata</h5>*/
/* 			</div>*/
/* 			<div id="loginIndex">*/
/* 				<p><a href="../controlador/login.php">Login</a></p>*/
/* 			</div>*/
/* 			<div id="fotoPortada">*/
/* 				<img id="img" src="../fotoEscuela.jpg" alt="Frente de la escuela Anexa">*/
/* 			</div>*/
/* 			*/
/* 			<div id="menu">*/
/* 				<ul>*/
/* 					<li><a href="index.php">Inicio</a></li>*/
/* 					<li>Proyecto</li>*/
/* 					<li>Ense&ntilde;anza</li>*/
/* 					<li>Informaci&oacute;n Docente</li>*/
/* 					<li>Museo</li>*/
/* 					<li>Bolet&iacute;n Informativo</li>*/
/* 					<li>Biblioteca</li>*/
/* 					<li>Contacto</li>*/
/* 				</ul>		*/
/* 			</div>*/
/* 		</header>*/
/* 		<div id="informacion">*/
/* 			<h2>Inicio</h2>*/
/* 			<h3>Información institucional</h3>*/
/* 			<h3>AUTORIDADES</h3>*/
/* 			<p>Universidad Nacional de La Plata</p>*/
/* 			<p>Presidente: Lic. Raúl Anibal Perdomo</p>*/
/* 			<p>Vicepresidente Área Institucional: Dr. Fernando A. Tauber</p>*/
/* 			<p>Vicepresidente Área Académica: Prof. Ana María Barletta</p>*/
/* 			<p>Secretaria Académica: Dra. María Mercedes Medina</p>*/
/* 			<p>Prosecretaria de Asuntos Académicos: Prof. Laura Agratti</p>*/
/* 			<br>*/
/* 			<p>Escuela Graduada "Joaquín V. González</p>*/
/* 			<p>Directora: Prof. Claudia Beatriz Binaghi</p>*/
/* 			<p>Vicedirectora: Prof. Violeta N. Pesci</p>*/
/* 			<p>Secretaria Docente: Prof. Mariela Boccia</p>*/
/* 			<p>Secretaria Académica de Educación Inicial: Prof. Rosa Mónica Bordagaray</p>*/
/* 			<p>Secretaria Académica de Educación Primaria: Prof. Aldana López</p>*/
/* 			<p>Secretaria Académica de Educación Primaria: Prof. Celeste Carli</p>*/
/* 			<p>Regente del turno mañana: Prof. Elina Rebolini</p>*/
/* 			<p>Regente del turno tarde: Prof. Leticia Peret</p>*/
/* 			<br>*/
/* 			<p>La Escuela es una Dependencia de la Presidencia de la Universidad. Los actos resolutivos que exceden la competencia de la Dirección de la Escuela, son refrendados por el Presidente de la Universidad. Dentro de la Secretaría de Asuntos Académicos de la Universidad, la Prosecretaría asesora a la Presidencia en los temas relacionados a la enseñanza preuniversitaria.</p>*/
/* 			<p>El CEMYP (Consejo de Enseñanza Media y Primaria), dependiente del Consejo Superior y supervisado por su Comisión de Enseñanza, fue creado con la finalidad de "asegurar el cumplimiento de los objetivos establecidos, estudiando, estableciendo y perfeccionando la coordinación de los ciclos primario, medio y superior en procura de la unidad del proceso educativo".Lo preside el Presidente de la Comisión de Enseñanza del Consejo Superior y está conformado por: un profesor de la Facultad de Humanidades y Ciencias de la Educación, los Directores de los Colegios y docentes elegidos por sus pares en cada centro educativo. Las sesiones son coordinadas por la Prosecretaría de Asuntos Académicos de la U.N.L.P. La Escuela participa del gobierno de la UNLP a través de un representante docente en la Asamblea Universitaria y del Director/a, quien integra el Consejo Superior con voz y voto con un sistema rotativo de pares entre los Directores/as del Sistema de Pregrado Universitario.</p>*/
/* 			<p>La Directora de la Escuela es elegida directamente por el voto secreto de los docentes. La escuela cuenta con cuatro Departamentos: Biblioteca, de Orientación Educativa, de Informática y de Multimedios. También cuenta con Coordinadores de Area, personal docente especializado en las disciplinas y su didáctica, que coordina la tarea de los docentes, a la vez que los capacita, en las diferentes áreas disciplinares, y en los distintos niveles (Coordinadores de Lengua, Matemática, Música, Plástica, Educación Física, Ciencias Sociales, Ciencias Naturales, Inglés, Francés, Tecnología Educativa y Talleres).</p>*/
/* 			<p>La designación de los docentes se realiza a través de un sistema de concurso de antecedentes y oposición por el término de cuatro años, la cual puede ser prorrogada habiendo aprobado la instancia de evaluación correspondiente al finalizar cada período. La escuela cuenta con cargos de Maestro de Grado, Maestro de Sección, Auxiliar Docente, Preceptor y Ayudante de Clases Prácticas. El resto de las funciones se rentan con horas cátedra.</p>*/
/* 			<p>La escuela tiene una Asociación Cooperadora de padres. Cobra una matrícula de 100 pesos por única vez cuando los niños ingresan a la escuela y luego cuotas mensuales.</p>*/
/* 		*/
/* 		</div>*/
/* 		<footer class="footer">*/
/* 		{% block footer %}*/
/* 			<h4>Informaci&oacute;n de contacto</h4>*/
/* 			<p>Email: {{ email }} <span>Telefono: {{ telefono }}</span></p>*/
/* 		{%endblock%}*/
/* 		</footer>*/
/* 	</div>	*/
/* </body>*/
