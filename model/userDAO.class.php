<?php
include_once("dao.class.php");

class userDAO extends dao {

    public function __construct() {
        parent::__construct("user");
    }

    public function insert($fields, $values) {
        try {
            return parent::insert($fields, $values);
        } catch (Exception $ex) {
            throw($ex);
        }
    }

    public function find($columns, $filter) {
        if (parent::find($columns, $filter) > 0) {
            return parent::getRecordSet();
        }
        else
            return null;
    }

}
?>
