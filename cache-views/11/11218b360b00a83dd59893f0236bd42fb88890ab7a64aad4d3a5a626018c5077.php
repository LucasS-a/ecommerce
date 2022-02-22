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

/* index.html.twig */
class __TwigTemplate_aa261edec9f765703367ba1eb0e881449082cd0190d923f8a529cb86d5ba65b6 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
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
        $this->parent = $this->loadTemplate("base.html", "index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    Hcode Store
";
    }

    // line 6
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " 
    ";
        // line 7
        $this->displayParentBlock("head", $context, $blocks);
        echo "
";
    }

    // line 10
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 11
        echo "    <div class=\"slider-area\">
        \t<!-- Slider -->
\t\t\t<div class=\"block-slider block-slider4\">
\t\t\t\t<ul class=\"\" id=\"bxslider-home4\">
\t\t\t\t\t<li>
\t\t\t\t\t\t<img src=\"/res/site/img/h4-slide.png\" alt=\"Slide\">
\t\t\t\t\t\t<div class=\"caption-group\">
\t\t\t\t\t\t\t<h2 class=\"caption title\">
\t\t\t\t\t\t\t\tiPhone <span class=\"primary\">6 <strong>Plus</strong></span>
\t\t\t\t\t\t\t</h2>
\t\t\t\t\t\t\t<h4 class=\"caption subtitle\">Dual SIM</h4>
\t\t\t\t\t\t\t<a class=\"caption button-radius\" href=\"#\"><span class=\"icon\"></span>Comprar</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</li>
\t\t\t\t\t<li><img src=\"/res/site/img/h4-slide2.png\" alt=\"Slide\">
\t\t\t\t\t\t<div class=\"caption-group\">
\t\t\t\t\t\t\t<h2 class=\"caption title\">
\t\t\t\t\t\t\t\tby one, get one <span class=\"primary\">50% <strong>off</strong></span>
\t\t\t\t\t\t\t</h2>
\t\t\t\t\t\t\t<h4 class=\"caption subtitle\">school supplies & backpacks.*</h4>
\t\t\t\t\t\t\t<a class=\"caption button-radius\" href=\"#\"><span class=\"icon\"></span>Comprar</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</li>
\t\t\t\t\t<li><img src=\"/res/site/img/h4-slide3.png\" alt=\"Slide\">
\t\t\t\t\t\t<div class=\"caption-group\">
\t\t\t\t\t\t\t<h2 class=\"caption title\">
\t\t\t\t\t\t\t\tApple <span class=\"primary\">Store <strong>Ipod</strong></span>
\t\t\t\t\t\t\t</h2>
\t\t\t\t\t\t\t<h4 class=\"caption subtitle\">Select Item</h4>
\t\t\t\t\t\t\t<a class=\"caption button-radius\" href=\"#\"><span class=\"icon\"></span>Comprar</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</li>
\t\t\t\t\t<li><img src=\"/res/site/img/h4-slide4.png\" alt=\"Slide\">
\t\t\t\t\t\t<div class=\"caption-group\">
\t\t\t\t\t\t  <h2 class=\"caption title\">
\t\t\t\t\t\t\t\tApple <span class=\"primary\">Store <strong>Ipod</strong></span>
\t\t\t\t\t\t\t</h2>
\t\t\t\t\t\t\t<h4 class=\"caption subtitle\">& Phone</h4>
\t\t\t\t\t\t\t<a class=\"caption button-radius\" href=\"#\"><span class=\"icon\"></span>Comprar</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t\t<!-- ./Slider -->
    </div> <!-- End slider area -->
    
    <div class=\"promo-area\">
        <div class=\"zigzag-bottom\"></div>
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-md-3 col-sm-6\">
                    <div class=\"single-promo promo1\">
                        <i class=\"fa fa-refresh\"></i>
                        <p>1 ano de garantia</p>
                    </div>
                </div>
                <div class=\"col-md-3 col-sm-6\">
                    <div class=\"single-promo promo2\">
                        <i class=\"fa fa-truck\"></i>
                        <p>Frete grátis</p>
                    </div>
                </div>
                <div class=\"col-md-3 col-sm-6\">
                    <div class=\"single-promo promo3\">
                        <i class=\"fa fa-lock\"></i>
                        <p>Pagamento seguro</p>
                    </div>
                </div>
                <div class=\"col-md-3 col-sm-6\">
                    <div class=\"single-promo promo4\">
                        <i class=\"fa fa-gift\"></i>
                        <p>Novos produtos</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->
    
    <div class=\"maincontent-area\">
        <div class=\"zigzag-bottom\"></div>
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-md-12\">
                    <div class=\"latest-product\">
                        <h2 class=\"section-title\">Produtos</h2>
                        <div class=\"product-carousel\">
                            ";
        // line 97
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 98
            echo "                                <div class=\"single-product\">
                                    <div class=\"product-f-image\">
                                        <img src=";
            // line 100
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "desphoto", [], "any", false, false, false, 100), "html", null, true);
            echo " alt=\"\">
                                        <div class=\"product-hover\">
                                            <a href=\"/cart/";
            // line 102
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "idproduct", [], "any", false, false, false, 102), "html", null, true);
            echo "/add\" class=\"add-to-cart-link\"><i class=\"fa fa-shopping-cart\"></i>Comprar</a>
                                            <a href=\"/products/";
            // line 103
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "desurl", [], "any", false, false, false, 103), "html", null, true);
            echo "\" class=\"view-details-link\"><i class=\"fa fa-link\"></i>Detalhes</a>
                                        </div>
                                    </div>
                                    
                                    <h2><a href=\"/products/";
            // line 107
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "desurl", [], "any", false, false, false, 107), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "desproduct", [], "any", false, false, false, 107), "html", null, true);
            echo "</a></h2>
                                    
                                    <div class=\"product-carousel-price\">
                                        <ins>R\$ ";
            // line 110
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "vlprice", [], "any", false, false, false, 110), 2, ",", "."), "html", null, true);
            echo "</ins>
                                    </div> 
                                </div>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 114
        echo "                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->
    
    <div class=\"brands-area\">
        <div class=\"zigzag-bottom\"></div>
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-md-12\">
                    <div class=\"brand-wrapper\">
                        <div class=\"brand-list\">
                            <img src=\"/res/site/img/brand1.png\" alt=\"\">
                            <img src=\"/res/site/img/brand2.png\" alt=\"\">
                            <img src=\"/res/site/img/brand3.png\" alt=\"\">
                            <img src=\"/res/site/img/brand4.png\" alt=\"\">
                            <img src=\"/res/site/img/brand5.png\" alt=\"\">
                            <img src=\"/res/site/img/brand6.png\" alt=\"\">
                            <img src=\"/res/site/img/brand1.png\" alt=\"\">
                            <img src=\"/res/site/img/brand2.png\" alt=\"\">                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->
";
    }

    public function getTemplateName()
    {
        return "index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  203 => 114,  193 => 110,  185 => 107,  178 => 103,  174 => 102,  169 => 100,  165 => 98,  161 => 97,  73 => 11,  69 => 10,  63 => 7,  57 => 6,  52 => 4,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "index.html.twig", "/var/www/views/site/index.html.twig");
    }
}
