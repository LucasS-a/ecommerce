<?php

namespace Hcode\Model;

use Hcode\DB\Sql;
use Hcode\Mailer;
use Hcode\Model;
/**
 * <b>User: <b> 
 * Essa classe é responsável por todas as interações do objeto User com o resto da aplicação,
 * ela verifica se está logado, busca os usuários, adiciona e deleta no banco.
 * 
 * @copyright (c) 2021, Lucas S. de Araujo 
 */

class User extends Model{

    const SESSION = 'User';
    const ERROR = 'User_Erro';
    const REGISTER_ERROR = 'Register_Error';
    const SECRET_KEY = "HcodePhp7_Secret";
    const SECRET_IV = "This is my secret iv";

    /**
     * login: 
     * Essa classe é responsável por veiricar se os dados fornecidos pelo usuário, são de algum 
     * usuário cadastrado no banco, se tiver seta os atributos vindo do banco no objeto.
     * 
     *  @param string $login.
     *  @param string $password. 
     */
    public static function login($login, $password)
    {
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM
                                 tb_users a INNER JOIN tb_persons b 
                                 WHERE a.deslogin=:LOGIN and b.idperson=a.idperson", [
                                    'LOGIN' => $login
                                ]);

        if( count($results) == 0)
        {
            throw new \Exception("Usuário inexistente ou senha inválida.");
        }

        $data = $results[0];

        if(password_verify($password, $data['despassword']))
        {
            $user = new User();

            $data[0]['desperson'] = utf8_encode($data[0]['desperson']);

            $user->setValues($data);

            $_SESSION[User::SESSION] = $user->getValues();

        }else{
            throw new \Exception("Usuário inexistente ou senha inválida.");
        }
    }

        
    /**
     * getFromSession
     * Verifica se tem uma sessão de usuário no sistema, se tiver retorna o usuário.
     *
     * @return User
     */
    public static function getFromSession()
    {
       $user = new User();
       
       if(isset($_SESSION[User::SESSION]) && $_SESSION[User::SESSION]['iduser'] > 0)
       {
           $user->setValues($_SESSION[User::SESSION]);
       }

       return $user;
    }
    
    /**
     * checkLogin
     * Método responsável para verificar se o usuário tem autorização
     * para acessar a página.
     * 
     * @param  bool $inadmin
     * @return void
     */
    public static function checkLogin($inadmin = TRUE)
    {
        if(
            !isset($_SESSION[User::SESSION])
            ||
            !$_SESSION[User::SESSION]
            ||
            !(int)$_SESSION[User::SESSION]['iduser'] > 0
        ){
            // Não está logado
            return FALSE;
        }else{
            if ($inadmin && (bool)$_SESSION[User::SESSION]['inadmin'])
            {
                // Está logando em rota de administrador tendo acesso.
                return TRUE;
            } else if ($inadmin === FALSE )
            {
                // Está logando em uma rota que não é de administrador.
                return TRUE;
            }else{
                // Está logando uma rota de administrador sem ter acesso.
                return FALSE;
            }
        }
    }

    /**
     * verifyLogin:
     * Método que veirifica se exite uma sessão, se o usuário está logado e se ele tem 
     * acesso administrativo. Se não satisfazer os requisitos redireciona o usário para
     * a página de login.
     * 
     *  @param bool inadmin.
     *  @return void.  
     */
    public static function verifyLogin($inadmin = TRUE)
    {
        if (!User::checkLogin($inadmin)){
            if ($inadmin)
            {
                header("Location: /admin/login");
                exit;
            } else {
                header("Location: /login");
                exit;
            }
        }
    }
        
    /**
     * logout:
     * Método que faz o logout da página administrativo.
     *
     * @return void
     */
    public static function logout()
    {
        $_SESSION[User::SESSION] = NULL;
    }

        
    /**
     * listAll: 
     * Método que reotorna um array com todos os usários cadastrados no banco de dados.
     *
     * @return void
     */
    public static function listAll()
    {
        $sql = new Sql();

        $results = $sql->select('SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) ORDER BY b.desperson');
       
        foreach ($results as &$user) {
            $user['desperson'] = utf8_encode($user['desperson']);
        }
        
        return $results;
    }
    
    /**
     * save:
     * Salva os dados do usuário no banco de dados.
     *
     * @return void
     */
    public function save()
    {
        $sql = new Sql();
        
        $results = $sql->select("CALL sp_users_save(:desperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin)", [
            'desperson'   => utf8_decode($this->getdesperson()),
            'deslogin'    => $this->getdeslogin(),
            'despassword' => $this->getdespassword(),
            'desemail'    => $this->getdesemail(),
            'nrphone'     => $this->getnrphone(),
            'inadmin'     => $this->getinadmin()
        ]);

        $this->setValues($results[0]);

    }
        
    /**
     * get:
     * Busca no banco de dados o usuário dono id fornecido.
     *
     * @param  int $iduser
     * @return void
     */
    public function get($iduser)
    {
        $sql = new Sql();

        $results = $sql->select('SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = :iduser',[
            'iduser' => $iduser
        ]);

        $results[0]['desperson'] = utf8_encode($results[0]['desperson']);

        $this->setValues($results[0]);
    }
    
    /**
     * update:
     * Atualiza no banco os dados do usário.
     *
     * @return void
     */
    public function update()
    {
        $sql = new Sql();

        $results = $sql->select("CALL sp_usersupdate_save(:iduser, :desperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin)",
        array(
            ":iduser" => $this->getiduser(),
            ":desperson" => utf8_decode($this->getdesperson()),
            ":deslogin" => $this->getdeslogin(),
            ":despassword" => $this->getdespassword(),
            ":desemail" => $this->getdesemail(),
            ":nrphone" => $this->getnrphone(),
            ":inadmin" => $this->getinadmin()
        ));

        $results[0]['desperson'] = utf8_encode($results[0]['desperson']);
        
        $this->setValues($results[0]);
    }
    
    /**
     * delete:
     * Exclui o cadastro de um usuário.
     *
     * @return void
     */
    public function delete()
    {
        $sql = new Sql();

        $sql->query('CALL sp_users_delete(:iduser)',[
            'iduser' => $this->getiduser()
        ]);

    }
        
    /**
     * getForgot:
     * Método que recebe um email e veirfica se está cadastrsdo no banco, se estiver salva na tabela tb_userspasswordsrecoveries um registro.
     * para validar a ação no método $this->validForgotDecrypt(). Depois controi um template que será enviado para o email em questão, com um
     * link com id desse registro na tabela tb_userspasswordsrecoveries para redefinir a senha.
     *
     * @param  string $email
     * @return void
     */
    public static function getForgot($email)
    {
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_persons a INNER JOIN tb_users b USING(idperson) WHERE a.desemail = :desemail", [
            'desemail' => $email
        ]);

        $results[0]['desperson'] = utf8_encode($results[0]['desperson']);

        if (count($results) === 0)
        {
            throw new \Exception("Não foi possível recuperar a senha");
        }else{
            $data = $results[0];

            $resultRecovery = $sql->select("CALL sp_userspasswordsrecoveries_create(:iduser, :desip)", [
                'iduser' => $data['iduser'],
                'desip'  => $_SERVER['REMOTE_ADDR']
            ]);

            if (count($resultRecovery) === 0)
            {
                throw new \Exception("Não foi possível recuperar a senha");
            
            }else{
                $dataRecovery = $resultRecovery[0];

                $key = hash('sha256', User::SECRET_KEY);

                $iv = substr(hash('sha256', User::SECRET_IV), 0, 16);

                $code = openssl_encrypt($dataRecovery['idrecovery'], 'aes-256-cbc', $key, 0, $iv);

                $code = base64_encode($code);

                $link = "http://www.ecommerce.com/admin/forgot/reset?code=$code";

                $subject = "Redefinir a senha";

                $mailer = new Mailer($data['desemail'], $subject, $data['desperson'], 'email.html.twig',
                array(
                    'name' => $data['desperson'], 
                    'link' => $link
                ));

                $mailer->send();

                return $data;
            }
        }
    }    
    /**
     * validForgotDecrypt:
     * Método que recebe um $código criptografado, enviado no email do usuário pelo método $this->getForgot().
     * Esse método descriptografa o código pega id e busca no banco o registro. 
     *
     * @param  mixed $code
     * @return void
     */
    public static function validForgotDecrypt($code)
    {
        $key = hash('sha256', User::SECRET_KEY);

        $iv = substr(hash('sha256', User::SECRET_IV), 0, 16);
        
        $idrecovery = openssl_decrypt(base64_decode($code), 'aes-256-cbc', $key, 0, $iv);

        $sql = new Sql();

        $resultRecovery = $sql->select('SELECT * FROM tb_userspasswordsrecoveries a
            INNER JOIN tb_users b USING(iduser)
            INNER JOIN tb_persons c USING(idperson)
            WHERE
            a.idrecovery = :idrecovery                          
            AND
            a.dtrecovery IS NULL
            AND
            DATE_ADD(a.dtregister, INTERVAL 1 HOUR) >= NOW();',
            array(
                'idrecovery' => $idrecovery
            )
        );

        if (count($resultRecovery) === 0)
        {
            throw new \Exception("Não foi possível recuperar a senha.");
        }else{
            return $resultRecovery[0];
        }

    }
        
    /**
     * setForgotUsed
     * Método que atualiza no banco a tabela tb_userspasswordsrecoveries, para que o código não seje mais utilizável.
     *
     * @param  int $idrecovery
     * @return void
     */
    public static function setForgotUsed( $idrecovery )
    {
        $sql = new Sql();

        $sql->query('UPDATE tb_userspasswordsrecoveries SET dtrecovery = NOW() WHERE idrecovery = :idrecovery',
        array(
            'idrecovery' => $idrecovery
        ));
    }    
    /**
     * setPassword
     *
     * @param  string $password
     * @return void
     */
    public function setPassword($password)
    {
        $sql = new Sql();

        $sql->query("UPDATE tb_users SET despassword = :password WHERE iduser = :iduser",
        array(
            ":password" => $password,
            ":iduser" => $this->getiduser()
        ));

    }
    /**
     * setMsgError
     * Seta uma mensagem de erro relacionado ao registro.
     *
     * @param  mixed $msgError
     * @return void
     */
    public static function setRegisterError($registerError)
    {
        $_SESSION[User::REGISTER_ERROR] = $registerError;
    }
    
    /**
     * getMsgError
     * Verifica se teve algum erro vinculado a essa sessão e o retorna.
     *
     * @return string
     */
    public static function getRegisterError()
    {
        $msg = isset($_SESSION[User::REGISTER_ERROR]) ? $_SESSION[User::REGISTER_ERROR] : '';

        User::clearRegisterError();

        return $msg;
    }
    
    /**
     * clearMsgError
     * Exclui a mensagem de erro vinculado a essa sessão
     *
     * @return void
     */
    public static function clearRegisterError()
    {
        $_SESSION[User::REGISTER_ERROR] = NULL;
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
        $_SESSION[User::ERROR] = $msgError;
    }
    
    /**
     * getMsgError
     * Verifica se teve algum erro vinculado a essa sessão e o retorna.
     *
     * @return string
     */
    public static function getMsgError()
    {
        $msg = isset($_SESSION[User::ERROR]) ? $_SESSION[User::ERROR] : '';

        User::clearMsgError();

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
        $_SESSION[User::ERROR] = NULL;
    }

    public static function checkLoginExist( $login )
    {
        $sql = new Sql();

        $results = $sql->select('SELECT * FROM tb_users WHERE deslogin = :LOGIN',[
            'LOGIN' => $login
        ]);

        return (count($results) > 0);
    }
}

?>