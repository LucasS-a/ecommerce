<?php

namespace Hcode;

class Model{

    private $value = [];

    public function __call($name, $arg)
    {
        $method = substr($name, 0, 3);
        $fieldName = substr($name, 3, strlen($name) - 3);
        switch($method)
        {
            case 'get':
                return $this->values[$fieldName];
                break;
            
            case 'set':
                $this->value[$fieldName] = $arg[0];
                break;
        }
    }

    public function setData($data)
    {
        foreach ($data as $key => $value)
        {
            $this->{"set$key"}($value);
        }
    }

    public function getValues()
    {
        return $this->value;
    }

}

?>