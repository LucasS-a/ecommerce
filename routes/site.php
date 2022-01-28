<?php

use Hcode\Model\Category;
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

$app->get('/categories/{idcategory}',
    function($request, $response, $args){

        $category = new Category();

        $category->get((int)$args['idcategory']);

        $page = new Page();

        $page->setTpl('category.html.twig',[
            'category' => $category->getValues(),
            'products' => Product::checkList($category->getProducts(TRUE))
        ]);
    }
);

?>