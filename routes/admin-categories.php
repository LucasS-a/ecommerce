<?php

use Hcode\PageAdmin;
use Hcode\Model\User;
use Hcode\Model\Category;
use Hcode\Model\Product;

require_once('vendor/autoload.php');

$app->get('/admin/categories',
    function()
    {
        User::verifyLogin();

        $categories = Category::listAll();

        $page = new PageAdmin();

        $page->setTpl('categories.html.twig',[
            'categories' => $categories
        ]);

    }
);

$app->get('/admin/categories/create',
    function()
    {
        User::verifyLogin();
        
        $page = new PageAdmin();

        $page->setTpl('categories-create.html');

    }
);
$app->post('/admin/categories/create',
    function(){
        User::verifyLogin();

        $category = new Category();

        $category->setValues($_POST);

        $category->save();

        header('Location: /admin/categories');

        exit;
    }
);
$app->get('/admin/categories/{idcategory}/delete', 
    function($request, $response, $args){
        User::verifyLogin();

        $category = new Category();

        $category->get((int)$args['idcategory']);

        $category->delete();

        header('location: /admin/categories');

        exit;
    }
);
$app->get('/admin/categories/{idcategory}',
    function($request, $response, $args){
        User::verifyLogin();

        $category = new Category();

        $category->get((int)$args['idcategory']);

        $page = new PageAdmin();

        $page->setTpl('categories-update.html.twig', [
            'category' => $category->getValues()
        ]);
    }
);

$app->post('/admin/categories/{idcategory}',
    function($request, $response, $args){
        User::verifyLogin();

        $category = new Category();

        $category->get((int)$args['idcategory']);

        $category->setValues($_POST);

        $category->save();

        header('location: /admin/categories');

        exit;
    }
);
$app->get('/admin/categories/{idcategory}/products',
    function($request, $response, $args){
        User::verifyLogin();

        $category = new Category();

        $category->get((int)$args['idcategory']);

        $page = new PageAdmin();

        $page->setTpl('categories-products.html.twig', [
            'category' => $category->getValues(),
            'productsRelated' => $category->getProducts(TRUE),
            'productsNotRelated' => $category->getProducts(FALSE)
        ]);
    }
);
$app->get('/admin/categories/{idcategory}/products/{idproduct}/add',
    function($request, $response, $args){
        User::verifyLogin();

        $product = new Product;

        $product->get((int)$args['idproduct']);

        $category = new Category();

        $category->get((int)$args['idcategory']);

        $category->addProduct($product);

        header('location: /admin/categories/'.$category->getidcategory().'/products');

        exit;        
    }
);

$app->get('/admin/categories/{idcategory}/products/{idproduct}/remove',
    function($request, $response, $args){
        User::verifyLogin();

        $product = new Product;

        $product->get((int)$args['idproduct']);

        $category = new Category();

        $category->get((int)$args['idcategory']);

        $category->removeProduct($product);

        header('location: /admin/categories/'.$category->getidcategory().'/products');

        exit;        
    }
);

?>