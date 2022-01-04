<?php

namespace Hcode;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Page
{
    private $twig,
            $template,
            $options = array(),
            $defauts = array(
                'header' => true,
                'footer' => true,
                'data' => []
            );

    public function __construct($opts = array(), $tpl_dir = '/views/site')
    {
        $this->options = array_merge($this->defauts, $opts);

        $config = array(
            'cache' => $_SERVER['DOCUMENT_ROOT'].'/cache-views',
            'debub' => true,
            'auto_reload' => true
        );

        $loader = new FilesystemLoader([
            $_SERVER['DOCUMENT_ROOT'] . $tpl_dir,
            $_SERVER['DOCUMENT_ROOT'] . $tpl_dir . '/layouts'
        ]);

        $this->twig = new Environment($loader, $config);

        $this->template = $this->twig->load('header.html.twig');
        
        $this->template->render($this->options['data']);

        if( $this->options['header'] === true) $this->template->display();
    }

    public function setTpl($name, $data = array(), $returnHTML = false)
    {
        $this->template = $this->twig->load($name);

        echo $this->template->render($data);
    }

    public function __destruct()
    {

        $this->template = $this->twig->load('footer.html.twig');

        $this->template->render($this->options['data']);
        
        if( $this->options['footer'] === true) $this->template->display();
    }
}

?>