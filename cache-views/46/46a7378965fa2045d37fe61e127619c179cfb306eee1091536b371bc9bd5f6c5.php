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

/* categories-create.html */
class __TwigTemplate_9dc3821bd1b6bfe104aa53cb73935748ab714b4e6a0942ffb9ffa9aee7503967 extends Template
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
        echo "<!-- Content Wrapper. Contains page content -->
<div class=\"content-wrapper\">
<!-- Content Header (Page header) -->
<section class=\"content-header\">
  <h1>
    Lista de Categorias
  </h1>
  <ol class=\"breadcrumb\">
    <li><a href=\"/admin\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
    <li><a href=\"/admin/categories\">Categorias</a></li>
    <li class=\"active\"><a href=\"/admin/categories/create\">Cadastrar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class=\"content\">

  <div class=\"row\">
  \t<div class=\"col-md-12\">
  \t\t<div class=\"box box-success\">
        <div class=\"box-header with-border\">
          <h3 class=\"box-title\">Novo Categoria</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role=\"form\" action=\"/admin/categories/create\" method=\"post\">
          <div class=\"box-body\">
            <div class=\"form-group\">
              <label for=\"descategory\">Nome da categoria</label>
              <input type=\"text\" class=\"form-control\" id=\"descategory\" name=\"descategory\" placeholder=\"Digite o nome da categoria\">
            </div>
          </div>
          <!-- /.box-body -->
          <div class=\"box-footer\">
            <button type=\"submit\" class=\"btn btn-success\">Cadastrar</button>
          </div>
        </form>
      </div>
  \t</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->";
    }

    public function getTemplateName()
    {
        return "categories-create.html";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "categories-create.html", "/var/www/views/admin/category/categories-create.html");
    }
}
