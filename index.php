<?php

use Hcode\Page;
use Hcode\PageAdmin;
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

        $page->setTpl('index');
    }
);

$app->get('/admin', 
    function(){
        $page = new PageAdmin();

        $page->setTpl('index');
    }
);

$app->run();

?>