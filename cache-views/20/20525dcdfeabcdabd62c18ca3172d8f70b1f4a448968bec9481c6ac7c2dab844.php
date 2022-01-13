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

/* categories.html.twig */
class __TwigTemplate_01d1e95e145f1551da7a35e20117f85a837ad445db4ca8bdb58fd98c29765696 extends Template
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
    <li class=\"active\"><a href=\"/admin/categories\">Categorias</a></li>
  </ol>
</section>

<!-- Main content -->
<section class=\"content\">

  <div class=\"row\">
  \t<div class=\"col-md-12\">
  \t\t<div class=\"box box-primary\">
            
            <div class=\"box-header\">
              <a href=\"/admin/categories/create\" class=\"btn btn-success\">Cadastrar Categoria</a>
            </div>

            <div class=\"box-body no-padding\">
              <table class=\"table table-striped\">
                <thead>
                  <tr>
                    <th style=\"width: 10px\">#</th>
                    <th>Nome da Categoria</th>
                    <th style=\"width: 140px\">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  ";
        // line 35
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 36
            echo "                    <tr>
                      <td>";
            // line 37
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "idcategory", [], "any", false, false, false, 37), "html", null, true);
            echo "</td>
                      <td>";
            // line 38
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "descategory", [], "any", false, false, false, 38), "html", null, true);
            echo "</td>
                      <td>
                        <a href=\"/admin/categories/";
            // line 40
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "idcategory", [], "any", false, false, false, 40), "html", null, true);
            echo "\" class=\"btn btn-primary btn-xs\"><i class=\"fa fa-edit\"></i> Editar</a>
                        <a href=\"/admin/categories/";
            // line 41
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "idcategory", [], "any", false, false, false, 41), "html", null, true);
            echo "/delete\" onclick=\"return confirm('Deseja realmente excluir este registro?')\" class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash\"></i> Excluir</a>
                      </td>
                    </tr>
                  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
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
        return "categories.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 45,  93 => 41,  89 => 40,  84 => 38,  80 => 37,  77 => 36,  73 => 35,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "categories.html.twig", "/var/www/views/admin/category/categories.html.twig");
    }
}
