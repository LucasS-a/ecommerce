<?php

namespace Hcode;
/**
 * <b>Model: </b>
 * É uma classse modelo que servirá de base para outras classe, para implementar métodos que são comum
 * a todas elas.
 * 
 * @copyright (c) 2021, Lucas S. de Araujo.
 */
class Model{

    private $values = [];

    // Método mágico no qual fará de forma automática a criação dos gets e sets das classes.
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
                // quando se tratar da senha set como hash, se já for um hash salvar normal.
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

    /**
     * <b>setValues:</b>
     * Seta os valores no atriibuto das classes.
     * 
     *  @param array $data = os valores dos atributos
     */
    public function setValues($data)
    {
        foreach ($data as $key => $value)
        {
            $this->{"set$key"}($value);
        }
    }
    
    /**
     * <b>getValues:</b>
     * Retorna os atributos em forma de array.
     *  
     *  @return array.
     */
    public function getValues()
    {
        return $this->values;
    }

}

?>