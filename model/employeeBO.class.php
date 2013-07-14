<?php

class employeeBO {

    private $employee_dao = null;

    public function __construct() {
        include_once("employeeDAO.class.php");
        $this->employee_dao = new employeeDAO();
    }

    public function __destruct() {
        unset($this->employee_dao);
    }

    public function save() {

        $id = employeeVd::getId();
        $name = employeeVd::getNome();
        $user_name = employeeVd::getUserName();
        $password = md5(employeeVd::getPassword());
        $picture = employeeVd::getPicture();
        
        $return = $this->employee_dao->insert("id,name,username,password,picture",
                "$id,$name,$user_name,$password,$picture");

        if ($return == 1)
            return "Gravacao com sucesso </br>";
        else {
            return "Não foi possível Gravar.Verifique!";
        }
    }

    private function findDesconto() {
        $id = employeeVd::getId();

        $row = $this->employee_dao->find("*", "id=$id");

        if ($row != null) {
            return true;
        }
        else
            return false;
    }

}

?>