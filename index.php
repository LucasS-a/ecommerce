<?php

session_start();

use Hcode\Page;
use Hcode\PageAdmin;
use Hcode\Model\User;
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
        User::login($_POST['login'], $_POST['password']);

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

$app->run();

?>