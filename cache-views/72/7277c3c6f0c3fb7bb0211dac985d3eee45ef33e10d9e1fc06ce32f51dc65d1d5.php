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

/* footer.html.twig */
class __TwigTemplate_26a3744a6ca43beb7e20ebf091cedfa8472ef57e05953812aa7a2bc402d7ac86 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'head' => [$this, 'block_head'],
            'footer' => [$this, 'block_footer'],
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
        $this->parent = $this->loadTemplate("base.html", "footer.html.twig", 1);
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
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "        <div class=\"footer-top-area\">
        <div class=\"zigzag-bottom\"></div>
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-md-3 col-sm-6\">
                    <div class=\"footer-about-us\">
                        <h2>Hcode Store</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                        <div class=\"footer-social\">
                            <a href=\"https://www.facebook.com/hcodebr\" target=\"_blank\"><i class=\"fa fa-facebook\"></i></a>
                            <a href=\"https://twitter.com/hcodebr\" target=\"_blank\"><i class=\"fa fa-twitter\"></i></a>
                            <a href=\"https://www.youtube.com/channel/UCjWENuSH2gX55-y7QSZiWxA\" target=\"_blank\"><i class=\"fa fa-youtube\"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class=\"col-md-3 col-sm-6\">
                    <div class=\"footer-menu\">
                        <h2 class=\"footer-wid-title\">Navegação </h2>
                        <ul>
                            <li><a href=\"#\">Minha Conta</a></li>
                            <li><a href=\"#\">Meus Pedidos</a></li>
                            <li><a href=\"#\">Lista de Desejos</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class=\"col-md-3 col-sm-6\">
                    <div class=\"footer-menu\">
                        <h2 class=\"footer-wid-title\">Categorias</h2>
                        <ul>
                            <li><a href=\"#\">Categoria Um</a></li>
                            <li><a href=\"#\">Categoria Dois</a></li>
                            <li><a href=\"#\">Categoria Três</a></li>
                            <li><a href=\"#\">Categoria Quarto</a></li>
                            <li><a href=\"#\">Categoria Cinco</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class=\"col-md-3 col-sm-6\">
                    <div class=\"footer-newsletter\">
                        <h2 class=\"footer-wid-title\">Newsletter</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus!</p>
                        <div class=\"newsletter-form\">
                            <form action=\"#\">
                                <input type=\"email\" placeholder=\"Type your email\">
                                <input type=\"submit\" value=\"Subscribe\">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->
    
    <div class=\"footer-bottom-area\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-md-8\">
                    <div class=\"copyright\">
                        <p>&copy; 2017 Hcode Treinamentos. <a href=\"http://www.hcode.com.br\" target=\"_blank\">hcode.com.br</a></p>
                    </div>
                </div>
                
                <div class=\"col-md-4\">
                    <div class=\"footer-card-icon\">
                        <i class=\"fa fa-cc-discover\"></i>
                        <i class=\"fa fa-cc-mastercard\"></i>
                        <i class=\"fa fa-cc-paypal\"></i>
                        <i class=\"fa fa-cc-visa\"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->
   
    <!-- Latest jQuery form server -->
    <script src=\"https://code.jquery.com/jquery.min.js\"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js\"></script>
    
    <!-- jQuery sticky menu -->
    <script src=\"/res/site/js/owl.carousel.min.js\"></script>
    <script src=\"/res/site/js/jquery.sticky.js\"></script>
    
    <!-- jQuery easing -->
    <script src=\"/res/site/js/jquery.easing.1.3.min.js\"></script>
    
    <!-- Main Script -->
    <script src=\"/res/site/js/main.js\"></script>
    
    <!-- Slider -->
    <script type=\"text/javascript\" src=\"/res/site/js/bxslider.min.js\"></script>
\t<script type=\"text/javascript\" src=\"/res/site/js/script.slider.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "footer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 8,  59 => 7,  53 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "footer.html.twig", "/var/www/views/site/footer.html.twig");
    }
}
