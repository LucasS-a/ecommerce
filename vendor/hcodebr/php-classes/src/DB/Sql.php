<?php

namespace Hcode\DB;

use PDO;

/**
 * <b>Sql:</b> 
 * Essa classe é responsável por fazer a conexão via PDO com o banco de Dados.
 * 
 * @copyright (c) 2021, Lucas S. de Araujo 
 */
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

    // Seta os parâmetros na query que será enviada para obanco
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

    /**
     * <b>query:</b>
     * Método que envia comando sem retorno para o banco de dados.
     * 
     *  @param string $reawQuery = a query que será preparada para enviar para o banco.
     *  @param array $params = os parâmetros da query.
     */
    public function query($rawQuery, $params = array())
    {
        $this->stmt = $this->conn->prepare($rawQuery);

        $this->setParams($params);

        $this->stmt->execute();

    }

    /**
     * <b>query:</b>
     * Método que envia comando com retorno para o banco de dados.
     * 
     *  @param string $reawQuery = a query que será preparada para enviar para o banco.
     *  @param array $params = os parâmetros da query.
     *  @return array retorna a resposta do banco.
     */
    public function select($rawQuery, $params = array()):array
    {
        $this->query($rawQuery, $params);

        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>