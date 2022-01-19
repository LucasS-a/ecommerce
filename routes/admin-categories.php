<?php

use Hcode\Page;
use Hcode\PageAdmin;
use Hcode\Model\User;
use Hcode\Model\Category;

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

$app->get('/categories/{idcategory}',
    function($request, $response, $args){

        $category = new Category();

        $category->get((int)$args['idcategory']);

        $page = new Page();

        $page->setTpl('category.html.twig',[
            'category' => $category->getValues(),
            'products' => []
        ]);
    }
);

?>