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

/* @rbg_theme/includes/header.html.twig */
class __TwigTemplate_a16ea033cca4c12e224af06898bf802429f32dcc958344613f440523549caa1b extends \Twig\Template
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
        echo "<div class=\"container\">
  <header class=\"d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom\">
    <a href=\"/\" class=\"d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none\">
      <svg class=\"bi me-2\" width=\"40\" height=\"32\"><use xlink:href=\"#bootstrap\"></use></svg>
      <span class=\"fs-4\">Equity In Care</span>
    </a>

    <ul class=\"nav nav-pills\">
      <li class=\"nav-item\"><a href=\"/\" class=\"nav-link active\" aria-current=\"page\">Home</a></li>
      <li class=\"nav-item\"><a href=\"#\" class=\"nav-link\">Features</a></li>
      <li class=\"nav-item\"><a href=\"#\" class=\"nav-link\">Pricing</a></li>
      <li class=\"nav-item\"><a href=\"#\" class=\"nav-link\">FAQs</a></li>
      <li class=\"nav-item\"><a href=\"#\" class=\"nav-link\">About</a></li>
    </ul>
  </header>
</div>
";
    }

    public function getTemplateName()
    {
        return "@rbg_theme/includes/header.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@rbg_theme/includes/header.html.twig", "/Users/issa/Sites/Equity/drupal/web/themes/custom/rbg_theme/templates/includes/header.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array();
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
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
