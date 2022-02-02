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

/* product-detail.html.twig */
class __TwigTemplate_1db57fdeb4e439ee7346d5ceccea897ac8caeeb0b7acd46b474bd896a7cffa0d extends Template
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
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "desproduct", [], "any", false, false, false, 6), "html", null, true);
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
            <div class=\"col-md-12\">
                <div class=\"product-content-right\">
                    <div class=\"product-breadcroumb\">
                        <a href=\"/\">Home</a>
                        <a href=\"\">";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "desproduct", [], "any", false, false, false, 20), "html", null, true);
        echo "</a>
                    </div>
                    
                    <div class=\"row\">
                        <div class=\"col-sm-6\">
                            <div class=\"product-images\">
                                <div class=\"product-main-img\">
                                    <img src=\"";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "desphoto", [], "any", false, false, false, 27), "html", null, true);
        echo "\">
                                </div>
                            </div>
                        </div>
                        
                        <div class=\"col-sm-6\">
                            <div class=\"product-inner\">
                                <h2 class=\"product-name\">";
        // line 34
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "desproduct", [], "any", false, false, false, 34), "html", null, true);
        echo "</h2>
                                <div class=\"product-inner-price\">
                                    <ins>R\$ ";
        // line 36
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "vlprice", [], "any", false, false, false, 36), 2, ",", "."), "html", null, true);
        echo "</ins>
                                </div>    
                                
                                <form action=\"\" class=\"cart\">
                                    <div class=\"quantity\">
                                        <input type=\"number\" size=\"4\" class=\"input-text qty text\" title=\"Qty\" value=\"1\" name=\"quantity\" min=\"1\" step=\"1\">
                                    </div>
                                    <button class=\"add_to_cart_button\" type=\"submit\">Comprar</button>
                                </form>   
                                
                                <div class=\"product-inner-category\">
                                    <p>Categorias:";
        // line 47
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            echo "<a href=\"/categories/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "idcategory", [], "any", false, false, false, 47), "html", null, true);
            echo "\"> ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "descategory", [], "any", false, false, false, 47), "html", null, true);
            echo "</a>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo ".
                                </div> 
                                
                                <div role=\"tabpanel\">
                                    <ul class=\"product-tab\" role=\"tablist\">
                                        <li role=\"presentation\" class=\"active\"><a href=\"#home\" aria-controls=\"home\" role=\"tab\" data-toggle=\"tab\">Descrição</a></li>
                                        <li role=\"presentation\"><a href=\"#profile\" aria-controls=\"profile\" role=\"tab\" data-toggle=\"tab\">Avaliações</a></li>
                                    </ul>
                                    <div class=\"tab-content\">
                                        <div role=\"tabpanel\" class=\"tab-pane fade in active\" id=\"home\">
                                            <h2>Descrição do Produto</h2>  
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla. Quisque volutpat nulla risus, id maximus ex aliquet ut. Suspendisse potenti. Nulla varius lectus id turpis dignissim porta. Quisque magna arcu, blandit quis felis vehicula, feugiat gravida diam. Nullam nec turpis ligula. Aliquam quis blandit elit, ac sodales nisl. Aliquam eget dolor eget elit malesuada aliquet. In varius lorem lorem, semper bibendum lectus lobortis ac.</p>

                                            <p>Mauris placerat vitae lorem gravida viverra. Mauris in fringilla ex. Nulla facilisi. Etiam scelerisque tincidunt quam facilisis lobortis. In malesuada pulvinar neque a consectetur. Nunc aliquam gravida purus, non malesuada sem accumsan in. Morbi vel sodales libero.</p>
                                        </div>
                                        <div role=\"tabpanel\" class=\"tab-pane fade\" id=\"profile\">
                                            <h2>Reviews</h2>
                                            <div class=\"submit-review\">
                                                <p><label for=\"name\">Name</label> <input name=\"name\" type=\"text\"></p>
                                                <p><label for=\"email\">Email</label> <input name=\"email\" type=\"email\"></p>
                                                <div class=\"rating-chooser\">
                                                    <p>Your rating</p>

                                                    <div class=\"rating-wrap-post\">
                                                        <i class=\"fa fa-star\"></i>
                                                        <i class=\"fa fa-star\"></i>
                                                        <i class=\"fa fa-star\"></i>
                                                        <i class=\"fa fa-star\"></i>
                                                        <i class=\"fa fa-star\"></i>
                                                    </div>
                                                </div>
                                                <p><label for=\"review\">Your review</label> <textarea name=\"review\" id=\"\" cols=\"30\" rows=\"10\"></textarea></p>
                                                <p><input type=\"submit\" value=\"Submit\"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>                    
            </div>
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "product-detail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 47,  86 => 36,  81 => 34,  71 => 27,  61 => 20,  44 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "product-detail.html.twig", "/var/www/views/site/product-detail.html.twig");
    }
}
