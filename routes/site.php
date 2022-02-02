<?php

use Hcode\Model\Category;
use Hcode\Model\Cart;
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

        $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

        $category = new Category();

        $category->get((int)$args['idcategory']);

        $pagination = $category->getProductsSite($page);

        $pages = array();

        for( $i=1; $i<=$pagination['pages']; $i++)
        {
            array_push($pages, [
                'link' => '/categories/' . $category->getidcategory() .'?page=' . $i,
                'number' => $i
            ]);
        }

        $page = new Page();

        $page->setTpl('category.html.twig',[
            'category' => $category->getValues(),
            'products' => $pagination['data'],
            'pages'    => $pages
        ]);
    }
);

$app->get('/products/{desurl}',
    function($req, $res, $args)
    {
        $product = new Product;

        $product->getFromUrl($args['desurl']);

        $categories = $product->getCategories();

        $page = new Page();

        $page->setTpl('product-detail.html.twig', [
            'product' => $product->getValues(),
            'categories' => $categories
        ]);
    }
);

$app->get('/cart',
    function()
    {
        Cart::getFromSession();

        $page = new Page();

        $page->setTpl('cart.html');
    }
);

?>