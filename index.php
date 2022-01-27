<?php

session_start();

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

require_once('routes/site.php');
require_once('routes/admin.php');
require_once('routes/admin-categories.php');
require_once('routes/admin-products.php');
require_once('routes/admin-users.php');

$app->run();

?>