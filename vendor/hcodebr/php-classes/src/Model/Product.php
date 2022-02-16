<?php

namespace Hcode\Model;

use Hcode\DB\Sql;
use Hcode\Model;

/**
 * <b>Product: <b>
 * Essa classe é responsável por todas as interações do objeto Product com o resto da aplicação,
 * ela busca os produtos, adiciona e deleta no banco.
 * 
 * @copyright (c) 2021, Lucas S. de Araujo 
 */
class Product extends Model{
        
    /**
     * listAll
     *  Busca todos os Product cadastrados no banco. 
     * 
     * @return array
     */
    public static function listAll()
    {
        $sql = new Sql();

        return $sql->select('SELECT * FROM tb_products ORDER BY desproduct');
    }

        
    /**
     * checkList
     *  Recebe uma lista com dados, e transforma em uma lista de objetos do tipo Product. 
     * 
     * @param  array $list
     * @return array Product
     */
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
    
    /**
     * save
     *  Salva os dados do objeto no banco.
     * 
     * @return void
     */
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

        
    /**
     * get
     *  Busca no banco um objeto.
     *
     * @param  int $idproduct
     * @return void
     */
    public function get($idproduct)
    {
        $sql = new Sql();

        $results = $sql->select('SELECT * FROM tb_products WHERE idproduct = :idproduct',[
            'idproduct' => $idproduct
        ]);

        $this->setValues($results[0]);
    }
        
    /**
     * delete
     *  Deleta no banco um objeto.
     *
     * @return void
     */
    public function delete()
    {
        $sql = new Sql();

        $sql->query('DELETE FROM tb_products WHERE idproduct = :idproduct',[
            'idproduct' => $this->getidproduct()
        ]);
    }
    
    /**
     * checkPhoto
     *  Verifica se tem uma foto salva pra o produto em questão, se não tiver
     *  retorna a foto padrão.
     *
     * @return void
     */
    private function checkPhoto(){
        if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/res/site/img/products/'.$this->getidproduct() . '.webp'))
        {
            $url = '/res/site/img/products/'.$this->getidproduct() . '.webp';
        }else{
            $url = '/res/site/img/product.jpg';
        }

        $this->setdesphoto($url);
    
    }
    
    /**
     * getValues
     * Retorna os atributos do objeto.
     *
     * @return object Product
     */
    public function getValues()
    {
        $this->checkPhoto();
        
        return parent::getValues();
    }
    
    /**
     * setPhoto
     *  Recebe uma foto em um dos fomatos('jpeg', 'gif', 'webp') e salva no formato webp,
     *  com o nome id do objeto.
     *
     * @param  mixed $file
     * @return void
     */
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
    
    /**
     * getFromUrl
     *  Busca no banco o objeto dono da URL dada.
     *
     * @param  mixed $url
     * @return void
     */
    public function getFromUrl($url)
    {
        $sql = new Sql();

        $result = $sql->select('SELECT * FROM tb_products WHERE desurl = :desurl', [
            'desurl' => $url
        ]);

        $this->setValues($result[0]);
    }
    
    /**
     * getCategories
     *  Busca no banco todas as categoria que o objeto pertence.
     *
     * @return array
     */
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