<?php

namespace Hcode\Model;

use Hcode\DB\Sql;
use Hcode\Model;

/**
 * Cart
 * A classe Cart é o carrinho de compraas responsável por interligar o User aos
 * Products desejados por ele.
 * 
 * @copyright (c) 2021, Lucas S. de Araujo
 */
class Cart extends Model
{
    const SESSION = "Cart";
    const SESSION_ERROR = "CartError";
        
    /**
     * getFromSession
     * Verifica se tem já existe uma sessâo, se ela existir retorna Cart vinculado a ela,
     * se não estiver uma sessão ativa, ele busca no banco se tem uma sessão vinculado a esse 
     * usuário.
     *
     * @return Cart
     */
    public static function getFromSession()
    {
        $cart = new Cart();

        if(isset($_SESSION[Cart::SESSION]) && (int)$_SESSION[Cart::SESSION]['idcart'] > 0)
        {
            $cart->get((int)$_SESSION[Cart::SESSION]['idcart']);

        }else{
            
            $cart->getFromSessionId();
            

            if (!(int)$cart->getidcart() > 0)
            {
                $data = [
                    'dessessionid' => session_id()
                ];

                if (User::checkLogin(FALSE))
                {
                    $user = User::getFromSession();

                    $data['iduser'] = $user->getiduser(); 
                }

                $cart->setValues($data);

                $cart->save();

                $cart->setToSession();
            }
        }

        return $cart;
    }
    
    /**
     * setToSession
     * Inicializa uma sessão
     *
     * @return void
     */
    public function setToSession()
    {
        $_SESSION[Cart::SESSION] = $this->getValues();
    }

        
    /**
     * getFromSessionUser
     * Busca no banco se existir um carrinho em aberto desse usuário.
     *
     * @return void
     */
    public function getFromSessionUser()
    {
        $sql = new Sql();

        $result = $sql->select('SELECT * FROM tb_carts WHERE iduser = :iduser', [
            'iduser' => $_SESSION[USer::SESSION]['iduser']
        ]);

        if( count($result) > 0)
        {
            $this->setValues($result[0]);
        }

    }
    
    /**
     * getFromSessionId
     * Busca no banco um carrinho se existir vinculado a essa sessão.
     *
     * @return void
     */
    public function getFromSessionId()
    {
        $sql = new Sql();

        $result = $sql->select('SELECT * FROM tb_carts WHERE dessessionid = :dessessionid', [
            'dessessionid' => session_id()
        ]);

        if( count($result) > 0)
        {
            $this->setValues($result[0]);
        }

    }
    
    /**
     * get
     * Busca no banco um Cart dono id fornecido
     * 
     * @param  int $idcart
     * @return void
     */
    public function get(int $idcart)
    {
        $sql = new Sql();

        $result = $sql->select('SELECT * FROM tb_carts WHERE idcart = :idcart', [
            'idcart' => $idcart
        ]);

        if( count($result) > 0)
        {
            $this->setValues($result[0]);
        }

    }    
    /**
     * save
     * Método que salva no banco.
     *
     * @return void
     */
    public function save()
    {
        $sql = new Sql();

        $result = $sql->select('CALL sp_carts_save(:idcart, :dessessionid, :iduser, :deszipcode, :vlfreight, :nrdays)', [
            'idcart' => $this->getidcart(),
            'dessessionid' => $this->getdessessionid(),
            'iduser' => $this->getiduser(),
            'deszipcode' => $this->getdeszipcode(),
            'vlfreight' => $this->getvlfreight(),
            'nrdays' => $this->getnrdays(),
        ]);

        $this->setValues($result[0]);
    }

        
    /**
     * addProduct
     * Adiciona produtos ao carrinho, e salva no banco.
     *
     * @param  Product $product
     * @return void
     */
    public function addProduct(Product $product)
    {
        $sql = new Sql();

        $sql->query('INSERT INTO tb_cartsproducts (idcart, idproduct) VALUES(:idcart, :idproduct)', [
            'idcart'    => $this->getidcart(),
            'idproduct' => $product->getidproduct()
        ]);

        $this->getCalculateTotal();
    }
    
    /**
     * removeProduct
     * Remove produtos do carrinho, mas não exclui o registro no banco,
     * para termos noção de que o cliente teve interesse no produto.
     *
     * @param  Product $product
     * @param  bool $all
     * @return void
     */
    public function removeProduct(Product $product, $all = FALSE)
    {
        $sql = new Sql();

        if ($all)
        {
            $sql->query('UPDATE tb_cartsproducts SET dtremoved = NOW() WHERE idcart = :idcart AND idproduct = :idproduct AND dtremoved IS NULL', [
                'idcart'    => $this->getidcart(),
                'idproduct' => $product->getidproduct()
            ]);
        }else {
            $sql->query('UPDATE tb_cartsproducts SET dtremoved = NOW() WHERE idcart = :idcart AND idproduct = :idproduct AND dtremoved IS NULL LIMIT 1', [
                'idcart'    => $this->getidcart(),
                'idproduct' => $product->getidproduct()
            ]);
        }

        $this->getCalculateTotal();
    }
    
