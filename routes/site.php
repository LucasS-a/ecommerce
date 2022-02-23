<?php

use Hcode\Model\Category;
use Hcode\Model\Cart;
use Hcode\Model\Product;
use Hcode\Model\User;
use Hcode\Model\Address;
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
        $cart = new cart;
        
        if(isset($_SESSION[User::SESSION]) && $_SESSION[User::SESSION]['iduser'])
        {            
            $cart->getFromSessionUser();

            $cart->setToSession();
        }else{
            $cart = Cart::getFromSession();
        }

        $products  = $cart->getProducts();

        $page = new Page();

        $page->setTpl('cart.html.twig', [
            'cart' => $cart->getValues(),
            'products' => $cart->getProducts(),
            'error' => Cart::getMsgError()
        ]);
    }
);

$app->get('/cart/{idproduct}/add',
    function($req, $res, $args)
    {
        $product = new Product();

        $product->get((int)$args['idproduct']);

        $cart = Cart::getFromSession();

        $qtd = isset($_GET['qtd']) ? $_GET['qtd'] : 1;

        for($i = 0; $i < $qtd; $i++)
        {
            $cart->addProduct($product);
        }       

        header('location: /cart');
    }
);

$app->get('/cart/{idproduct}/minus',
    function($req, $res, $args)
    {
        $product = new Product();

        $product->get((int)$args['idproduct']);

        $cart = Cart::getFromSession();

        $cart->removeProduct($product);

        header('location: /cart');
    }
);

$app->get('/cart/{idproduct}/remove',
    function($req, $res, $args)
    {
        $product = new Product();

        $product->get((int)$args['idproduct']);

        $cart = Cart::getFromSession();

        $cart->removeProduct($product, TRUE);

        header('location: /cart');
    }
);

$app->post('/cart/freight', 
    function()
    {
        $cart = Cart::getFromSession();

        $cart->setFreight($_POST['zipcode']);

        header('location: /cart');
    }
);

$app->get('/checkout',
    function()
    {
        User::verifyLogin(false);

        $address = new Address();

        $cart = Cart::getFromSession();

        $page = new Page();

        $page->setTpl('checkout.html.twig', [
            'cart'    => $cart,
            'address' => $address->getValues()
        ]);
    }
);

$app->get('/login',
    function()
    {
        $page = new Page();

        $page->setTpl('login.html.twig',[
            'error' => User::getMsgError(),
            'register_error' => User::getRegisterError(),
            'registerValues' => isset($_SESSION["registerValues"]) ? $_SESSION['registerValues'] : ['name'=>'', 'email'=>'', 'phone'=>''],
        ]);
    }
);

$app->post('/login',
    function()
    {
        try{
            User::login( $_POST['login'], $_POST['password'] );
        }catch(Exception $e) {
            User::setMsgError($e->getMessage());
        }

        header("location: /checkout");

        exit;
    }
);

$app->get('/logout',
    function(){
        User::logout();

        header("location: /login");

        exit;
    }
);

$app->post('/register',
    function(){

        $_SESSION["registerValues"] = $_POST;

        if(!isset($_POST['name']) || $_POST['name'] == '')
        {
            User::setRegisterError('Preencha o campo do nome!');

            header('location: /login');
            exit;
        }
        if(!isset($_POST['email']) || $_POST['email'] == '')
        {
            User::setRegisterError('Preencha o campo do e-mail!');

            header('location: /login');
            exit;
        }
        
        if(!isset($_POST['password']) || $_POST['password'] == '')
        {
            User::setRegisterError('Preencha o campo do password!');

            header('location: /login');
            exit;
        }

        if ( User::checkLoginExist($_POST['email'])) {
            User::setRegisterError('Esse e-mail já foi cadastrado!');

            header('location: /login');
            exit;
        }

        $user = new User();

        $user->setValues([
            'inadmin'   => 0,
            'desperson' => $_POST['name'],
            'deslogin'  => $_POST['email'],
            'nrphone'   => $_POST['phone'],
            'desemail'  => $_POST['email'],
            'despassword' => $_POST['password']
        ]);

        $user->save();

        User::login($_POST['email'], $_POST['password']);

        header("location: /checkout");
        exit;
    }
);
?>