<?php

/* CoutureCoutureBundle:Mesure:show.html.twig */
class __TwigTemplate_6991e3f3a191701c01c8df307956694703f4ed11b6c60d02beb4493978031e2f extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("views.show.show", array("%entity%" => "Mesure"), "JordiLlonchCrudGeneratorBundle"), "html", null, true);
        echo "
";
    }

    // line 7
    public function block_page($context, array $blocks = array())
    {
        // line 8
        echo "
<h1>Mesure</h1>

<form class=\"form-horizontal\">
    <fieldset>        <div class=\"control-group\">
            <label class=\"control-label\">Id</label>
            <div class=\"controls\">                <span class=\"input-xlarge uneditable-input\">";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()), "html", null, true);
        echo "</span>            </div>
        </div>        <div class=\"control-group\">
            <label class=\"control-label\">Cou</label>
            <div class=\"controls\">                <span class=\"input-xlarge uneditable-input\">";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "cou", array()), "html", null, true);
        echo "</span>            </div>
        </div>        <div class=\"control-group\">
            <label class=\"control-label\">Poitrine</label>
            <div class=\"controls\">                <span class=\"input-xlarge uneditable-input\">";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "poitrine", array()), "html", null, true);
        echo "</span>            </div>
        </div>        <div class=\"control-group\">
            <label class=\"control-label\">Taille</label>
            <div class=\"controls\">                <span class=\"input-xlarge uneditable-input\">";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "taille", array()), "html", null, true);
        echo "</span>            </div>
        </div>        <div class=\"control-group\">
            <label class=\"control-label\">Ceinture</label>
            <div class=\"controls\">                <span class=\"input-xlarge uneditable-input\">";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "ceinture", array()), "html", null, true);
        echo "</span>            </div>
        </div>        <div class=\"control-group\">
            <label class=\"control-label\">Longchemise</label>
            <div class=\"controls\">                <span class=\"input-xlarge uneditable-input\">";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "longchemise", array()), "html", null, true);
        echo "</span>            </div>
        </div>        <div class=\"control-group\">
            <label class=\"control-label\">Longpantalon</label>
            <div class=\"controls\">                <span class=\"input-xlarge uneditable-input\">";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "longpantalon", array()), "html", null, true);
        echo "</span>            </div>
        </div>        <div class=\"control-group\">
            <label class=\"control-label\">Longrobe</label>
            <div class=\"controls\">                <span class=\"input-xlarge uneditable-input\">";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "longrobe", array()), "html", null, true);
        echo "</span>            </div>
        </div>        <div class=\"control-group\">
            <label class=\"control-label\">Manche</label>
            <div class=\"controls\">                <span class=\"input-xlarge uneditable-input\">";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "manche", array()), "html", null, true);
        echo "</span>            </div>
        </div>        <div class=\"control-group\">
            <label class=\"control-label\">Hanche</label>
            <div class=\"controls\">                <span class=\"input-xlarge uneditable-input\">";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "hanche", array()), "html", null, true);
        echo "</span>            </div>
        </div>        <div class=\"control-group\">
            <label class=\"control-label\">Epaule</label>
            <div class=\"controls\">                <span class=\"input-xlarge uneditable-input\">";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "epaule", array()), "html", null, true);
        echo "</span>            </div>
        </div>    </fieldset>
</form>

<div>
    <div class=\"float-left\">
        <a class=\"btn\" href=\"";
        // line 50
        echo $this->env->getExtension('routing')->getPath("mesure");
        echo "\">
            ";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("views.recordactions.backtothelist", array(), "JordiLlonchCrudGeneratorBundle"), "html", null, true);
        echo "
        </a>
    </div>
    <div class=\"float-left\">
        <a class=\"btn btn-primary\" href=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("mesure_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">
            ";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("views.recordactions.edit", array(), "JordiLlonchCrudGeneratorBundle"), "html", null, true);
        echo "
        </a>
    </div>
    <div class=\"float-left\">
        <form action=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("mesure_delete", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\" method=\"post\">
            <input type=\"hidden\" name=\"_method\" value=\"DELETE\" />
            ";
        // line 62
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'widget');
        echo "
            <button class=\"btn btn-danger\" type=\"submit\" onclick=\"return confirm('";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("views.recordactions.confirm", array(), "JordiLlonchCrudGeneratorBundle"), "html", null, true);
        echo "');\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("views.recordactions.delete", array(), "JordiLlonchCrudGeneratorBundle"), "html", null, true);
        echo "</button>
        </form>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "CoutureCoutureBundle:Mesure:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  159 => 63,  155 => 62,  150 => 60,  143 => 56,  139 => 55,  132 => 51,  128 => 50,  119 => 44,  113 => 41,  107 => 38,  101 => 35,  95 => 32,  89 => 29,  83 => 26,  77 => 23,  71 => 20,  65 => 17,  59 => 14,  51 => 8,  48 => 7,  40 => 4,  37 => 3,  11 => 1,);
    }
}
