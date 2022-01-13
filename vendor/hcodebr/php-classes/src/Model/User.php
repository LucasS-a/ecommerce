<?php

namespace Hcode\Model;

use Hcode\DB\Sql;
use Hcode\Mailer;
use Hcode\Model;

class User extends Model{

    const SESSION = 'User';
    const SECRET_KEY = "HcodePhp7_Secret";
    const SECRET_IV = "This is my secret iv";

    public static function login($login, $password)
    {
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_users WHERE deslogin=:LOGIN", [
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

            $user->setValues($data);

            $_SESSION[User::SESSION] = $user->getValues();

        }else{
            throw new \Exception("Usuário inexistente ou senha inválida.");
        }
    }

    public static function verifyLogin()
    {
        if (
            !isset($_SESSION[User::SESSION])
            ||
            !$_SESSION[User::SESSION]
            ||
            !(int)$_SESSION[User::SESSION]['iduser'] > 0
            ||
            !(bool)$_SESSION[User::SESSION]['inadmin']
        ){
            header("Location: /admin/login");
            exit;
        }
    }
    public static function logout()
    {
        $_SESSION[User::SESSION] = NULL;
    }

    public static function listAll()
    {
        $sql = new Sql();

        return $sql->select('SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) ORDER BY b.desperson');
    }

    public function save()
    {
        $sql = new Sql();

        $results = $sql->select("CALL sp_users_save(:desperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin)", [
            'desperson'   => $this->getdesperson(),
            'deslogin'    => $this->getdeslogin(),
            'despassword' => $this->getdespassword(),
            'desemail'    => $this->getdesemail(),
            'nrphone'     => $this->getnrphone(),
            'inadmin'     => $this->getinadmin()
        ]);

        $this->setValues($results[0]);

    }
    
    public function get($iduser)
    {
        $sql = new Sql();

        $results = $sql->select('SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = :iduser',[
            'iduser' => $iduser
        ]);

        $this->setValues($results[0]);
    }

    public function update()
    {
        $sql = new Sql();

        $results = $sql->select("CALL sp_usersupdate_save(:iduser, :desperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin)",
        array(
            ":iduser" => $this->getiduser(),
            ":desperson" => $this->getdesperson(),
            ":deslogin" => $this->getdeslogin(),
            ":despassword" => $this->getdespassword(),
            ":desemail" => $this->getdesemail(),
            ":nrphone" => $this->getnrphone(),
            ":inadmin" => $this->getinadmin()
        ));
        
        $this->setValues($results[0]);
    }

    public function delete()
    {
        $sql = new Sql();

        $sql->query('CALL sp_users_delete(:iduser)',[
            'iduser' => $this->getiduser()
        ]);

    }

    public static function getForgot($email)
    {
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_persons a INNER JOIN tb_users b USING(idperson) WHERE a.desemail = :desemail", [
            'desemail' => $email
        ]);

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

                $mailer = new Mailer($data['desemail'], $subject, $data['desperson'], 'forgot.html.twig',
                array(
                    'name' => $data['desperson'], 
                    'link' => $link
                ));

                $mailer->send();

                return $data;
            }
        }
    }
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
    public static function setForgotUsed( $idrecovery )
    {
        $sql = new Sql();

        $sql->query('UPDATE tb_userspasswordsrecoveries SET dtrecovery = NOW() WHERE idrecovery = :idrecovery',
        array(
            'idrecovery' => $idrecovery
        ));
    }
    public function setPassword($password)
    {
        $sql = new Sql();

        $sql->query("UPDATE tb_users SET despassword = :password WHERE iduser = :iduser",
        array(
            ":password" => $password,
            ":iduser" => $this->getiduser()
        ));

    }
}

?>