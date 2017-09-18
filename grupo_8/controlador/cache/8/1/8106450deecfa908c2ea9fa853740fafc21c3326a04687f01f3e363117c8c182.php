<?php

/* operaciones.twig.html */
class __TwigTemplate_23d31723a25dd787b54337aa8d13b472a3b9933eb98dc7e7b0c2043bdc663bbf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("headerBackend.twig.html", "operaciones.twig.html", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'saludo' => array($this, 'block_saludo'),
            'titulo' => array($this, 'block_titulo'),
            'operacionesPermitidas' => array($this, 'block_operacionesPermitidas'),
            'contenido' => array($this, 'block_contenido'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "headerBackend.twig.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Menu inicio";
    }

    // line 5
    public function block_saludo($context, array $blocks = array())
    {
        // line 6
        echo "\t";
        echo twig_escape_filter($this->env, (isset($context["usuario"]) ? $context["usuario"] : null), "html", null, true);
        echo "
";
    }

    // line 9
    public function block_titulo($context, array $blocks = array())
    {
        // line 10
        echo "\t";
        echo twig_escape_filter($this->env, (isset($context["titulo"]) ? $context["titulo"] : null), "html", null, true);
        echo "
";
    }

    // line 13
    public function block_operacionesPermitidas($context, array $blocks = array())
    {
        // line 14
        echo "
\t";
        // line 15
        if (((isset($context["rol"]) ? $context["rol"] : null) == "administracion")) {
            // line 16
            echo "\t<li><a href='backend.php?controller=menuUsuarios'>Usuarios</a></li>
    <li><a href='backend.php?controller=menuResponsables'>Responsables</a></li>
    <li><a href='backend.php?controller=menuAlumnos'>Alumnos</a></li>
    <li><a href='backend.php?controller=menuCuotas'>Cuotas</a></li>
    <li><a href='backend.php?controller=menuConfig'>Configuraci&oacute;n</a></li>
    ";
        }
        // line 22
        echo "
    ";
        // line 23
        if (((isset($context["rol"]) ? $context["rol"] : null) == "gestion")) {
            // line 24
            echo "    <li><a href='backend.php?controller=menuCuotas'>Cuotas y Matriculas</a></li>
    ";
        }
        // line 26
        echo "
";
    }

    // line 29
    public function block_contenido($context, array $blocks = array())
    {
        // line 30
        echo "<div id=\"submenu\">
\t<div id=\"itemMenu\">
\t\t\t<div id=\"tituloMenu\"><p>Inicio</p></div>
\t\t\t<ul>
\t\t\t\t\t<li><a href=\"../controlador/backend.php?controller=menuAlumnos\">ABM de alumnos</a></li>
\t\t\t\t\t<li><a href=\"../controlador/backend.php?controller=menuCuotas\">ABM de Cuotas por mes y año</a></li>
\t\t\t\t\t<li><a href=\"../controlador/backend.php?controller=menuCuotas\">ABM de Becas para un alumno</a></li>
\t\t\t\t\t<li><a href=\"../controlador/backend.php?controller=menuCuotas\">Registro de Pagos de las cuotas de un alumno</a></li>
\t\t\t\t\t<li><a href=\"../controlador/backend.php?controller=menuListados\">Listados</li>
\t\t\t</ul>
\t</div>\t\t
</div>
";
    }

    public function getTemplateName()
    {
        return "operaciones.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 30,  88 => 29,  83 => 26,  79 => 24,  77 => 23,  74 => 22,  66 => 16,  64 => 15,  61 => 14,  58 => 13,  51 => 10,  48 => 9,  41 => 6,  38 => 5,  32 => 3,  11 => 1,);
    }
}
/* {% extends 'headerBackend.twig.html' %}*/
/* */
/* {% block title %}Menu inicio{% endblock %}*/
/* */
/* {% block saludo %}*/
/* 	{{ usuario }}*/
/* {% endblock %}*/
/* */
/* {% block titulo %}*/
/* 	{{ titulo }}*/
/* {% endblock %}*/
/* */
/* {% block operacionesPermitidas %}*/
/* */
/* 	{% if rol == "administracion" %}*/
/* 	<li><a href='backend.php?controller=menuUsuarios'>Usuarios</a></li>*/
/*     <li><a href='backend.php?controller=menuResponsables'>Responsables</a></li>*/
/*     <li><a href='backend.php?controller=menuAlumnos'>Alumnos</a></li>*/
/*     <li><a href='backend.php?controller=menuCuotas'>Cuotas</a></li>*/
/*     <li><a href='backend.php?controller=menuConfig'>Configuraci&oacute;n</a></li>*/
/*     {% endif %}*/
/* */
/*     {% if rol == "gestion" %}*/
/*     <li><a href='backend.php?controller=menuCuotas'>Cuotas y Matriculas</a></li>*/
/*     {% endif %}*/
/* */
/* {% endblock %}*/
/* */
/* {% block contenido %}*/
/* <div id="submenu">*/
/* 	<div id="itemMenu">*/
/* 			<div id="tituloMenu"><p>Inicio</p></div>*/
/* 			<ul>*/
/* 					<li><a href="../controlador/backend.php?controller=menuAlumnos">ABM de alumnos</a></li>*/
/* 					<li><a href="../controlador/backend.php?controller=menuCuotas">ABM de Cuotas por mes y año</a></li>*/
/* 					<li><a href="../controlador/backend.php?controller=menuCuotas">ABM de Becas para un alumno</a></li>*/
/* 					<li><a href="../controlador/backend.php?controller=menuCuotas">Registro de Pagos de las cuotas de un alumno</a></li>*/
/* 					<li><a href="../controlador/backend.php?controller=menuListados">Listados</li>*/
/* 			</ul>*/
/* 	</div>		*/
/* </div>*/
/* {% endblock %}*/
/* 	*/
/* */
