<?php

use Hcode\Model\Product;
use Hcode\Page;

$app->get('/', 
    function($request, $response, $arg)
    {
        $page = new Page();

        $products = Product::listAll();

        $products = Product::checkList($products);

        $page->setTpl('index.html.twig',[
            'products' => $products
        ]);
    }
);

?>