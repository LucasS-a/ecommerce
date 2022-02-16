<?php

namespace Hcode\Model;

use Hcode\DB\Sql;
use Hcode\Model;

/**
 * <b>Category: <b>
 * Essa classe é responsável por todas as interações do objeto Category com o resto da aplicação,
 * ela responsável por categorizar os objetos da classe Product
 * 
 * @copyright (c) 2022, Lucas S. de Araujo 
 */
class Category extends Model{
        
    /**
     * listAll
     *  Busca no banco as categorias cadastradas
     * 
     * @return array
     */
    public static function listAll()
    {
        $sql = new Sql();

        return $sql->select('SELECT * FROM tb_categories ORDER BY descategory');
    }
    
    /**
     * save
     *  Salva no banco uma nova categoria,  e atualiza o arquivo categories.html
     *
     * @return void
     */
    public function save()
    {
        $sql = new Sql();

        $results = $sql->select("CALL sp_categories_save(:idcategory, :descategory)", [
            'idcategory'   => $this->getidcategory(),
            'descategory'  => $this->getdescategory()
        ]);

        $this->setValues($results[0]);

        Category::updateFile();

    }    
    /**
     * get
     * Busca no banco a categoria dona do id fornecido.
     *
     * @param  mixed $idcategory
     * @return void
     */
    public function get($idcategory)
    {
        $sql = new Sql();

        $results = $sql->select('SELECT * FROM tb_categories WHERE idcategory = :idcategory',[
            'idcategory' => $idcategory
        ]);

        $this->setValues($results[0]);
    }
    
    /**
     * delete
     * Deleta do banco a categoria e atualiza o arquivo categories.html.
     *
     * @return void
     */
    public function delete()
    {
        $sql = new Sql();

        $sql->query('DELETE FROM tb_categories WHERE idcategory = :idcategory',[
            'idcategory' => $this->getidcategory()
        ]);

        Category::updateFile();
    }
    
    /**
     * updateFile
     * Atualiza o arquivo categories.html que serve para acessar categorias sem precisar acessar o banco.
     *
     * @return void
     */
    public static function updateFile()
    {
        $categories = Category::listAll();

        $html = [];

        foreach( $categories as $category )
        {
            array_push($html, '<li><a href=/categories/'.$category['idcategory'].'>' . $category['descategory'] .'</a></li>');
        }

        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/views/site/categories.html', implode($html));

    }
    
    /**
     * getProducts
     *  Se receber TRUE retorna os produtos cadastrado nessa categoria, e se
     * receber FALSE retorna os produtos não cadastrado.
     *
     * @param  bool $related
     * @return void
     */
    public function getProducts(bool $related)
    {
        $sql = new Sql();

        if( $related )
        {
            return $sql->select("
                SELECT * FROM tb_products WHERE idproduct IN(
                    SELECT a.idproduct
                    FROM tb_products a 
                    INNER JOIN tb_productscategories b ON a.idproduct = b.idproduct
                    WHERE b.idcategory = :idcategory
                )
            ", array(
                'idcategory' => $this->getidcategory()
            ));
        }else{
            return $sql->select('
                SELECT * FROM tb_products WHERE idproduct NOT IN(
                    SELECT a.idproduct
                    FROM tb_products a 
                    INNER JOIN tb_productscategories b ON a.idproduct = b.idproduct
                    WHERE b.idcategory = :idcategory
                )
            ', array(
                'idcategory' => $this->getidcategory()
            ));
        }
    }
    
    /**
     * addProduct
     * Adiciona a tabela que relaciona o id do produto com id da categoria a qual pertence.
     *
     * @param  Product $product
     * @return void
     */
    public function addProduct(Product $product)
    {
        $sql = new Sql;

        $sql->query('INSERT INTO tb_productscategories (idcategory, idproduct) VALUES (:idcategory, :idproduct)',[
            'idcategory' => $this->getidcategory(),
            'idproduct' => $product->getidproduct()
        ]);
    }
    
    /**
     * removeProduct
     * Remove da tabela que relaciona o id do produto com id da categoria, registro que relaciona os dois.
     *
     * @param  Product $product
     * @return void
     */
    public function removeProduct(Product $product)
    {
        $sql = new Sql;

        $sql->query('DELETE FROM tb_productscategories WHERE idcategory = :idcategory AND idproduct = :idproduct',[
            'idcategory' => $this->getidcategory(),
            'idproduct' => $product->getidproduct()
        ]);
    }
    
    /**
     * getProductsSite
     *  Esse método acessa o banco e retorna os Produtos cadastrado na categorias,
     *  o quantos produtos cadastrado e quantas páginas devem ter.
     *
     * @param  int $page
     * @param  int $itemsporPage
     * @return array
     */
    public function getProductsSite($page = 1, $itemsporPage = 3)
    {
        $start = ($page - 1) * $itemsporPage;

        $sql = new Sql();

        $results = $sql->select(
            "SELECT SQL_CALC_FOUND_ROWS *
            FROM tb_products a
            INNER JOIN tb_productscategories b ON a.idproduct = b.idproduct
            INNER JOIN tb_categories c ON c.idcategory = b.idcategory
            WHERE c.idcategory = :idcategory
            LIMIT $start, $itemsporPage",
            array(
                'idcategory' => $this->getidcategory()
            )
        );

        $resultTotal = $sql->select('SELECT FOUND_ROWS() AS  nrtotal');

        return [
            'data'  => Product::checkList($results),
            'total' => $resultTotal[0]['nrtotal'],
            'pages' => ceil($resultTotal[0]['nrtotal'] / $itemsporPage)
        ];
    }

}

?>