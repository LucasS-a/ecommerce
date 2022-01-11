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

/* users.html.twig */
class __TwigTemplate_94c33e5e1a889c15ec59b50714d444e0d4264e14ca43bc71fe25cc0cded18a70 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'head' => [$this, 'block_head'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("base.html", "users.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
";
    }

    // line 7
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "<!-- Content Wrapper. Contains page content -->
<div class=\"content-wrapper\">
  <!-- Content Header (Page header) -->
  <section class=\"content-header\">
    <h1>
      Lista de Usuários
    </h1>
    <ol class=\"breadcrumb\">
      <li><a href=\"/admin\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
      <li class=\"active\"><a href=\"/admin/users\">Usuários</a></li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class=\"content\">
  
    <div class=\"row\">
      <div class=\"col-md-12\">
        <div class=\"box box-primary\">
              
              <div class=\"box-header\">
                <a href=\"/admin/users/create\" class=\"btn btn-success\">Cadastrar Usuário</a>
              </div>
  
              <div class=\"box-body no-padding\">
                <table class=\"table table-striped\">
                  <thead>
                    <tr>
                      <th style=\"width: 10px\">#</th>
                      <th>Nome</th>
                      <th>E-mail</th>
                      <th>Login</th>
                      <th style=\"width: 60px\">Admin</th>
                      <th style=\"width: 140px\">&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                    ";
        // line 45
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["users"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 46
            echo "                    <tr>
                      <td>";
            // line 47
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "iduser", [], "any", false, false, false, 47), "html", null, true);
            echo "</td>
                      <td>";
            // line 48
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "desperson", [], "any", false, false, false, 48), "html", null, true);
            echo "</td>
                      <td>";
            // line 49
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "desemail", [], "any", false, false, false, 49), "html", null, true);
            echo "</td>
                      <td>";
            // line 50
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "deslogin", [], "any", false, false, false, 50), "html", null, true);
            echo "</td/>
                      <td>";
            // line 51
            if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["user"], "inadmin", [], "any", false, false, false, 51), 1))) {
                echo "Sim";
            } else {
                echo "Não";
            }
            echo "</td>
                      <td>
                        <a href=\"/admin/users/";
            // line 53
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "iduser", [], "any", false, false, false, 53), "html", null, true);
            echo "\" class=\"btn btn-primary btn-xs\"><i class=\"fa fa-edit\"></i> Editar</a>
                        <a href=\"/admin/users/";
            // line 54
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "iduser", [], "any", false, false, false, 54), "html", null, true);
            echo "/delete\" onclick=\"return confirm('Deseja realmente excluir este registro?')\" class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash\"></i> Excluir</a>
                      </td>
                    </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        echo "                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
      </div>
    </div>
  
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
";
    }

    public function getTemplateName()
    {
        return "users.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 58,  137 => 54,  133 => 53,  124 => 51,  120 => 50,  116 => 49,  112 => 48,  108 => 47,  105 => 46,  101 => 45,  62 => 8,  58 => 7,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "users.html.twig", "/var/www/views/admin/crud/users.html.twig");
    }
}
