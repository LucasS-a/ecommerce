<?php

session_start();

use Hcode\Page;
use Hcode\PageAdmin;
use Hcode\Model\User;
use Hcode\Model\Category;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\RequestInterface as Response;
use Slim\App;


require_once('vendor/autoload.php');

$config = [
    'settings' => [
        'displayErrorDetails' => true, # change this <------
        
                'addContentLengthHeader' => false /* permite que o servidor
                                                     da web defina o cabeçalho 
                                                     Content-Length, o que faz
                                                     com que o Slim se comporte
                                                     de maneira mais previsível.*/
        ],
];

$app = new App($config);

$app->get('/', 
    function(){
        $page = new Page();

        $page->setTpl('index.html.twig');
    }
);

$app->get('/admin', 
    function(){
        User::verifyLogin();

        $page = new PageAdmin();

        $page->setTpl('index.html.twig');
    }
);

$app->get('/admin/login',
    function(){
        $page = new PageAdmin([
            'header' => false,
            'footer' => false
        ]);
        $page->setTpl('login.html');
    }
);
$app->post('/admin/login',
    function(){
        User::login( $_POST['login'], $_POST['password'] );

        header("location: /admin");

        exit;
    }
);
$app->get('/admin/logout',
    function(){
        User::logout();

        header("location: /admin/login");

        exit;
    }
);
$app->get('/admin/users', 
    function(){
        User::verifyLogin();

        $users = User::listAll();

        $page = new PageAdmin();

        $page->setTpl('users.html.twig',[
            'users' => $users
        ]);
    }
);
$app->get('/admin/users/create',
    function(){
        User::verifyLogin();

        $page = new PageAdmin();

        $page->setTpl('users-create.html.twig');
    }
);
$app->post('/admin/users/create',
    function(){
        User::verifyLogin();

        $user = new User();

        $_POST['inadmin'] = (isset($_POST['inadmin']))?1:0;

        $user->setValues($_POST);

        $user->save();

        header('location: /admin/users');

        exit;
    }
);
$app->get('/admin/users/{iduser}', 
    function($request, $response, $args){
        User::verifyLogin();

        $user = new User;

        $user->get((int)$args['iduser']);


        $page = new PageAdmin();
        
        $page->setTpl('users-update.html.twig', [
            'user' => $user->getValues()
        ]);
    }
);
$app->post('/admin/users/{iduser}', 
    function($request, $response, $args){
        User::verifyLogin();

        $user = new User();

        $user->get((int)$args['iduser']);

        $user->setValues($_POST);

        $user->update();

        header("location: /admin/users");

        exit;
    }
);
$app->get('/admin/users/{iduser}/delete', 
    function($request, $response, $args){
        User::verifyLogin();

        $user = new User();

        $user->get((int)$args['iduser']);

        $user->delete();

        header('location: /admin/users');

        exit;
    }
);

$app->get('/admin/forgot', 
    function(){
        $page = new PageAdmin([
            'header' => false,
            'footer' => false
        ]);
        $page->setTpl('forgot.html');
    }
);
$app->post('/admin/forgot',
    function(){
        $user = User::getForgot($_POST['email']);

        header("Location: /admin/forgot/sent");
        exit;
    }
);
$app->get('/admin/forgot/sent',
    function(){
        $page = new PageAdmin([
            'header' => false,
            'footer' => false
        ]);
        $page->setTpl('forgot-sent.html');
    }
); 
$app->get('/admin/forgot/reset',
    function(){
        $user = User::validForgotDecrypt($_GET["code"]);

        $page = new PageAdmin([
            'header' => false,
            'footer' => false
        ]);
        $page->setTpl('forgot-reset.html.twig',
        array( 
            'name' => $user['desperson'],
            'code' => $_GET['code']
        ));
    }
);
$app->post('/admin/forgot/reset',
    function(){
        $forgot = User::validForgotDecrypt($_POST["code"]);

        User::setForgotUsed($forgot['idrecovery']);

        $user = new User();

        $user->get((int)$forgot['iduser']);

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT,[
            'cost' => 12
        ]);

        $user->setPassword($password);

        $page = new PageAdmin([
            'header' => false,
            'footer' => false
        ]);
        $page->setTpl('forgot-reset-success.html');
    }
);


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


$app->run();

?>