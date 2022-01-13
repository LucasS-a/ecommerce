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

/* forgot.html */
class __TwigTemplate_e3e732ea1a1a02751c30714aa8dfdd3274391a3ca9b6927035350a491c7e70b8 extends Template
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
        echo "<!DOCTYPE html>
<html>
<head>
  <meta charset=\"utf-8\">
  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
  <title>AdminLTE 2 | Lockscreen</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src=\"https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js\"></script>
  <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
  <![endif]-->
</head>
<body class=\"hold-transition lockscreen\">
<!-- Automatic element centering -->
<div class=\"lockscreen-wrapper\">
  <div class=\"lockscreen-logo\">
    <a href=\"/res/admin/index2.html\"><b>Admin</b>LTE</a>
  </div>

  <!-- START LOCK SCREEN ITEM -->
  <div class=\"lockscreen-item\">

    <!-- lockscreen credentials (contains the form) -->
    <form  action=\"/admin/forgot\" method=\"post\">
      <div class=\"input-group\">
        <input type=\"email\" class=\"form-control\" placeholder=\"Digite o e-mail\" name=\"email\">

        <div class=\"input-group-btn\">
          <button type=\"submit\" class=\"btn\"><i class=\"fa fa-arrow-right text-muted\"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class=\"help-block text-center\">
    Digite seu e-mail e receba as instruções para redefinir a sua senha.
  </div>
  <div class=\"text-center\">
    <a href=\"/admin/login\">Or sign in as a different user</a>
  </div>
  <div class=\"lockscreen-footer text-center\">
    Copyright &copy; 2014-2016 <b><a href=\"http://almsaeedstudio.com\" class=\"text-black\">Almsaeed Studio</a></b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->

<!-- jQuery 2.2.3 -->
<script src=\"/res/admin/plugins/jQuery/jquery-2.2.3.min.js\"></script>
<!-- Bootstrap 3.3.6 -->
<script src=\"/res/admin/bootstrap/js/bootstrap.min.js\"></script>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "forgot.html";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "forgot.html", "/var/www/views/admin/forgot/forgot.html");
    }
}
