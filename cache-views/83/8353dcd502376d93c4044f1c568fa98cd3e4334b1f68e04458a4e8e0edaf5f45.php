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

/* header.html.twig */
class __TwigTemplate_9b8f784e7bc1cb9ade1ad755441fc4010aa89317868ef14cbad1d2c886df77bd extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'head' => [$this, 'block_head'],
            'header' => [$this, 'block_header'],
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
        $this->parent = $this->loadTemplate("base.html", "header.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " 
    ";
        // line 4
        $this->displayParentBlock("head", $context, $blocks);
        echo "
";
    }

    // line 7
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "    <div class=\"header-area\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-md-8\">
                    <div class=\"user-menu\">
                        <ul>
                            <li><a href=\"#\"><i class=\"fa fa-user\"></i> Minha Conta</a></li>
                            <li><a href=\"#\"><i class=\"fa fa-heart\"></i> Lista de Desejos</a></li>
                            <li><a href=\"/cart\"><i class=\"fa fa-shopping-cart\"></i> Meu Carrinho</a></li>
                            ";
        // line 17
        if (call_user_func_array($this->env->getFunction('checkLogin')->getCallable(), [false])) {
            // line 18
            echo "                                <li><a href=\"/profile\"><i class=\"fa fa-user\"></i> ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('getNameUser')->getCallable(), []), "html", null, true);
            echo "</a></li>
                                <li><a href=\"/logout\"><i class=\"fa fa-close\"></i> Logout</a></li>
                            ";
        } else {
            // line 21
            echo "                                <li><a href=\"/login\"><i class=\"fa fa-lock\"></i> Login</a></li>
                            ";
        }
        // line 22
        echo " 
                        </ul>
                    </div>
                </div>
                
                <div class=\"col-md-4\">
                    <div class=\"header-right\">
                        <ul class=\"list-unstyled list-inline\">
                            <li class=\"dropdown dropdown-small\">
                                <a data-toggle=\"dropdown\" data-hover=\"dropdown\" class=\"dropdown-toggle\" href=\"#\"><span class=\"key\">moeda :</span><span class=\"value\">BRL </span><b class=\"caret\"></b></a>
                                <ul class=\"dropdown-menu\">
                                    <li><a href=\"#\">BRL</a></li>
                                    <li><a href=\"#\">USD</a></li>
                                </ul>
                            </li>

                            <li class=\"dropdown dropdown-small\">
                                <a data-toggle=\"dropdown\" data-hover=\"dropdown\" class=\"dropdown-toggle\" href=\"#\"><span class=\"key\">linguagem :</span><span class=\"value\">Português </span><b class=\"caret\"></b></a>
                                <ul class=\"dropdown-menu\">
                                    <li><a href=\"#\">Português</a></li>
                                    <li><a href=\"#\">Inglês</a></li>
                                    <li><a href=\"#\">Espanhol</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    <div class=\"site-branding-area\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-sm-6\">
                    <div class=\"logo\">
                        <h1><a href=\"#\"><img src=\"/res/site/img/logo.png\"></a></h1>
                    </div>
                </div>
                
                <div class=\"col-sm-6\">
                    <div class=\"shopping-item\">
                        <a href=\"carrinho.html\">Carrinho - <span class=\"cart-amunt\">R\$100</span> <i class=\"fa fa-shopping-cart\"></i> <span class=\"product-count\">5</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class=\"mainmenu-area\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"navbar-header\">
                    <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
                        <span class=\"sr-only\">Toggle navigation</span>
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                    </button>
                </div> 
                <div class=\"navbar-collapse collapse\">
                    <ul class=\"nav navbar-nav\">
                        <li class=\"active\"><a href=\"/\">Home</a></li>
                        <li><a href=\"#\">Produtos</a></li>
                        <li><a href=\"/cart\">Carrinho</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
";
    }

    public function getTemplateName()
    {
        return "header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 22,  83 => 21,  76 => 18,  74 => 17,  63 => 8,  59 => 7,  53 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "header.html.twig", "/var/www/views/site/header.html.twig");
    }
}
