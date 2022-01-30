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

/* category.html.twig */
class __TwigTemplate_5bfd6042f11433a399a2430529a55ed42d95d67de10a654400291562ee8c729c extends Template
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
        echo "<div class=\"product-big-title-area\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"product-bit-title text-center\">
                    <h2>";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["category"] ?? null), "descategory", [], "any", false, false, false, 6), "html", null, true);
        echo "</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class=\"single-product-area\">
    <div class=\"zigzag-bottom\"></div>
    <div class=\"container\">
        <div class=\"row\">
            ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 18
            echo "                <div class=\"col-md-3 col-sm-6\">
                    <div class=\"single-shop-product\">
                        <div class=\"product-upper\">
                            <img src=\"";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "desphoto", [], "any", false, false, false, 21), "html", null, true);
            echo "\" alt=\"\">
                        </div>
                        <h2><a href=\"/products/";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "desurl", [], "any", false, false, false, 23), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "desproduct", [], "any", false, false, false, 23), "html", null, true);
            echo "</a></h2>
                        <div class=\"product-carousel-price\">
                            <ins>R\$ ";
            // line 25
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "vlprice", [], "any", false, false, false, 25), 2, ",", "."), "html", null, true);
            echo "</ins>
                        </div>  
                        
                        <div class=\"product-option-shop\">
                            <a class=\"add_to_cart_button\" data-quantity=\"1\" data-product_sku=\"\" data-product_id=\"70\" rel=\"nofollow\" href=\"/canvas/shop/?add-to-cart=70\">Comprar</a>
                        </div>                       
                    </div>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "        </div>
        
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"product-pagination text-center\">
                    <nav>
                        <ul class=\"pagination\">
                        <li>
                            <a href=\"#\" aria-label=\"Previous\">
                            <span aria-hidden=\"true\">«</span>
                            </a>
                        </li>
                        <li>
                            ";
        // line 47
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["pages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
            // line 48
            echo "                                <li><a href= \"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["page"], "link", [], "any", false, false, false, 48), "html", null, true);
            echo "\" >";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["page"], "number", [], "any", false, false, false, 48), "html", null, true);
            echo "</a></li>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "                        </li>
                        <li>
                            <a href=\"#\" aria-label=\"Next\">
                            <span aria-hidden=\"true\">»</span>
                            </a>
                        </li>
                        </ul>
                    </nav>                        
                </div>
            </div>
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "category.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 50,  113 => 48,  109 => 47,  94 => 34,  79 => 25,  72 => 23,  67 => 21,  62 => 18,  58 => 17,  44 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "category.html.twig", "/var/www/views/site/category.html.twig");
    }
}
