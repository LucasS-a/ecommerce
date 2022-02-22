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
class __TwigTemplate_bade2792272163e98a1e1e26bc4487661ee54d8ceb67e7030e2980590021c32c extends Template
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
        // line 35
        echo "    </head>
    <body class=\"hold-transition skin-blue sidebar-mini\">
        ";
        // line 37
        $this->displayBlock('header', $context, $blocks);
        // line 38
        echo "        ";
        $this->displayBlock('content', $context, $blocks);
        // line 39
        echo "        ";
        $this->displayBlock('footer', $context, $blocks);
        echo "        
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
            <!-- Tell the browser to be responsive to screen width -->
            <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">
            <!-- Bootstrap 3.3.6 -->
            <link rel=\"stylesheet\" href=\"/res/admin/bootstrap/css/bootstrap.min.css\">
            <!-- Font Awesome -->
            <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css\">
            <!-- Ionicons -->
            <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css\">
            <!-- Theme style -->
            <link rel=\"stylesheet\" href=\"/res/admin/dist/css/AdminLTE.min.css\">
            <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
                    page. However, you can choose any other skin. Make sure you
                    apply the skin class to the body tag so the changes take effect.
            -->
            <link rel=\"stylesheet\" href=\"/res/admin/dist/css/skins/skin-blue.min.css\">

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
            <script src=\"https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js\"></script>
            <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
            <![endif]-->
        ";
    }

    // line 10
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "admin";
    }

    // line 37
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 38
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 39
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
        return array (  126 => 39,  120 => 38,  114 => 37,  107 => 10,  80 => 11,  78 => 10,  71 => 5,  67 => 4,  58 => 39,  55 => 38,  53 => 37,  49 => 35,  47 => 4,  42 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "base.html", "/var/www/views/admin/layouts/base.html");
    }
}
