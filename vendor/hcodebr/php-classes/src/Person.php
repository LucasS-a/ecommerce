<?php

namespace Hcode;

use DateTime;
use Hcode\DB\Sql;

abstract class Person{

    private $desperson;
    private $desemail;
    private $nrphone;
    private $dtregister;

    public function loadById($id)
    {
        $sql = new Sql();

        $result = $sql->select('SELECT * FROM tb_persons WHERE idperson = :ID', array(
            'ID' => $id
        ));

        if(count($result) > 0)
        {
            $row = $result[0];

            $this->setDesperson($row['desperson']);
            $this->setDesemail($row['desemail']);
            $this->setNrphone($row['nrphone']);
            $this->setDtregister(new DateTime($row['dtregister']));

        }else{
            echo "Não retornou nada.<br>";
        }

    }

    public function getDesperson()
    {
        return $this->desperson;
    }
    public function setDesperson($desperson)
    {
        $this->desperson = $desperson;
    }

    public function getDesemail()
    {
        return $this->desemail;
    }
    public function setDesemail($desemail)
    {
        $this->desemail = $desemail;
    }

    public function getNrphone()
    {
        return $this->nrphone;
    }
    public function setNrphone($nrphone)
    {
        $this->nrphone = $nrphone;
    }

    public function getDtregister()
    {
        return $this->dtregister;
    }
    public function setDtregister($dtregister)
    {
        $this->dtregister = $dtregister;
    }

}

?>