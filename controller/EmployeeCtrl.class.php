<?php

class ReservaCtr {

    public function __construct() {
        include_once("controller/reservaVd.class.php");
        ReservaVd::validation();
    }

    public function execute() {

        include_once("model/reservaBO.class.php");
        $reservaBO = new ReservaBO();

        switch ($_POST["btOperacao"]) {
            case "Gravar":
                return $reservaBO->save();
                break;
        }
    }

}

?>