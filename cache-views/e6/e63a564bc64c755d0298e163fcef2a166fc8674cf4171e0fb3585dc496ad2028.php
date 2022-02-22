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

/* categories.html */
class __TwigTemplate_52cc9af992bd3bd4fd531bda9bf2d36220c01d220aefe450a8613454f1ac2390 extends Template
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
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<li><a href=/categories/2>Apple</a></li><li><a href=/categories/5>LG</a></li><li><a href=/categories/3>Motorola</a></li><li><a href=/categories/1>Samsung</a></li>";
    }

    public function getTemplateName()
    {
        return "categories.html";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "categories.html", "/var/www/views/site/categories.html");
    }
}
