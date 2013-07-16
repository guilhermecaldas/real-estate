<?php
class userCtrl {

    public function __construct() {
        include_once("controller/userVd.class.php");
        loginVd::validation();
    }

    public function execute() {

        include_once("model/userBO.class.php");
        $userBO = new userBO();
        
        switch ($_POST["btOperation"]) {
            case "Gravar":
                return $userBO->save();
                break;
        }
    }
    
    public function login(){
        
    }

}

?>
