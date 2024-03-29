<?php

namespace Hcode;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use FunctionHcode\Functions;

/**
 * Page
 * 
 * Essa classe rederiza os templates das páginas.
 * 
 * @copyright (c) 2022, Lucas S. de Araujo. 
 */
class Page
{
    private $twig,
            $template,
            $loader,
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

        $this->loader = new FilesystemLoader([
            $_SERVER['DOCUMENT_ROOT'] . $tpl_dir,
            $_SERVER['DOCUMENT_ROOT'] . $tpl_dir . '/layouts'
        ]);

        $this->twig = new Environment($this->loader, $config);

        foreach (Functions::getFunctions() as $key => $value) {
            $this->twig->addFunction($value);
        }

        $template = $this->twig->load('header.html.twig');
        
        $template->render($this->options['data']);

        if( $this->options['header'] === true) $template->display();
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
        $aux = is_bool(strpos($name, "-")) ? strpos($name, ".") : strpos($name, "-");

        $folder = substr($name, 0, $aux);

        if(($folder !== 'index') && ($folder !== 'login'))
        {
            $tpl_dir = isset($this->defaults['data']['tpl_dir']) ? $this->defaults['data']['tpl_dir'] : '/views/site';
            
            $this->loader->addPath($_SERVER['DOCUMENT_ROOT']. $tpl_dir .'/' . $folder);

            $twig = new Environment($this->loader);
            
            $template = $twig->load($name);

            echo $template->render($data);
            
        }else{

            $template = $this->twig->load($name);

            echo $template->render($data);
        }

    }
        
    /**
     * __destruct
     * Esse método também rederiza o footer da página. 
     * 
     * @return void
     */
    public function __destruct()
    {

        $template = $this->twig->load('footer.html.twig');

        $template->render($this->options['data']);
        
        if( $this->options['footer'] === true) $template->display();
    }
}

?>