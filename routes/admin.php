<?php

use Hcode\PageAdmin;
use Hcode\Model\User;

require_once('vendor/autoload.php');

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

        $user->setdespassword($_POST["password"]);

        $user->save();

        $page = new PageAdmin([
            'header' => false,
            'footer' => false
        ]);
        $page->setTpl('forgot-reset-success.html');
    }
);
?>