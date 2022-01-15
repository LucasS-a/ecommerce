<?php

namespace Hcode;

class Model{

    private $values = [];

    public function __call($name, $arg)
    {
        $method = substr($name, 0, 3);
        $fieldName = substr($name, 3, strlen($name) - 3);
        switch($method)
        {
            case 'get':
                return (isset($this->values[$fieldName]))? $this->values[$fieldName] : NULL;
                break;
            
            case 'set':
                if ( $fieldName === 'despassword' && strlen((string)$arg[0]) < 20 ){

                    $this->values[$fieldName] = password_hash($arg[0], PASSWORD_DEFAULT,[
                        'cost' => 12
                    ]);

                }else {
                    $this->values[$fieldName] = $arg[0];
                }
                break;
        }
    }

    public function setValues($data)
    {
        foreach ($data as $key => $value)
        {
            $this->{"set$key"}($value);
        }
    }

    public function getValues()
    {
        return $this->values;
    }

}

?>