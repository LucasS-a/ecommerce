<?php

namespace Hcode;

use Rain\Tpl;

class Page
{
    private $tpl;
    private $options = [];
    private $defaults = [
        "data" => []
    ];

    public  function __construct($opts = array(), $tpl_dir = "/views/")
    {
        // mescla os dois arrays dando preferência o parametro passado
        $this->options = array_merge($this->defaults, $opts);

        // as configurações dos caminhos
        $config = array(
            "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"].$tpl_dir,
            "cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
            "debug"         => false
        );

        Tpl::configure( $config );
        
        //cria um objeto do tipo Tpl
        $this->tpl = new Tpl;
        
        // Atribui as variáveis
        $this->setData($this->options["data"]);

        // desenha o template
        $this->tpl->draw("header");


    }

    private function setData($data = array())
    {
        // Atribui as variáveis passadas no array $options
        foreach ($data as $key => $value)
        {
            $this->tpl->assign($key, $value);
        }
    }

    public function setTpl($name, $data = array(), $returnHTML = false)
    {
        $this->setData($data);

        return $this->tpl->draw($name, $returnHTML);

    }

    public function __destruct()
    {
        $this->tpl->draw("footer");
    }
}

?>