<?php

namespace Hcode\DB;

use PDO;

class Sql{
    
    const HOSTNAME = 'mysql';
    const PORT = '3306';
    const DBNAME = 'db_teste';
    const USERNAME = 'lucas';
    const PASSWORD = 'password';

    private $conn;

    public function __construct()
    {
        $this->conn = new PDO(
            "mysql:host=".Sql::HOSTNAME.";port=".Sql::PORT.";dbname=".Sql::DBNAME,
            Sql::USERNAME,
            Sql::PASSWORD
        );

    }

    private function setParams($statment, $params)
    {
        foreach( $params as $key => $value )
        {
            $statment->bindParam($key, $value);
        }
    }

    public function query($rawQuery, $params = array())
    {
        $stmt = $this->conn->prepare($rawQuery);

        $this->setParams($stmt, $params);

        $stmt->execute();

        return $stmt;

    }

    public function select($rawQuery, $params = array())
    {
        $stmt = $this->query($rawQuery, $params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>