    /**
     * getProducts
     * Busca no banco todos os produtos vinculado a esse carrinho.
     *
     * @return array 
     */
    public function getProducts()
    {
        $sql = new Sql();

        $result = $sql->select('
            SELECT b.idproduct, b.desproduct, b.vlprice, b.vlwidth, b.vlheight, b.vllength, b.vlweight, b.desurl, COUNT(*) AS nrqtd,
                 SUM(b.vlprice) AS vltotal 
            FROM tb_cartsproducts a
            INNER JOIN tb_products b ON a.idproduct = b.idproduct 
            WHERE a.idcart = :idcart AND a.dtremoved IS NULL
            GROUP BY b.idproduct, b.desproduct, b.vlprice, b.vlwidth, b.vlheight, b.vllength, b.vlweight, b.desurl
            ORDER BY b.desproduct
        ', [
            'idcart' => $this->getidcart()
        ]);

        return Product::checkList($result);
    }
    
    /**
     * getProductsTotal
     * Vai no banco e retorna uma array com os valores da soma dos preços, dimensões
     * e quantidade de produtos dentro do carrinho.
     *
     * @return void
     */
    public function getProductsTotal()
    {
        $sql = new Sql();

        $results = $sql->select('SELECT SUM(vlprice) AS vlprice, SUM(vlwidth) AS vlwidth,
                         SUM(vlheight) AS vlheight, SUM(vllength) AS vllength, 
                         SUM(vlweight) AS vlweight, COUNT(*) AS nrqtd
                    FROM tb_products a 
                    INNER JOIN tb_cartsproducts b 
                    ON a.idproduct = b.idproduct 
                    WHERE b.idcart = :idcart AND b.dtremoved IS NULL
                    ', [
                        'idcart' => $this->getidcart()
                    ]);

        if(count($results) > 0)
        {
            return $results[0];
        } else {
            return [];
        }
    }
    
    /**
     * setFreight
     * Recebe um CEP e cálcula o frete com base no endereço e tamnho do pacote.
     *
     * @param  string $nrzipcode
     * @return void
     */
    public function setFreight($nrzipcode)
    {
        $nrzipcode = str_replace('-', '', $nrzipcode);

        $totals = $this->getProductsTotal();

        $totals['vlwidth'] = ($totals['vlwidth'] < 10) ? 10 : $totals['vlwidth'];

        if($totals['nrqtd'] > 0)
        {
            $qs = http_build_query([
                'nCdEmpresa'          => '',
                'sDsSenha'            => '',
                'nCdServico'          => '40010',
                'sCepOrigem'          => '09853120',
                'sCepDestino'         => $nrzipcode,
                'nVlPeso'             => $totals['vlweight'],
                'nCdFormato'          => 1,
                'nVlComprimento'      => $totals['vlheight'],
                'nVlAltura'           => $totals['vllength'],
                'nVlLargura'          => $totals['vlwidth'],
                'nVlDiametro'         => 0,
                'sCdMaoPropria'       => 'S',
                'nVlValorDeclarado'   => $totals['vlprice'],
                'sCdAvisoRecebimento' => 'S'
            ]);

            $xml = simplexml_load_file('http://ws.correios.com.br/calculador/CalcPrecoPrazo.asmx/CalcPrecoPrazo?'.$qs);
            
            $results = $xml->Servicos->cServico;

            if ($results->MsgError != "")
            {
                Cart::setMsgError($results->MsgError);
            } else {
                Cart::clearMsgError();
            }

            $this->setnrdays($results->PrazoEntrega);
            $this->setvlfreight(Cart::formatValueToDecimal($results->Valor));
            $this->setdeszipcode($nrzipcode);
            
            $this->save();

            return $results;
        } else {

        }
    }
    
    /**
     * formatValueToDecimal
     * Troca a '.' pela a virgula pela ',' para separar as casas decimais
     *
     * @param  float $value
     * @return float
     */
    public static function formatValueToDecimal($value)
    {
        $value = str_replace('.','',$value);
        return (float)str_replace(',','.',$value);
    }
        
    /**
     * setMsgError
     * Seta uma mensagem de erro.
     *
     * @param  mixed $msgError
     * @return void
     */
    public static function setMsgError($msgError)
    {
        $_SESSION[Cart::SESSION_ERROR] = $msgError;
    }
    
    /**
     * getMsgError
     * Verifica se teve algum erro vinculado a essa sessão e o retorna.
     *
     * @return string
     */
    public static function getMsgError()
    {
        $msg = isset($_SESSION[Cart::SESSION_ERROR]) ? $_SESSION[Cart::SESSION_ERROR] : '';

        Cart::clearMsgError();

        return $msg;
    }
    
    /**
     * clearMsgError
     * Exclui a mensagem de erro vinculado a essa sessão
     *
     * @return void
     */
    public static function clearMsgError()
    {
        $_SESSION[Cart::SESSION_ERROR] = NULL;
    }
    
    /**
     * updateFreight
     * Aualiza o valor do frete.
     *
     * @return void
     */
    public function updateFreight()
    {
        if ($this->getdeszipcode() != '')
        {
            $this->setFreight($this->getdeszipcode());
        }
    }
    
    /**
     * getValues
     * Retorna os valores do carrinho.
     *
     * @return array
     */
    public function getValues()
    {
        $this->getCalculateTotal();

        return parent::getValues();
    }
        
    /**
     * getCalculateTotal
     * Cria um parametro subtotal,  e atualiza o vlprice somando o valor do frete.
     *
     * @return void
     */
    public function getCalculateTotal()
    {
        $this->updateFreight();

        $totals = $this->getProductsTotal();

        $this->setvlsubtotal($totals['vlprice']);
        $this->setvltotal($totals['vlprice'] + $this->getvlfreight());
    }
}

?>