<?php

namespace Hcode;

use Hcode\Model\Person;
use Hcode\DB\Sql;

class User extends Person
{
    private $deslogin;
    private $despassword;
    private $inadmin;

    public function loadById($id)
    {
        parent::loadById($id);

        $sql = new Sql;

        $result = $sql->select('SELECT * FROM tb_users WHERE iduser = :ID', array(
            ':ID' => $id
        ));
        if(count($result) > 0)
        {
            $row = $result[0];

            $this->setDeslogin($row['deslogin']);
            $this->setDespassword($row['despassword']);
            $this->setInadmin($row['inadmin']);
        }else{
            echo 'Usuário não encontrado';
        }

    }
    public function __toString()
    {
        return json_encode(array(
            'desperson' => parent::getDesperson(),
            'deslogin' => $this->getDeslogin(),
            'despassword' => $this->getPassword(),
            'inadmin' => $this->getInadmin(),
            'desemail' => parent::getDesemail(),
            'nrphone' => parent::getNrphone(),
            'dtregister' => parent::getDtregister()->format('d/m/Y H:i:s')
        ), JSON_UNESCAPED_SLASHES);
    }

    public function setDeslogin($deslogin)
    {
        $this->deslogin = $deslogin;
    }
    public function getDeslogin()
    {
        return $this->deslogin;
    }

    public function setDespassword($despassword)
    {
        $this->despassword = $despassword;
    }
    public function getPassword()
    {
        return $this->despassword;
    }

    public function setInadmin($inadmin)
    {
        $this->inadmin = $inadmin;
    }
    public function getInadmin()
    {
        return $this->inadmin;
    }
}

?>