<?php

class userBO {

    private $user_dao = null;

    public function __construct() {
        include_once("userDAO.class.php");
        $this->user_dao = new employeeDAO();
    }

    public function __destruct() {
        unset($this->user_dao);
    }

    public function save() {

        $user_name = userVd::getUserName();
        $password = userVd::getPassword();

        $return = $this->user_dao->insert("username,password", "$user_name,$password");

        if ($return == 1)
            return "Gravacao com sucesso </br>";
        else {
            return "Não foi possível Gravar.Verifique!";
        }
    }

    public function login() {
        $user_name = userVd::getUserName();
        $password = userVd::getPassword();

        $db_user = $this->findUser($user_name)['username'];
        $db_password = $this->findUser($user_name)['password'];


        if ($db_user == $user_name) {
            if ($password == $db_password) {
                
            } else {
                throw Exception("Senha inválida");
            }
        } else {
            throw Exception("Usuário não encontrado");
        }
    }

    public function findUser($username) {
        $row = $this->user_dao->find("*", "where username='$username'");

        return $row;
    }

}

?>
