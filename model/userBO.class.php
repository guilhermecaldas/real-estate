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
        
        $return = $this->user_dao->insert("username,password",
                "$user_name,$password");

        if ($return == 1)
            return "Gravacao com sucesso </br>";
        else {
            return "Não foi possível Gravar.Verifique!";
        }
    }

    private function findDesconto() {
        $username = userVd::getUserName();

        $row = $this->user_dao->find("*", "$username");

        if ($row != null) {
            return true;
        }
        else
            return false;
    }

}
?>
