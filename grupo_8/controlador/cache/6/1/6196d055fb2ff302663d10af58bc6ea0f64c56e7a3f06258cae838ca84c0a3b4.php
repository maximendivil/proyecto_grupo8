<?php

/* listadoAlumnos.twig.html */
class __TwigTemplate_c0b0a3322ede9b83688503a8accddbf8ecaa5b5bad31a3c79deaa0f0e68c243f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("headerBackend.twig.html", "listadoAlumnos.twig.html", 2);
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

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "Menú de";
    }

    // line 6
    public function block_saludo($context, array $blocks = array())
    {
        // line 7
        echo "\t\t";
        echo twig_escape_filter($this->env, (isset($context["usuario"]) ? $context["usuario"] : null), "html", null, true);
        echo "
\t";
    }

    // line 10
    public function block_titulo($context, array $blocks = array())
    {
        // line 11
        echo "\t\t";
        echo twig_escape_filter($this->env, (isset($context["titulo"]) ? $context["titulo"] : null), "html", null, true);
        echo "
\t";
    }

    // line 14
    public function block_operacionesPermitidas($context, array $blocks = array())
    {
        // line 15
        echo "
\t";
        // line 16
        if (((isset($context["rol"]) ? $context["rol"] : null) == "administracion")) {
            // line 17
            echo "\t<li><a href='backend.php?controller=menuUsuarios'>Usuarios</a></li>
   <li><a href='backend.php?controller=menuResponsables'>Responsables</a></li>
   <li><a href='backend.php?controller=menuAlumnos'>Alumnos</a></li>
   <li><a href='backend.php?controller=menuCuotas'>Cuotas</a></li>
   <li><a href='backend.php?controller=menuConfig'>Configuraci&oacute;n</a></li>
   ";
        }
        // line 23
        echo "
   ";
        // line 24
        if (((isset($context["rol"]) ? $context["rol"] : null) == "gestion")) {
            // line 25
            echo "   <li><a href='backend.php?controller=menuCuotas'>Cuotas y Matriculas</a></li>
   ";
        }
        // line 27
        echo "
\t";
    }

    // line 30
    public function block_contenido($context, array $blocks = array())
    {
        // line 31
        echo "\t\t<div id=\"listado\">
\t\t\t<table>
\t\t\t\t<caption>Listado de alumnos de la escuela</caption>
\t\t\t\t<tr>
\t\t\t\t\t<th>DNI</th><th>Nombre</th><th>Apellido</th><th>Fecha de nacimiento</th><th>Valido</th><th>Operaciones de alumnos</th><th>Operaciones de responsables</th>
\t\t\t\t</tr>
\t\t\t\t";
        // line 37
        if (array_key_exists("msjE", $context)) {
            // line 38
            echo "\t\t\t\t\t\t</table>
\t\t\t\t\t\t";
            // line 39
            echo twig_escape_filter($this->env, (isset($context["msjE"]) ? $context["msjE"] : null), "html", null, true);
            echo "
\t\t\t\t\t";
        } else {
            // line 41
            echo "\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["rows"]) ? $context["rows"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["alumno"]) {
                // line 42
                echo "\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>";
                // line 43
                echo twig_escape_filter($this->env, $this->getAttribute($context["alumno"], "numeroDocumento", array()), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t<td>";
                // line 44
                echo twig_escape_filter($this->env, $this->getAttribute($context["alumno"], "nombre", array()), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t<td>";
                // line 45
                echo twig_escape_filter($this->env, $this->getAttribute($context["alumno"], "apellido", array()), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t<td>";
                // line 46
                echo twig_escape_filter($this->env, $this->getAttribute($context["alumno"], "fechaNacimiento", array()), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t";
                // line 47
                if ($this->getAttribute($context["alumno"], "valido", array())) {
                    // line 48
                    echo "\t\t\t\t\t\t\t\t\t<td>SI</td>
\t\t\t\t\t\t\t\t\t<td><a href='../controlador/backend.php?controller=deshabilitarAlumno&amp;id=";
                    // line 49
                    echo twig_escape_filter($this->env, $this->getAttribute($context["alumno"], "id", array()), "html", null, true);
                    echo "&amp;valor=0'><i class='material-icons' title='Deshabilitar alumno.'>delete</i></a>
\t\t\t\t\t\t\t";
                } else {
                    // line 51
                    echo "\t\t\t\t\t\t\t\t\t<td>NO</td>
\t\t\t\t\t\t\t\t\t<td><a href='../controlador/backend.php?controller=habilitarAlumno&amp;id=";
                    // line 52
                    echo twig_escape_filter($this->env, $this->getAttribute($context["alumno"], "id", array()), "html", null, true);
                    echo "&amp;valor=1'><i class='material-icons' title='Habilitar alumno.'>done</i></a>
\t\t\t\t\t\t\t";
                }
                // line 53
                echo "\t\t\t
\t\t\t\t\t\t\t<a href='../controlador/backend.php?controller=formulario_editarAlumno&amp;id=";
                // line 54
                echo twig_escape_filter($this->env, $this->getAttribute($context["alumno"], "id", array()), "html", null, true);
                echo "'><i class='material-icons' title='Editar alumno.'>edit</i></a>
\t\t\t\t\t\t\t<td><a href='../controlador/backend.php?controller=agregarResponsableAlumno&amp;idAlumno=";
                // line 55
                echo twig_escape_filter($this->env, $this->getAttribute($context["alumno"], "id", array()), "html", null, true);
                echo "'><i class='material-icons' title='Agregar un responsable a este alumno.'>person_add</i></a><a href='../controlador/backend.php?controller=eliminarResponsableAlumno&idAlumno=\".\$rows[\$i][\"id\"].\"'><i class='material-icons' title='Desligar un responsable de este alumno.'>cancel</i></a></td>\t\t\t\t\t
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['alumno'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 58
            echo "\t\t\t\t\t\t</table>

\t\t\t\t\t\t<div class='paginador'>
\t\t\t\t\t\t
\t\t\t\t\t\t";
            // line 62
            if (((isset($context["total_paginas"]) ? $context["total_paginas"] : null) > 1)) {
                echo "  <!--//Si solo hay una pagina, no muestro los botones \"siguiente\" y \"anterior\"-->
\t\t\t\t\t\t   ";
                // line 63
                if (((isset($context["pagina"]) ? $context["pagina"] : null) != 1)) {
                    echo "  <!--//Si no es la primera, tengo que mostrar el boton \"anterior\" y llamar al controlador con el numero de pagina-->
\t\t\t\t\t\t   \t";
                    // line 64
                    $context["pag"] = ((isset($context["pagina"]) ? $context["pagina"] : null) - 1);
                    // line 65
                    echo "\t\t\t\t\t\t    \t<a href='../controlador/backend.php?controller=listadosAlumnos&pagina=";
                    echo twig_escape_filter($this->env, (isset($context["pag"]) ? $context["pag"] : null), "html", null, true);
                    echo "'><button class='anterior'>Anterior</button></a>
\t\t\t\t\t\t    ";
                } else {
                    // line 67
                    echo "\t\t\t\t\t\t    \t<button id='disabledAnterior' disabled>Anterior</button>
\t\t\t\t\t\t    ";
                }
                // line 69
                echo "\t\t\t\t\t\t    ";
                if (((isset($context["pagina"]) ? $context["pagina"] : null) != (isset($context["total_paginas"]) ? $context["total_paginas"] : null))) {
                    echo " <!--//Si no es la ultima, tengo que mostrar el boton \"siguiente\" y llamar al controlador con el numero de pagina--> 
\t\t\t\t\t\t    \t";
                    // line 70
                    $context["pag"] = ((isset($context["pagina"]) ? $context["pagina"] : null) + 1);
                    // line 71
                    echo "\t\t\t\t\t\t    \t<a href='../controlador/backend.php?controller=listadosAlumnos&pagina=";
                    echo twig_escape_filter($this->env, (isset($context["pag"]) ? $context["pag"] : null), "html", null, true);
                    echo "'><button class='siguiente'>Siguiente</button></a>
\t\t\t\t\t\t    ";
                } else {
                    // line 73
                    echo "\t\t\t\t\t\t    \t<button id='disabledSiguiente' disabled>Siguiente</button>
\t\t\t\t\t\t    ";
                }
                // line 75
                echo "\t\t\t\t\t\t";
            }
            // line 76
            echo "\t\t\t\t\t</div>
\t\t\t\t\t";
        }
        // line 78
        echo "\t\t</div>
\t\t\t
\t";
    }

    public function getTemplateName()
    {
        return "listadoAlumnos.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  217 => 78,  213 => 76,  210 => 75,  206 => 73,  200 => 71,  198 => 70,  193 => 69,  189 => 67,  183 => 65,  181 => 64,  177 => 63,  173 => 62,  167 => 58,  158 => 55,  154 => 54,  151 => 53,  146 => 52,  143 => 51,  138 => 49,  135 => 48,  133 => 47,  129 => 46,  125 => 45,  121 => 44,  117 => 43,  114 => 42,  109 => 41,  104 => 39,  101 => 38,  99 => 37,  91 => 31,  88 => 30,  83 => 27,  79 => 25,  77 => 24,  74 => 23,  66 => 17,  64 => 16,  61 => 15,  58 => 14,  51 => 11,  48 => 10,  41 => 7,  38 => 6,  32 => 4,  11 => 2,);
    }
}
/* */
/* 	{% extends 'headerBackend.twig.html' %}*/
/* 	*/
/* 	{% block title %}Menú de{% endblock %}*/
/* */
/* 	{% block saludo %}*/
/* 		{{ usuario }}*/
/* 	{% endblock %}*/
/* */
/* 	{% block titulo %}*/
/* 		{{ titulo }}*/
/* 	{% endblock %}*/
/* */
/* 	{% block operacionesPermitidas %}*/
/* */
/* 	{% if rol == "administracion" %}*/
/* 	<li><a href='backend.php?controller=menuUsuarios'>Usuarios</a></li>*/
/*    <li><a href='backend.php?controller=menuResponsables'>Responsables</a></li>*/
/*    <li><a href='backend.php?controller=menuAlumnos'>Alumnos</a></li>*/
/*    <li><a href='backend.php?controller=menuCuotas'>Cuotas</a></li>*/
/*    <li><a href='backend.php?controller=menuConfig'>Configuraci&oacute;n</a></li>*/
/*    {% endif %}*/
/* */
/*    {% if rol == "gestion" %}*/
/*    <li><a href='backend.php?controller=menuCuotas'>Cuotas y Matriculas</a></li>*/
/*    {% endif %}*/
/* */
/* 	{% endblock %}*/
/* 	*/
/* 	{% block contenido %}*/
/* 		<div id="listado">*/
/* 			<table>*/
/* 				<caption>Listado de alumnos de la escuela</caption>*/
/* 				<tr>*/
/* 					<th>DNI</th><th>Nombre</th><th>Apellido</th><th>Fecha de nacimiento</th><th>Valido</th><th>Operaciones de alumnos</th><th>Operaciones de responsables</th>*/
/* 				</tr>*/
/* 				{% if msjE is defined %}*/
/* 						</table>*/
/* 						{{msjE}}*/
/* 					{% else %}*/
/* 						{% for alumno in rows %}*/
/* 							<tr>*/
/* 							<td>{{alumno.numeroDocumento}}</td>*/
/* 							<td>{{alumno.nombre}}</td>*/
/* 							<td>{{alumno.apellido}}</td>*/
/* 							<td>{{alumno.fechaNacimiento}}</td>*/
/* 							{% if alumno.valido %}*/
/* 									<td>SI</td>*/
/* 									<td><a href='../controlador/backend.php?controller=deshabilitarAlumno&amp;id={{alumno.id}}&amp;valor=0'><i class='material-icons' title='Deshabilitar alumno.'>delete</i></a>*/
/* 							{% else %}*/
/* 									<td>NO</td>*/
/* 									<td><a href='../controlador/backend.php?controller=habilitarAlumno&amp;id={{alumno.id}}&amp;valor=1'><i class='material-icons' title='Habilitar alumno.'>done</i></a>*/
/* 							{% endif %}			*/
/* 							<a href='../controlador/backend.php?controller=formulario_editarAlumno&amp;id={{alumno.id}}'><i class='material-icons' title='Editar alumno.'>edit</i></a>*/
/* 							<td><a href='../controlador/backend.php?controller=agregarResponsableAlumno&amp;idAlumno={{alumno.id}}'><i class='material-icons' title='Agregar un responsable a este alumno.'>person_add</i></a><a href='../controlador/backend.php?controller=eliminarResponsableAlumno&idAlumno=".$rows[$i]["id"]."'><i class='material-icons' title='Desligar un responsable de este alumno.'>cancel</i></a></td>					*/
/* 							</tr>*/
/* 						{% endfor %}*/
/* 						</table>*/
/* */
/* 						<div class='paginador'>*/
/* 						*/
/* 						{% if total_paginas > 1%}  <!--//Si solo hay una pagina, no muestro los botones "siguiente" y "anterior"-->*/
/* 						   {% if pagina != 1%}  <!--//Si no es la primera, tengo que mostrar el boton "anterior" y llamar al controlador con el numero de pagina-->*/
/* 						   	{% set pag = pagina - 1%}*/
/* 						    	<a href='../controlador/backend.php?controller=listadosAlumnos&pagina={{pag}}'><button class='anterior'>Anterior</button></a>*/
/* 						    {% else %}*/
/* 						    	<button id='disabledAnterior' disabled>Anterior</button>*/
/* 						    {% endif %}*/
/* 						    {% if pagina != total_paginas %} <!--//Si no es la ultima, tengo que mostrar el boton "siguiente" y llamar al controlador con el numero de pagina--> */
/* 						    	{% set pag = pagina + 1 %}*/
/* 						    	<a href='../controlador/backend.php?controller=listadosAlumnos&pagina={{pag}}'><button class='siguiente'>Siguiente</button></a>*/
/* 						    {% else %}*/
/* 						    	<button id='disabledSiguiente' disabled>Siguiente</button>*/
/* 						    {% endif %}*/
/* 						{% endif %}*/
/* 					</div>*/
/* 					{% endif %}*/
/* 		</div>*/
/* 			*/
/* 	{% endblock %}*/
