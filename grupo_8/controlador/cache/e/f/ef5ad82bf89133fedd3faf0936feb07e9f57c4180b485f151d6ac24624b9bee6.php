<?php

/* listadoAlumnos.twig.html */
class __TwigTemplate_5940eed742f28477f9505d71ad1aad9d5faa4ac093e0d99ea75fc2f853385d5c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
\t";
        // line 2
        $this->loadTemplate("headerBackend.twig.html", "listadoAlumnos.twig.html", 2)->display($context);
        // line 3
        echo "\t\t<div id=\"listado\">
\t\t\t<table>
\t\t\t\t<caption>Listado de alumnos de la escuela</caption>
\t\t\t\t<tr>
\t\t\t\t\t<th>DNI</th><th>Nombre</th><th>Apellido</th><th>Fecha de nacimiento</th><th>Valido</th><th>Operaciones de alumnos</th><th>Operaciones de responsables</th>
\t\t\t\t</tr>
\t\t\t\t";
        // line 9
        if ( !array_key_exists("msjE", $context)) {
            // line 10
            echo "\t\t\t\t\t\t</table>
\t\t\t\t\t\t";
            // line 11
            echo twig_escape_filter($this->env, (isset($context["msjE"]) ? $context["msjE"] : null), "html", null, true);
            echo "
\t\t\t\t\t";
        } else {
            // line 13
            echo "\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["rows"]) ? $context["rows"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["alumno"]) {
                // line 14
                echo "\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t";
                // line 15
                echo twig_escape_filter($this->env, $this->getAttribute($context["alumno"], (isset($context["numeroDocumento"]) ? $context["numeroDocumento"] : null)), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t";
                // line 16
                echo twig_escape_filter($this->env, $this->getAttribute($context["alumno"], "nombre", array()), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t";
                // line 17
                echo twig_escape_filter($this->env, $this->getAttribute($context["alumno"], "apellido", array()), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t";
                // line 18
                echo twig_escape_filter($this->env, $this->getAttribute($context["alumno"], "fechaNacimiento", array()), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t";
                // line 19
                if ($this->getAttribute($context["alumno"], "valido", array())) {
                    // line 20
                    echo "\t\t\t\t\t\t\t\t\t<td>SI</td>
\t\t\t\t\t\t\t\t\t<td><a href='../controlador/backend.php?controller=deshabilitarAlumno&amp;id=\".\$rows[\$i][\"id\"].\"&valor=0'><i class='material-icons' title='Deshabilitar alumno.'>delete</i></a>
\t\t\t\t\t\t\t";
                } else {
                    // line 23
                    echo "\t\t\t\t\t\t\t\t\t<td>NO</td>
\t\t\t\t\t\t\t\t\t<td><a href='../controlador/backend.php?controller=habilitarAlumno&amp;id=\".\$rows[\$i][\"id\"].\"&valor=1'><i class='material-icons' title='Habilitar alumno.'>done</i></a>
\t\t\t\t\t\t\t";
                }
                // line 25
                echo "\t\t\t
\t\t\t\t\t\t\t<a href='../controlador/backend.php?controller=formulario_editarAlumno&amp;id=\".\$rows[\$i][\"id\"].\"'><i class='material-icons' title='Editar alumno.'>edit</i></a>
\t\t\t\t\t\t\t<td><a href='../controlador/backend.php?controller=agregarResponsableAlumno&amp;idAlumno=\".\$rows[\$i][\"id\"].\"'><i class='material-icons' title='Agregar un responsable a este alumno.'>person_add</i></a><a href='../controlador/backend.php?controller=eliminarResponsableAlumno&idAlumno=\".\$rows[\$i][\"id\"].\"'><i class='material-icons' title='Desligar un responsable de este alumno.'>cancel</i></a></td>\t\t\t\t\t
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['alumno'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            echo "\t\t\t\t\t\t</table>

\t\t\t\t\t\t<div class='paginador'>
\t\t\t\t\t\t
\t\t\t\t\t\t";
            // line 34
            if (((isset($context["total_paginas"]) ? $context["total_paginas"] : null) > 1)) {
                echo "  //Si solo hay una pagina, no muestro los botones \"siguiente\" y \"anterior\"
\t\t\t\t\t\t   ";
                // line 35
                if (((isset($context["pagina"]) ? $context["pagina"] : null) != 1)) {
                    echo " //Si no es la primera, tengo que mostrar el boton \"anterior\" y llamar al controlador con el numero de pagina
\t\t\t\t\t\t   \t";
                    // line 36
                    $context["pag"] = ((isset($context["pagina"]) ? $context["pagina"] : null) - 1);
                    // line 37
                    echo "\t\t\t\t\t\t    \t<a href='../controlador/backend.php?controller=listadosAlumnos&pagina=\".\$pag.\"'><button class='anterior'>Anterior</button></a>
\t\t\t\t\t\t    ";
                } else {
                    // line 39
                    echo "\t\t\t\t\t\t    \t<button id='disabledAnterior' disabled>Anterior</button>
\t\t\t\t\t\t    ";
                }
                // line 41
                echo "\t\t\t\t\t\t    ";
                if (((isset($context["pagina"]) ? $context["pagina"] : null) != (isset($context["total_paginas"]) ? $context["total_paginas"] : null))) {
                    echo " //Si no es la ultima, tengo que mostrar el boton \"siguiente\" y llamar al controlador con el numero de pagina
\t\t\t\t\t\t    \t";
                    // line 42
                    $context["pag"] = ((isset($context["pagina"]) ? $context["pagina"] : null) + 1);
                    // line 43
                    echo "\t\t\t\t\t\t    \t<a href='../controlador/backend.php?controller=listadosAlumnos&pagina=\".\$pag.\"'><button class='siguiente'>Siguiente</button></a>
\t\t\t\t\t\t    ";
                } else {
                    // line 45
                    echo "\t\t\t\t\t\t    \t<button id='disabledSiguiente' disabled>Siguiente</button>
\t\t\t\t\t\t    ";
                }
                // line 47
                echo "\t\t\t\t\t\t";
            }
            // line 48
            echo "\t\t\t\t\t</div>
\t\t\t\t\t";
        }
        // line 50
        echo "\t\t</div>
\t\t\t
\t</div>

</html>";
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
        return array (  134 => 50,  130 => 48,  127 => 47,  123 => 45,  119 => 43,  117 => 42,  112 => 41,  108 => 39,  104 => 37,  102 => 36,  98 => 35,  94 => 34,  88 => 30,  78 => 25,  73 => 23,  68 => 20,  66 => 19,  62 => 18,  58 => 17,  54 => 16,  50 => 15,  47 => 14,  42 => 13,  37 => 11,  34 => 10,  32 => 9,  24 => 3,  22 => 2,  19 => 1,);
    }
}
/* */
/* 	{% include 'headerBackend.twig.html' %}*/
/* 		<div id="listado">*/
/* 			<table>*/
/* 				<caption>Listado de alumnos de la escuela</caption>*/
/* 				<tr>*/
/* 					<th>DNI</th><th>Nombre</th><th>Apellido</th><th>Fecha de nacimiento</th><th>Valido</th><th>Operaciones de alumnos</th><th>Operaciones de responsables</th>*/
/* 				</tr>*/
/* 				{% if msjE is not defined %}*/
/* 						</table>*/
/* 						{{msjE}}*/
/* 					{% else %}*/
/* 						{% for alumno in rows %}*/
/* 							<tr>*/
/* 							{{attribute(alumno,numeroDocumento)}}</td>*/
/* 							{{alumno.nombre}}</td>*/
/* 							{{alumno.apellido}}</td>*/
/* 							{{alumno.fechaNacimiento}}</td>*/
/* 							{% if alumno.valido %}*/
/* 									<td>SI</td>*/
/* 									<td><a href='../controlador/backend.php?controller=deshabilitarAlumno&amp;id=".$rows[$i]["id"]."&valor=0'><i class='material-icons' title='Deshabilitar alumno.'>delete</i></a>*/
/* 							{% else %}*/
/* 									<td>NO</td>*/
/* 									<td><a href='../controlador/backend.php?controller=habilitarAlumno&amp;id=".$rows[$i]["id"]."&valor=1'><i class='material-icons' title='Habilitar alumno.'>done</i></a>*/
/* 							{% endif %}			*/
/* 							<a href='../controlador/backend.php?controller=formulario_editarAlumno&amp;id=".$rows[$i]["id"]."'><i class='material-icons' title='Editar alumno.'>edit</i></a>*/
/* 							<td><a href='../controlador/backend.php?controller=agregarResponsableAlumno&amp;idAlumno=".$rows[$i]["id"]."'><i class='material-icons' title='Agregar un responsable a este alumno.'>person_add</i></a><a href='../controlador/backend.php?controller=eliminarResponsableAlumno&idAlumno=".$rows[$i]["id"]."'><i class='material-icons' title='Desligar un responsable de este alumno.'>cancel</i></a></td>					*/
/* 							</tr>*/
/* 						{% endfor %}*/
/* 						</table>*/
/* */
/* 						<div class='paginador'>*/
/* 						*/
/* 						{% if total_paginas > 1%}  //Si solo hay una pagina, no muestro los botones "siguiente" y "anterior"*/
/* 						   {% if pagina != 1%} //Si no es la primera, tengo que mostrar el boton "anterior" y llamar al controlador con el numero de pagina*/
/* 						   	{% set pag = pagina - 1%}*/
/* 						    	<a href='../controlador/backend.php?controller=listadosAlumnos&pagina=".$pag."'><button class='anterior'>Anterior</button></a>*/
/* 						    {% else %}*/
/* 						    	<button id='disabledAnterior' disabled>Anterior</button>*/
/* 						    {% endif %}*/
/* 						    {% if pagina != total_paginas %} //Si no es la ultima, tengo que mostrar el boton "siguiente" y llamar al controlador con el numero de pagina*/
/* 						    	{% set pag = pagina + 1 %}*/
/* 						    	<a href='../controlador/backend.php?controller=listadosAlumnos&pagina=".$pag."'><button class='siguiente'>Siguiente</button></a>*/
/* 						    {% else %}*/
/* 						    	<button id='disabledSiguiente' disabled>Siguiente</button>*/
/* 						    {% endif %}*/
/* 						{% endif %}*/
/* 					</div>*/
/* 					{% endif %}*/
/* 		</div>*/
/* 			*/
/* 	</div>*/
/* */
/* </html>*/
