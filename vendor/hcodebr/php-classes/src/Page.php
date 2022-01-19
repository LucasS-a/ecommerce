<?php

namespace Hcode;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

/**
 * Page
 * 
 * Essa classe rederiza os templates das páginas. 
 */
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
    
    /**
     * __construct
     * Configura onde estão os diretórios dos htmls, e rederiza o cabreçalho.
     * 
     * @param  array $opts
     * @param  string $tpl_dir
     * @return void
     */
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
        if ($tpl_dir === '/views/admin'){
            $loader->addPath($_SERVER['DOCUMENT_ROOT'] . $tpl_dir . '/crud');
            $loader->addPath($_SERVER['DOCUMENT_ROOT'] . $tpl_dir . '/forgot');
            $loader->addPath($_SERVER['DOCUMENT_ROOT'] . $tpl_dir . '/category');
        }

        $this->twig = new Environment($loader, $config);

        $this->template = $this->twig->load('header.html.twig');
        
        $this->template->render($this->options['data']);

        if( $this->options['header'] === true) $this->template->display();
    }
    
    /**
     * setTpl
     * Rederiza o template do corpo da página. 
     * 
     * @param  string $name
     * @param  array $data
     * @return void
     */
    public function setTpl($name, $data = array())
    {
        $this->template = $this->twig->load($name);

        echo $this->template->render($data);
    }
        
    /**
     * __destruct
     * Esse método também rederiza o footer da página. 
     * 
     * @return void
     */
    public function __destruct()
    {

        $this->template = $this->twig->load('footer.html.twig');

        $this->template->render($this->options['data']);
        
        if( $this->options['footer'] === true) $this->template->display();
    }
}

?>