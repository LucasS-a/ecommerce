<?php
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
?>