<?php

include_once("Dao.class.php");

class ClienteDao extends Dao {

    function __construct() {
        parent::__construct("Costumer");
    }

    function find($columns, $filter) {
        if (parent::find($columns, $filter) > 0)
            return parent::getRecordSet();
        else
            return NULL;
    }

}

?>
