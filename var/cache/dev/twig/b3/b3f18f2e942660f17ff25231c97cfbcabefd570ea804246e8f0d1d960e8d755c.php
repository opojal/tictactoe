<?php

/* tic/board.html.twig */
class __TwigTemplate_40ad115d4372d89be65d89e490895aae10f5b7d081084b619f03d406091b0fbc extends Twig_Template
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
        $__internal_7a95d20866a0fcc5173bdd35df6a1942b1a7b7a89ab70e25650b6385d8a370a2 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7a95d20866a0fcc5173bdd35df6a1942b1a7b7a89ab70e25650b6385d8a370a2->enter($__internal_7a95d20866a0fcc5173bdd35df6a1942b1a7b7a89ab70e25650b6385d8a370a2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "tic/board.html.twig"));

        // line 1
        echo "LET'S PLAY A GAME...

type X or O . and then click the \"Make a move\" button!

<form action=\"/play\"> 
  <table class=\"board\" style=\"width:50%;border: 1px solid black\">
    ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(0, 2));
        foreach ($context['_seq'] as $context["_key"] => $context["x"]) {
            // line 8
            echo "      <tr class=\"row\" style=\"border: 1px solid black\">
        ";
            // line 9
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(0, 2));
            foreach ($context['_seq'] as $context["_key"] => $context["y"]) {
                // line 10
                echo "          <td class=\"cell\" style=\"border: 1px solid black\">
            <input type=\"input\" name=\"";
                // line 11
                echo twig_escape_filter($this->env, $context["x"], "html", null, true);
                echo "-";
                echo twig_escape_filter($this->env, $context["y"], "html", null, true);
                echo "\">
          </td>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['y'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 14
            echo "      </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['x'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "  </table>

  <input type=\"submit\" name=\"move\" value=\"Make a move\">
</form>
after the board

";
        
        $__internal_7a95d20866a0fcc5173bdd35df6a1942b1a7b7a89ab70e25650b6385d8a370a2->leave($__internal_7a95d20866a0fcc5173bdd35df6a1942b1a7b7a89ab70e25650b6385d8a370a2_prof);

    }

    public function getTemplateName()
    {
        return "tic/board.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 16,  55 => 14,  44 => 11,  41 => 10,  37 => 9,  34 => 8,  30 => 7,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("LET'S PLAY A GAME...

type X or O . and then click the \"Make a move\" button!

<form action=\"/play\"> 
  <table class=\"board\" style=\"width:50%;border: 1px solid black\">
    {% for x in 0..2 %}
      <tr class=\"row\" style=\"border: 1px solid black\">
        {% for y in 0..2 %}
          <td class=\"cell\" style=\"border: 1px solid black\">
            <input type=\"input\" name=\"{{x}}-{{y}}\">
          </td>
        {% endfor %}
      </tr>
    {% endfor %}
  </table>

  <input type=\"submit\" name=\"move\" value=\"Make a move\">
</form>
after the board

", "tic/board.html.twig", "/var/www/tic/app/Resources/views/tic/board.html.twig");
    }
}
