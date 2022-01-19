<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\RequestInterface as Response;
use Hcode\Page;

$app->get('/', 
    function($request, $response, $arg){
        $page = new Page();

        $page->setTpl('index.html.twig');
    }
);

?>