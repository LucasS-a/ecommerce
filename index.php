<?php

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Hcode\Page;

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

$app->run();

?>