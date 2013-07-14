<?php

class EmployeeCtrl {

    public function __construct() {
        include_once("controller/employee.class.php");
        EmployeeVd::validation();
    }

    public function execute() {

        include_once("model/EmployeeBO.class.php");
        $employeeBO = new EmployeeBO();

        switch ($_POST["btOperation"]) {
            case "Gravar":
                return $employeeBO->save();
                break;
        }
    }

}

?>