<?php

namespace Hcode\Model;

use Hcode\DB\Sql;
use Hcode\Model;

class Product extends Model{
    
    public static function listAll()
    {
        $sql = new Sql();

        return $sql->select('SELECT * FROM tb_products ORDER BY desproduct');
    }

    public function checkList(array $list)
    {
        foreach( $list as &$row )
        {
            $product = new Product;

            $product->setValues($row);

            $row = $product->getValues();
        }
        
        return $list;
    }

    public function save()
    {
        $sql = new Sql();
        
        $results = $sql->select("CALL sp_products_save(:idproduct, :desproduct, :vlprice, :vlwidth, :vlheight, :vllength, :vlweight, :desurl)", [
            ':idproduct'  => $this->getidproduct(),
            ':desproduct' => $this->getdesproduct(),
            ':vlprice'    => $this->getvlprice(),
            ':vlwidth'    => $this->getvlwidth(),
            ':vlheight'   => $this->getvlheight(),
            ':vllength'   => $this->getvllength(),
            ':vlweight'   => $this->getvlweight(),
            ':desurl'     => $this->getdesurl()
        ]);

        $this->setValues($results[0]);

    }
    public function get($idproduct)
    {
        $sql = new Sql();

        $results = $sql->select('SELECT * FROM tb_products WHERE idproduct = :idproduct',[
            'idproduct' => $idproduct
        ]);

        $this->setValues($results[0]);
    }

    public function delete()
    {
        $sql = new Sql();

        $sql->query('DELETE FROM tb_products WHERE idproduct = :idproduct',[
            'idproduct' => $this->getidproduct()
        ]);
    }

    private function checkPhoto(){
        if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/res/site/img/products/'.$this->getidproduct() . '.webp'))
        {
            $url = '/res/site/img/products/'.$this->getidproduct() . '.webp';
        }else{
            $url = '/res/site/img/product.jpg';
        }

        $this->setdesphoto($url);
    
    }

    public function getValues()
    {
        $this->checkPhoto();
        
        return parent::getValues();
    }

    public function setPhoto($file)
    {
        $extension = explode('.', $file['name']);

        $extension = end($extension);

        switch($extension)
        {
            case 'jpg':
            case 'jpeg':
                $image = imagecreatefromjpeg($file['tmp_name']);
                break;
            case 'gif':
                $image = imagecreatefromgif($file['tmp_name']);
                break;
            case 'png':
                $image = imagecreatefrompng($file['tmp_name']);
                break;
            case 'webp':
                $image = imagecreatefromwebp($file['tmp_name']);
                break;
        }

        $dist = $_SERVER['DOCUMENT_ROOT'] . '/res/site/img/products/' . $this->getidproduct() . '.webp';

        imagewebp($image, $dist);

        imagedestroy($image);

        $this->checkPhoto();
        
    }

    public function getFromUrl($url)
    {
        $sql = new Sql();

        $result = $sql->select('SELECT * FROM tb_products WHERE desurl = :desurl', [
            'desurl' => $url
        ]);

        $this->setValues($result[0]);
    }

    public function getCategories()
    {
        $sql = new Sql;

        $results = $sql->select('
            SELECT * FROM tb_categories WHERE idcategory IN(
                SELECT a.idcategory
                FROM tb_categories a 
                INNER JOIN tb_productscategories b ON a.idcategory = b.idcategory
                WHERE b.idproduct = :idproduct
            )', [
                'idproduct' => $this->getidproduct()
            ]
        );

        return $results;
    }

}

?>