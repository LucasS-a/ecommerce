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
class __TwigTemplate_47818bb36edf4498b94faa0dd08a747f423d8cd22aaeb32d6a843d931bd21154 extends Template
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
                            <img src=\"/res/site/img/product-2.jpg\" alt=\"\">
                        </div>
                        <h2><a href=\"\">Apple new mac book 2015 March :P</a></h2>
                        <div class=\"product-carousel-price\">
                            <ins>\$899.00</ins> <del>\$999.00</del>
                        </div>  
                        
                        <div class=\"product-option-shop\">
                            <a class=\"add_to_cart_button\" data-quantity=\"1\" data-product_sku=\"\" data-product_id=\"70\" rel=\"nofollow\" href=\"/canvas/shop/?add-to-cart=70\">Add to cart</a>
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
                        <li><a href=\"#\">1</a></li>
                        <li><a href=\"#\">2</a></li>
                        <li><a href=\"#\">3</a></li>
                        <li><a href=\"#\">4</a></li>
                        <li><a href=\"#\">5</a></li>
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
        return array (  83 => 34,  62 => 18,  58 => 17,  44 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "category.html.twig", "/var/www/views/site/category.html.twig");
    }
}
