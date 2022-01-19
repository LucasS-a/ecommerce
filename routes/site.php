<?php

use Hcode\Page;

$app->get('/', 
    function($request, $response, $arg){
        $page = new Page();

        $page->setTpl('index.html.twig');
    }
);

?>