<?php

namespace Hcode\Model;

use Hcode\DB\Sql;
use Hcode\Model;

class Category extends Model{
    
    public static function listAll()
    {
        $sql = new Sql();

        return $sql->select('SELECT * FROM tb_categories ORDER BY descategory');
    }

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
    public function get($idcategory)
    {
        $sql = new Sql();

        $results = $sql->select('SELECT * FROM tb_categories WHERE idcategory = :idcategory',[
            'idcategory' => $idcategory
        ]);

        $this->setValues($results[0]);
    }

    public function delete()
    {
        $sql = new Sql();

        $sql->query('DELETE FROM tb_categories WHERE idcategory = :idcategory',[
            'idcategory' => $this->getidcategory()
        ]);

        Category::updateFile();
    }

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

    public function addProduct(Product $product)
    {
        $sql = new Sql;

        $sql->query('INSERT INTO tb_productscategories (idcategory, idproduct) VALUES (:idcategory, :idproduct)',[
            'idcategory' => $this->getidcategory(),
            'idproduct' => $product->getidproduct()
        ]);
    }

    public function removeProduct(Product $product)
    {
        $sql = new Sql;

        $sql->query('DELETE FROM tb_productscategories WHERE idcategory = :idcategory AND idproduct = :idproduct',[
            'idcategory' => $this->getidcategory(),
            'idproduct' => $product->getidproduct()
        ]);
    }

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