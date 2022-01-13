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

/* base.html */
class __TwigTemplate_a7a4c1e7b15d438b1e042b15ae16d705d96fe6b18b5f9f8a957dccbd6fcb9511 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'head' => [$this, 'block_head'],
            'title' => [$this, 'block_title'],
            'header' => [$this, 'block_header'],
            'content' => [$this, 'block_content'],
            'footer' => [$this, 'block_footer'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"pt-br\">
    <head>
        ";
        // line 4
        $this->displayBlock('head', $context, $blocks);
        // line 36
        echo "    </head>
    <body>
        <div id=\"content\">
            ";
        // line 39
        $this->displayBlock('header', $context, $blocks);
        // line 40
        echo "            ";
        $this->displayBlock('content', $context, $blocks);
        // line 41
        echo "        </div>
        <div id=\"footer\">
            ";
        // line 43
        $this->displayBlock('footer', $context, $blocks);
        // line 44
        echo "        </div>
    </body>
</html>
";
    }

    // line 4
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "            <meta charset=\"utf-8\">
            <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
            
            <title>
                ";
        // line 10
        $this->displayBlock('title', $context, $blocks);
        // line 11
        echo "            </title>

            <!-- Google Fonts -->
            <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
            <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
            <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
            
            <!-- Bootstrap -->
            <link rel=\"stylesheet\" href=\"/res/site/css/bootstrap.min.css\">
            
            <!-- Font Awesome -->
            <link rel=\"stylesheet\" href=\"/res/site/css/font-awesome.min.css\">
            
            <!-- Custom CSS -->
            <link rel=\"stylesheet\" href=\"/res/site/css/owl.carousel.css\">
            <link rel=\"stylesheet\" href=\"/res/site/css/style.css\">
            <link rel=\"stylesheet\" href=\"/res/site/css/responsive.css\">

            <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
            <script src=\"https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js\"></script>
            <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
            <![endif]-->
        ";
    }

    // line 10
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 39
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 40
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 43
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "base.html";
    }

    public function getDebugInfo()
    {
        return array (  131 => 43,  125 => 40,  119 => 39,  113 => 10,  85 => 11,  83 => 10,  76 => 5,  72 => 4,  65 => 44,  63 => 43,  59 => 41,  56 => 40,  54 => 39,  49 => 36,  47 => 4,  42 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "base.html", "/var/www/views/site/layouts/base.html");
    }
}
