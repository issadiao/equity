<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/custom/rbg_theme/templates/system/page.html.twig */
class __TwigTemplate_a398b64f74396fd1f2b781247a2d6d7ee3082bda70504446044cb9cc5d24cbea extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 42
        echo "
";
        // line 43
        $this->loadTemplate("@rbg_theme/includes/header.html.twig", "themes/custom/rbg_theme/templates/system/page.html.twig", 43)->display($context);
        // line 44
        echo "
<div class=\"container mt-5 mb-5\">

    ";
        // line 47
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "highlighted", [], "any", false, false, true, 47), 47, $this->source), "html", null, true);
        echo "
    ";
        // line 48
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "help", [], "any", false, false, true, 48)) {
            // line 49
            echo "      <div class=\"help\">
        ";
            // line 50
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "help", [], "any", false, false, true, 50), 50, $this->source), "html", null, true);
            echo "
      </div>
    ";
        }
        // line 53
        echo "    ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 53), 53, $this->source), "html", null, true);
        echo "


</div>

";
        // line 58
        $this->loadTemplate("@rbg_theme/includes/footer.html.twig", "themes/custom/rbg_theme/templates/system/page.html.twig", 58)->display($context);
    }

    public function getTemplateName()
    {
        return "themes/custom/rbg_theme/templates/system/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 58,  64 => 53,  58 => 50,  55 => 49,  53 => 48,  49 => 47,  44 => 44,  42 => 43,  39 => 42,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/rbg_theme/templates/system/page.html.twig", "/Users/issa/Sites/APCS/drupal/web/themes/custom/rbg_theme/templates/system/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 43, "if" => 48);
        static $filters = array("escape" => 47);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['include', 'if'],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
