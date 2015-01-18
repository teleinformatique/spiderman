<?php

/* CoutureTailleurBundle:Tailleur:index.html.twig */
class __TwigTemplate_7b61ad0fedf32aad73b01c9338a77ba752e8fae116a89e38852026944cebc83b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("JordiLlonchCrudGeneratorBundle::layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'page' => array($this, 'block_page'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "JordiLlonchCrudGeneratorBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        $this->displayParentBlock("title", $context, $blocks);
        echo " - ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("views.index.list", array("%entity%" => "Tailleur"), "JordiLlonchCrudGeneratorBundle"), "html", null, true);
        echo "
";
    }

    // line 7
    public function block_page($context, array $blocks = array())
    {
        // line 8
        echo "
<div class=\"row\">

    <div class=\"span8\">
        <h1>";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("views.index.list", array("%entity%" => "Tailleur"), "JordiLlonchCrudGeneratorBundle"), "html", null, true);
        echo "</h1>
    </div>
    <div class=\"span2\">
        ";
        // line 15
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["filterForm"]) ? $context["filterForm"] : $this->getContext($context, "filterForm")), 'errors')) {
            // line 16
            echo "        <div class=\"alert alert-block alert-error fade in form-errors\">
            ";
            // line 17
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["filterForm"]) ? $context["filterForm"] : $this->getContext($context, "filterForm")), 'errors');
            echo "
        </div>
        ";
        }
        // line 20
        echo "        &nbsp;
    </div>
    <div class=\"span2\">
        <div class=\"filters-right\">
            <a class=\"btn dropdown-toggle\" data-toggle=\"collapse\" data-target=\"#filters\">
                ";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("views.index.filters", array(), "JordiLlonchCrudGeneratorBundle"), "html", null, true);
        echo "
                <span class=\"caret\"></span>
            </a>
        </div>
    </div>

    <div class=\"span12\">
        <div id=\"filters\" class=\"collapse\">

            <form class=\"well\" action=\"";
        // line 34
        echo $this->env->getExtension('routing')->getPath("tailleur");
        echo "\" method=\"get\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["filterForm"]) ? $context["filterForm"] : $this->getContext($context, "filterForm")), 'enctype');
        echo ">
                ";
        // line 35
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["filterForm"]) ? $context["filterForm"] : $this->getContext($context, "filterForm")), "id", array()), 'row');
        echo "
                ";
        // line 36
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["filterForm"]) ? $context["filterForm"] : $this->getContext($context, "filterForm")), "nom", array()), 'row');
        echo "
                ";
        // line 37
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["filterForm"]) ? $context["filterForm"] : $this->getContext($context, "filterForm")), "prenom", array()), 'row');
        echo "
                ";
        // line 38
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["filterForm"]) ? $context["filterForm"] : $this->getContext($context, "filterForm")), "telephone", array()), 'row');
        echo "
                ";
        // line 39
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["filterForm"]) ? $context["filterForm"] : $this->getContext($context, "filterForm")), "email", array()), 'row');
        echo "
                ";
        // line 40
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["filterForm"]) ? $context["filterForm"] : $this->getContext($context, "filterForm")), "login", array()), 'row');
        echo "
                ";
        // line 41
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["filterForm"]) ? $context["filterForm"] : $this->getContext($context, "filterForm")), "password", array()), 'row');
        echo "
                ";
        // line 42
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["filterForm"]) ? $context["filterForm"] : $this->getContext($context, "filterForm")), "dateembauche", array()), 'row');
        echo "
                ";
        // line 43
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["filterForm"]) ? $context["filterForm"] : $this->getContext($context, "filterForm")), "salaire", array()), 'row');
        echo "
                ";
        // line 44
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["filterForm"]) ? $context["filterForm"] : $this->getContext($context, "filterForm")), "user", array()), 'row');
        echo "
                ";
        // line 45
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["filterForm"]) ? $context["filterForm"] : $this->getContext($context, "filterForm")), "tailleurcol", array()), 'row');
        echo "
                ";
        // line 46
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["filterForm"]) ? $context["filterForm"] : $this->getContext($context, "filterForm")), "datemod", array()), 'row');
        echo "
                ";
        // line 47
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["filterForm"]) ? $context["filterForm"] : $this->getContext($context, "filterForm")), "iduser", array()), 'row');
        echo "
                ";
        // line 48
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["filterForm"]) ? $context["filterForm"] : $this->getContext($context, "filterForm")), "datec", array()), 'row');
        echo "
                ";
        // line 49
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["filterForm"]) ? $context["filterForm"] : $this->getContext($context, "filterForm")), 'rest');
        echo "

                <p>
                    <button type=\"submit\" name=\"filter_action\" value=\"filter\">";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("views.index.filter", array(), "JordiLlonchCrudGeneratorBundle"), "html", null, true);
        echo "</button>
                    <button type=\"submit\" name=\"filter_action\" value=\"reset\">";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("views.index.reset", array(), "JordiLlonchCrudGeneratorBundle"), "html", null, true);
        echo "</button>
                </p>
            </form>
        </div>
    </div>

    <div class=\"span12\">

    <table class=\"table table-striped table-bordered table-condensed\">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Telephone</th>
            <th>Email</th>
            <th>Login</th>
            <th>Password</th>
            <th>Dateembauche</th>
            <th>Salaire</th>
            <th>User</th>
            <th>Tailleurcol</th>
            <th>Datemod</th>
            <th>Iduser</th>
            <th>Datec</th>
            <th>";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("views.index.actions", array(), "JordiLlonchCrudGeneratorBundle"), "html", null, true);
        echo "</th>
        </tr>
    </thead>
    <tbody>
    ";
        // line 82
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 83
            echo "        <tr>
            <td><a href=\"";
            // line 84
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("tailleur_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "id", array()), "html", null, true);
            echo "</a></td>
            <td>";
            // line 85
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "nom", array()), "html", null, true);
            echo "</td>
            <td>";
            // line 86
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "prenom", array()), "html", null, true);
            echo "</td>
            <td>";
            // line 87
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "telephone", array()), "html", null, true);
            echo "</td>
            <td>";
            // line 88
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "email", array()), "html", null, true);
            echo "</td>
            <td>";
            // line 89
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "login", array()), "html", null, true);
            echo "</td>
            <td>";
            // line 90
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "password", array()), "html", null, true);
            echo "</td>
            <td>";
            // line 91
            if ($this->getAttribute($context["entity"], "dateembauche", array())) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["entity"], "dateembauche", array()), "Y-m-d H:i:s"), "html", null, true);
            }
            echo "</td>
            <td>";
            // line 92
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "salaire", array()), "html", null, true);
            echo "</td>
            <td>";
            // line 93
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "user", array()), "html", null, true);
            echo "</td>
            <td>";
            // line 94
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "tailleurcol", array()), "html", null, true);
            echo "</td>
            <td>";
            // line 95
            if ($this->getAttribute($context["entity"], "datemod", array())) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["entity"], "datemod", array()), "Y-m-d H:i:s"), "html", null, true);
            }
            echo "</td>
            <td>";
            // line 96
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "iduser", array()), "html", null, true);
            echo "</td>
            <td>";
            // line 97
            if ($this->getAttribute($context["entity"], "datec", array())) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["entity"], "datec", array()), "Y-m-d H:i:s"), "html", null, true);
            }
            echo "</td>
            <td>
        <a class=\"btn btn-mini\" href=\"";
            // line 99
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("tailleur_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">
            ";
            // line 100
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("views.actions.show", array(), "JordiLlonchCrudGeneratorBundle"), "html", null, true);
            echo "
        </a>
        <a class=\"btn btn-mini\" href=\"";
            // line 102
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("tailleur_edit", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">
            ";
            // line 103
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("views.actions.edit", array(), "JordiLlonchCrudGeneratorBundle"), "html", null, true);
            echo "
        </a>            </td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 107
        echo "    </tbody>
