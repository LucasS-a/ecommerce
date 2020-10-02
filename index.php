<?php

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Hcode\Page;
use \Hcode\PageAdmin;

$app = new Slim();

$app->config('debug', true);

$app->get('/', 
    function()
    {
        // cria o objeto e já adicion o header
        $page = new Page();
        
        // adicona o corpo do html
        $page->setTpl("index");
    }
);

$app->get('/admin', 
    function()
    {
        // cria o objeto e já adicion o header
        $page = new PageAdmin();
        
        // adicona o corpo do html
        $page->setTpl("index");
    }
);

$app->run();

?>