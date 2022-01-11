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

/* users-create.html.twig */
class __TwigTemplate_99a8d6e3508f0cccaf9fb7b251fecce8ef5c208b31704b43309594b4fe1eb7b0 extends Template
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
        $this->parent = $this->loadTemplate("base.html", "users-create.html.twig", 1);
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
    <li><a href=\"/admin/users\">Usuários</a></li>
    <li class=\"active\"><a href=\"/admin/users/create\">Cadastrar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class=\"content\">

  <div class=\"row\">
  \t<div class=\"col-md-12\">
  \t\t<div class=\"box box-success\">
        <div class=\"box-header with-border\">
          <h3 class=\"box-title\">Novo Usuário</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role=\"form\" action=\"/admin/users/create\" method=\"post\">
          <div class=\"box-body\">
            <div class=\"form-group\">
              <label for=\"desperson\">Nome</label>
              <input type=\"text\" class=\"form-control\" id=\"desperson\" name=\"desperson\" placeholder=\"Digite o nome\">
            </div>
            <div class=\"form-group\">
              <label for=\"deslogin\">Login</label>
              <input type=\"text\" class=\"form-control\" id=\"deslogin\" name=\"deslogin\" placeholder=\"Digite o login\">
            </div>
            <div class=\"form-group\">
              <label for=\"nrphone\">Telefone</label>
              <input type=\"tel\" class=\"form-control\" id=\"nrphone\" name=\"nrphone\" placeholder=\"Digite o telefone\">
            </div>
            <div class=\"form-group\">
              <label for=\"desemail\">E-mail</label>
              <input type=\"email\" class=\"form-control\" id=\"desemail\" name=\"desemail\" placeholder=\"Digite o e-mail\">
            </div>
            <div class=\"form-group\">
              <label for=\"despassword\">Senha</label>
              <input type=\"password\" class=\"form-control\" id=\"despassword\" name=\"despassword\" placeholder=\"Digite a senha\">
            </div>
            <div class=\"checkbox\">
              <label>
                <input type=\"checkbox\" name=\"inadmin\" value=\"1\"> Acesso de Administrador
              </label>
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
<!-- /.content-wrapper -->
";
    }

    public function getTemplateName()
    {
        return "users-create.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 8,  58 => 7,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "users-create.html.twig", "/var/www/views/admin/crud/users-create.html.twig");
    }
}
