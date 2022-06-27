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

/* themes/custom/rbg_theme/templates/system/page--front.html.twig */
class __TwigTemplate_ccef65623fc9cd1fe0ee0543d86283c0ea1646f8090973119e2ee8b9f9b26c1f extends \Twig\Template
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
        // line 1
        $this->loadTemplate("@rbg_theme/includes/header.html.twig", "themes/custom/rbg_theme/templates/system/page--front.html.twig", 1)->display($context);
        // line 2
        echo "
<div class=\"container\">
  <div class=\"row\">
    <div class=\"col\">
      <div class=\"card shadow p-3 mb-5\">
        <div class=\"card-body\">
          <a href=\"/generate-codes\">Generate Codes</a>
        </div>
      </div>
    </div>
    <div class=\"col\">
      <div class=\"card shadow p-3 mb-5\">
        <div class=\"card-body\">
          <a href=\"/employees\">Employee List</a>
        </div>
      </div>
    </div>
  </div>
  <div class=\"row\">
    <div class=\"col\">
      <div class=\"card shadow p-3 mb-5\">
        <div class=\"card-body\">
          <a href=\"/activate-code\">Activate Code</a>
        </div>
      </div>
    </div>
    <div class=\"col\">
      <div class=\"card shadow p-3 mb-5\">
        <div class=\"card-body\">
          This is some text within a card body.
        </div>
      </div>
    </div>
    <div class=\"col\">
      <div class=\"card shadow p-3 mb-5\">
        <div class=\"card-body\">
          This is some text within a card body.
        </div>
      </div>
    </div>
  </div>
</div>


";
        // line 46
        $this->loadTemplate("@rbg_theme/includes/footer.html.twig", "themes/custom/rbg_theme/templates/system/page--front.html.twig", 46)->display($context);
    }

    public function getTemplateName()
    {
        return "themes/custom/rbg_theme/templates/system/page--front.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 46,  41 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/rbg_theme/templates/system/page--front.html.twig", "/Users/issa/Sites/APCS/drupal/web/themes/custom/rbg_theme/templates/system/page--front.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 1);
        static $filters = array();
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['include'],
                [],
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
