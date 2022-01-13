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

/* categories-update.html.twig */
class __TwigTemplate_5432e24a4d1bbd2236e5ef1bfa08d3e2af11610d1345efa7c079ec3a899244eb extends Template
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
</section>

<!-- Main content -->
<section class=\"content\">

  <div class=\"row\">
  \t<div class=\"col-md-12\">
  \t\t<div class=\"box box-primary\">
        <div class=\"box-header with-border\">
          <h3 class=\"box-title\">Editar Categoria</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role=\"form\" action=\"/admin/categories/";
        // line 21
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["category"] ?? null), "idcategory", [], "any", false, false, false, 21), "html", null, true);
        echo "\" method=\"post\">
          <div class=\"box-body\">
            <div class=\"form-group\">
              <label for=\"descategory\">Nome da categoria</label>
              <input type=\"text\" class=\"form-control\" id=\"descategory\" name=\"descategory\" placeholder=\"Digite o nome da categoria\" value=\"";
        // line 25
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["category"] ?? null), "descategory", [], "any", false, false, false, 25), "html", null, true);
        echo "\">
            </div>
          </div>
          <!-- /.box-body -->
          <div class=\"box-footer\">
            <button type=\"submit\" class=\"btn btn-primary\">Salvar</button>
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
        return "categories-update.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 25,  59 => 21,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "categories-update.html.twig", "/var/www/views/admin/category/categories-update.html.twig");
    }
}
