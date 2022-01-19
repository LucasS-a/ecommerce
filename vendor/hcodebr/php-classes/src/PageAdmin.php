<?php

namespace Hcode;

/**
 * PageAdmin
 * 
 * Essa classe rederiza os templates das páginas do usuários sem acesso administrativo. 
 */
class PageAdmin extends Page{
    public function __construct($opts = array(), $tpl_dir = '/views/admin')
    {
        parent::__construct($opts, $tpl_dir);
    }
}

?>