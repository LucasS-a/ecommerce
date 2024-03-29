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
class __TwigTemplate_0ce5697690b2c49f16c8ac038640a3d0d2686421b1348b9274228254f32e821e extends Template
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
        echo "    <div class=\"site-branding-area\">
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
                        <li class=\"active\"><a href=\"#\">Home</a></li>
                        <li><a href=\"#\">Produtos</a></li>
                        <li><a href=\"#\">Carrinho</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    
    <div class=\"slider-area\">
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
                            <div class=\"single-product\">
                                <div class=\"product-f-image\">
                                    <img src=\"/res/site/img/product-1.jpg\" alt=\"\">
                                    <div class=\"product-hover\">
                                        <a href=\"#\" class=\"add-to-cart-link\"><i class=\"fa fa-shopping-cart\"></i> Add to cart</a>
                                        <a href=\"#\" class=\"view-details-link\"><i class=\"fa fa-link\"></i> See details</a>
                                    </div>
                                </div>
                                
                                <h2><a href=\"#\">Samsung Galaxy s5- 2015</a></h2>
                                
                                <div class=\"product-carousel-price\">
                                    <ins>\$700.00</ins> <del>\$100.00</del>
                                </div> 
                            </div>
                            <div class=\"single-product\">
                                <div class=\"product-f-image\">
                                    <img src=\"/res/site/img/product-2.jpg\" alt=\"\">
                                    <div class=\"product-hover\">
                                        <a href=\"#\" class=\"add-to-cart-link\"><i class=\"fa fa-shopping-cart\"></i> Add to cart</a>
                                        <a href=\"#\" class=\"view-details-link\"><i class=\"fa fa-link\"></i> See details</a>
                                    </div>
                                </div>
                                
                                <h2>Nokia Lumia 1320</h2>
                                <div class=\"product-carousel-price\">
                                    <ins>\$899.00</ins> <del>\$999.00</del>
                                </div> 
                            </div>
                            <div class=\"single-product\">
                                <div class=\"product-f-image\">
                                    <img src=\"/res/site/img/product-3.jpg\" alt=\"\">
                                    <div class=\"product-hover\">
                                        <a href=\"#\" class=\"add-to-cart-link\"><i class=\"fa fa-shopping-cart\"></i> Add to cart</a>
                                        <a href=\"#\" class=\"view-details-link\"><i class=\"fa fa-link\"></i> See details</a>
                                    </div>
                                </div>
                                
                                <h2>LG Leon 2015</h2>

                                <div class=\"product-carousel-price\">
                                    <ins>\$400.00</ins> <del>\$425.00</del>
                                </div>                                 
                            </div>
                            <div class=\"single-product\">
                                <div class=\"product-f-image\">
                                    <img src=\"/res/site/img/product-4.jpg\" alt=\"\">
                                    <div class=\"product-hover\">
                                        <a href=\"#\" class=\"add-to-cart-link\"><i class=\"fa fa-shopping-cart\"></i> Add to cart</a>
                                        <a href=\"#\" class=\"view-details-link\"><i class=\"fa fa-link\"></i> See details</a>
                                    </div>
                                </div>
                                
                                <h2><a href=\"#\">Sony microsoft</a></h2>

                                <div class=\"product-carousel-price\">
                                    <ins>\$200.00</ins> <del>\$225.00</del>
                                </div>                            
                            </div>
                            <div class=\"single-product\">
                                <div class=\"product-f-image\">
                                    <img src=\"/res/site/img/product-5.jpg\" alt=\"\">
                                    <div class=\"product-hover\">
                                        <a href=\"#\" class=\"add-to-cart-link\"><i class=\"fa fa-shopping-cart\"></i> Add to cart</a>
                                        <a href=\"#\" class=\"view-details-link\"><i class=\"fa fa-link\"></i> See details</a>
                                    </div>
                                </div>
                                
                                <h2>iPhone 6</h2>

                                <div class=\"product-carousel-price\">
                                    <ins>\$1200.00</ins> <del>\$1355.00</del>
                                </div>                                 
                            </div>
                            <div class=\"single-product\">
                                <div class=\"product-f-image\">
                                    <img src=\"/res/site/img/product-6.jpg\" alt=\"\">
                                    <div class=\"product-hover\">
                                        <a href=\"#\" class=\"add-to-cart-link\"><i class=\"fa fa-shopping-cart\"></i> Add to cart</a>
                                        <a href=\"#\" class=\"view-details-link\"><i class=\"fa fa-link\"></i> See details</a>
                                    </div>
                                </div>
                                
                                <h2><a href=\"#\">Samsung gallaxy note 4</a></h2>

                                <div class=\"product-carousel-price\">
                                    <ins>\$400.00</ins>
                                </div>                            
                            </div>
                        </div>
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
        return array (  73 => 11,  69 => 10,  63 => 7,  57 => 6,  52 => 4,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "index.html.twig", "/var/www/views/site/index.html.twig");
    }
}