</table>
    </div>

    <div class=\"span4\">
    ";
        // line 112
        echo (isset($context["pagerHtml"]) ? $context["pagerHtml"] : $this->getContext($context, "pagerHtml"));
        echo "
    </div>

        <div class=\"span8\">
    <a class=\"btn btn-primary likepaginator\" href=\"";
        // line 116
        echo $this->env->getExtension('routing')->getPath("tailleur_new");
        echo "\">
            ";
        // line 117
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("views.index.createnew", array(), "JordiLlonchCrudGeneratorBundle"), "html", null, true);
        echo " Tailleur
        </a>
    </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "CoutureTailleurBundle:Tailleur:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  313 => 117,  309 => 116,  302 => 112,  295 => 107,  285 => 103,  281 => 102,  276 => 100,  272 => 99,  265 => 97,  261 => 96,  255 => 95,  251 => 94,  247 => 93,  243 => 92,  237 => 91,  233 => 90,  229 => 89,  225 => 88,  221 => 87,  217 => 86,  213 => 85,  207 => 84,  204 => 83,  200 => 82,  193 => 78,  165 => 53,  161 => 52,  155 => 49,  151 => 48,  147 => 47,  143 => 46,  139 => 45,  135 => 44,  131 => 43,  127 => 42,  123 => 41,  119 => 40,  115 => 39,  111 => 38,  107 => 37,  103 => 36,  99 => 35,  93 => 34,  81 => 25,  74 => 20,  68 => 17,  65 => 16,  63 => 15,  57 => 12,  51 => 8,  48 => 7,  40 => 4,  37 => 3,  11 => 1,);
    }
}
