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

/* users-update.html.twig */
class __TwigTemplate_c2057edd29e33bb542af0a5c40cd4387249e907899337436f5e9dc3455189b7e extends Template
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
        $this->parent = $this->loadTemplate("base.html", "users-update.html.twig", 1);
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
</section>

<!-- Main content -->
<section class=\"content\">

  <div class=\"row\">
  \t<div class=\"col-md-12\">
  \t\t<div class=\"box box-primary\">
        <div class=\"box-header with-border\">
          <h3 class=\"box-title\">Editar Usuário</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role=\"form\" action=\"/admin/users/";
        // line 28
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "iduser", [], "any", false, false, false, 28), "html", null, true);
        echo "\" method=\"post\">
          <div class=\"box-body\">
            <div class=\"form-group\">
              <label for=\"desperson\">Nome</label>
              <input type=\"text\" class=\"form-control\" id=\"desperson\" name=\"desperson\" placeholder=\"Digite o nome\" value=\"";
        // line 32
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "desperson", [], "any", false, false, false, 32), "html", null, true);
        echo "\">
            </div>
            <div class=\"form-group\">
              <label for=\"deslogin\">Login</label>
              <input type=\"text\" class=\"form-control\" id=\"deslogin\" name=\"deslogin\" placeholder=\"Digite o login\"  value=\"";
        // line 36
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "deslogin", [], "any", false, false, false, 36), "html", null, true);
        echo "\">
            </div>
            <div class=\"form-group\">
              <label for=\"nrphone\">Telefone</label>
              <input type=\"tel\" class=\"form-control\" id=\"nrphone\" name=\"nrphone\" placeholder=\"Digite o telefone\"  value=\"";
        // line 40
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "nrphone", [], "any", false, false, false, 40), "html", null, true);
        echo "\">
            </div>
            <div class=\"form-group\">
              <label for=\"desemail\">E-mail</label>
              <input type=\"email\" class=\"form-control\" id=\"desemail\" name=\"desemail\" placeholder=\"Digite o e-mail\" value=\"";
        // line 44
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "desemail", [], "any", false, false, false, 44), "html", null, true);
        echo "\">
            </div>
            <div class=\"checkbox\">
              <label>
                <input type=\"checkbox\" name=\"inadmin\" value=\"1\" ";
        // line 48
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "inadmin", [], "any", false, false, false, 48), 1))) {
            echo "checked";
        }
        echo "> Acesso de Administrador
              </label>
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
<!-- /.content-wrapper -->
";
    }

    public function getTemplateName()
    {
        return "users-update.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 48,  112 => 44,  105 => 40,  98 => 36,  91 => 32,  84 => 28,  62 => 8,  58 => 7,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "users-update.html.twig", "/var/www/views/admin/crud/users-update.html.twig");
    }
}
