<?php

use Hcode\PageAdmin;
use Hcode\Model\User;

require_once('vendor/autoload.php');

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

        var_dump($user->getiduser());

        $user->delete();

        header('location: /admin/users');

        exit;
    }
);
?>