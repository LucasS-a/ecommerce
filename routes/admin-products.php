<?php

use Hcode\Model\Product;
use Hcode\PageAdmin;
use Hcode\Model\User;

$app->get('/admin/products',
    function()
    {
        User::verifyLogin();

        $products = Product::listAll();

        $page = new PageAdmin();

        $page->setTpl('products.html.twig', [
            'products' => $products
        ]);
    }
);

$app->get('/admin/products/create',
    function()
    {
        User::verifyLogin();

        $page = new PageAdmin();

        $page->setTpl('products-create.html');
    }
);

$app->post('/admin/products/create',
    function()
    {
        User::verifyLogin();

        $product = new Product;

        $product->setValues($_POST);

        $product->save();

        header('location: /admin/products');

        exit;
    }
);

$app->get('/admin/products/{idproduct}/delete',
    function($req, $res, $args)
    {
        User::verifyLogin();

        $product = new Product;

        $product->get((int)$args['idproduct']);

        $product->delete();

        header('location: /admin/products');
        exit;
    }
);

$app->get('/admin/products/{idproduct}',
    function($req, $res, $args)
    {
        User::verifyLogin();

        $product = new Product;

        $product->get((int)$args['idproduct']);

        $page = new PageAdmin();

        $page->setTpl('products-update.html.twig',[
            'product' => $product->getValues()
        ]);
    }
);

$app->post('/admin/products/{idproduct}',
    function($req, $res, $args)
    {
        User::verifyLogin();

        $product = new Product;

        $product->get((int)$args['idproduct']);

        $product->setValues($_POST);

        $product->save();

        $product->setPhoto($_FILES['file']);

        header('location: /admin/products');

        exit;
    }
);

?>