<?php

session_start();

require_once('vendor/autoload.php');

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\RequestInterface as Response;
use Slim\App;
use Hcode\Page;

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

require_once("site.php");
require_once('routes/admin.php');
require_once('routes/admin-categories.php');
require_once('routes/admin-products.php');
require_once('routes/admin-users.php');

$app->run();

?>