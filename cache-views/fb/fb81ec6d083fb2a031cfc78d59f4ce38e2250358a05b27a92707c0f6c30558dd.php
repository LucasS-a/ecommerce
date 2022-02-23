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

/* login.html.twig */
class __TwigTemplate_08c12382783ecc08c371c4ffbf1a8f8ad3cb4adadc4ce83a3a3b95b4336ce49e extends Template
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
        echo " 
<div class=\"product-big-title-area\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"product-bit-title text-center\">
                    <h2>Autenticação</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class=\"single-product-area\">
    <div class=\"zigzag-bottom\"></div>
    <div class=\"container\">
        <div class=\"row\">                
            <div class=\"col-md-6\">

                ";
        // line 20
        if ((0 !== twig_compare(($context["error"] ?? null), ""))) {
            // line 21
            echo "                    <div class=\"alert alert-danger\">
                        ";
            // line 22
            echo twig_escape_filter($this->env, ($context["error"] ?? null), "html", null, true);
            echo "
                    </div>
                ";
        }
        // line 25
        echo "                

                <form action=\"/login\" id=\"login-form-wrap\" class=\"login\" method=\"post\">
                    <h2>Acessar</h2>
                    <p class=\"form-row form-row-first\">
                        <label for=\"login\">E-mail <span class=\"required\">*</span>
                        </label>
                        <input type=\"text\" id=\"login\" name=\"login\" class=\"input-text\">
                    </p>
                    <p class=\"form-row form-row-last\">
                        <label for=\"senha\">Senha <span class=\"required\">*</span>
                        </label>
                        <input type=\"password\" id=\"senha\" name=\"password\" class=\"input-text\">
                    </p>
                    <div class=\"clear\"></div>
                    <p class=\"form-row\">
                        <input type=\"submit\" value=\"Login\" class=\"button\">
                        <label class=\"inline\" for=\"rememberme\"><input type=\"checkbox\" value=\"forever\" id=\"rememberme\" name=\"rememberme\"> Manter conectado </label>
                    </p>
                    <p class=\"lost_password\">
                        <a href=\"/forgot\">Esqueceu a senha?</a>
                    </p>

                    <div class=\"clear\"></div>
                </form>                    
            </div>
            <div class=\"col-md-6\">
                
                ";
        // line 53
        if ((0 !== twig_compare(($context["register_error"] ?? null), ""))) {
            // line 54
            echo "                    <div class=\"alert alert-danger\">
                    ";
            // line 55
            echo twig_escape_filter($this->env, ($context["register_error"] ?? null), "html", null, true);
            echo "
                    </div>
                ";
        }
        // line 58
        echo "                

                <form id=\"register-form-wrap\" action=\"/register\" class=\"register\" method=\"post\">
                    <h2>Criar conta</h2>
                    <p class=\"form-row form-row-first\">
                        <label for=\"nome\">Nome Completo <span class=\"required\">*</span>
                        </label>
                        <input type=\"text\" id=\"nome\" name=\"name\" class=\"input-text\" value=\"";
        // line 65
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["registerValues"] ?? null), "name", [], "any", false, false, false, 65), "html", null, true);
        echo "\">
                    </p>
                    <p class=\"form-row form-row-first\">
                        <label for=\"email\">E-mail <span class=\"required\">*</span>
                        </label>
                        <input type=\"email\" id=\"email\" name=\"email\" class=\"input-text\" value=\"";
        // line 70
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["registerValues"] ?? null), "email", [], "any", false, false, false, 70), "html", null, true);
        echo "\">
                    </p>
                    <p class=\"form-row form-row-first\">
                        <label for=\"phone\">Telefone
                        </label>
                        <input type=\"text\" id=\"phone\" name=\"phone\" class=\"input-text\" value=\"";
        // line 75
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["registerValues"] ?? null), "phone", [], "any", false, false, false, 75), "html", null, true);
        echo "\">
                    </p>
                    <p class=\"form-row form-row-last\">
                        <label for=\"senha\">Senha <span class=\"required\">*</span>
                        </label>
                        <input type=\"password\" id=\"senha\" name=\"password\" class=\"input-text\">
                    </p>
                    <div class=\"clear\"></div>

                    <p class=\"form-row\">
                        <input type=\"submit\" value=\"Criar Conta\" name=\"login\" class=\"button\">
                    </p>

                    <div class=\"clear\"></div>
                </form>               
            </div>
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  135 => 75,  127 => 70,  119 => 65,  110 => 58,  104 => 55,  101 => 54,  99 => 53,  69 => 25,  63 => 22,  60 => 21,  58 => 20,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "login.html.twig", "/var/www/views/site/login.html.twig");
    }
}
