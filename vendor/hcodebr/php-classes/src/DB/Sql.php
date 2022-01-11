<?php

namespace Hcode\DB;

use PDO;

class Sql{
    
    const HOSTNAME = 'mysql';
    const PORT = '3306';
    const DBNAME = 'db_ecommerce';
    const USERNAME = 'lucas';
    const PASSWORD = 'password';

    private $conn;
    private $stmt;

    public function __construct()
    {
        $this->conn = new PDO(
            "mysql:host=" . Sql::HOSTNAME .";port=" . Sql::PORT . ";dbname=".Sql::DBNAME,
            Sql::USERNAME,
            Sql::PASSWORD
        );

    }

    private function setParams($params)
    {
        foreach( $params as $key => $value )
        {
            $this->setParam($key, $value);
        }
    }
    private function setParam($key, $value)
    {
        $this->stmt->bindParam($key, $value);
    }

    public function query($rawQuery, $params = array())
    {
        $this->stmt = $this->conn->prepare($rawQuery);

        $this->setParams($params);

        $this->stmt->execute();

    }

    public function select($rawQuery, $params = array()):array
    {
        $this->query($rawQuery, $params);

        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>