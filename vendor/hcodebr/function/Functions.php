<?php

namespace FunctionHcode;

use Hcode\Model\User;

class Functions
{
    private $function = array();

    public static function getFunctions()
    {
        $function = new Functions;

        $function->setFunction(new \Twig\TwigFunction('getNameUser', function () {
    
            $user = User::getFromSession();
        
            return $user->getdesperson();
        }));

        $function->setFunction(new \Twig\TwigFunction('checkLogin', function () {
    
            return User::checkLogin(false);
        }));

        return $function->getFunction();
    }

    public function setFunction($function)
    {
        array_push($this->function, $function);
    }
    public function getFunction()
    {
        return $this->function;
    }
}

?>