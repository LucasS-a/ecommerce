<?php

namespace Hcode;

/**
 * PageAdmin
 * Essa classe rederiza os templates das páginas do usuários administrativo.
 * 
 * @coppyright (c) 2021, Lucas S. de Araujo. 
 */
class PageAdmin extends Page{

    public function __construct($opts = array(), $tpl_dir = '/views/admin')
    {
        $this->defaults['data']['tpl_dir'] = $tpl_dir;

        parent::__construct($opts, $tpl_dir);
    }
    
}

?>