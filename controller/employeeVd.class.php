<?php

class employeeVd {

    private static $id;
    private static $name;
    private static $user_name;
    private static $password;
    private static $picture;

    public static function validation() {

        if (!is_numeric($_POST["txName"]))
            throw new Exception("Nome inválido"); //invalid employee name

        self::$name = $_POST["txName"];

        if (!ctype_alnum($_POST["txUserName"]))
            throw new Exception("Nome de usuário inválido"); //invalid username

        self::$user_name = $_POST["txUserName"];

        self::$id = $_POST["txId"];
        self::$password = $_POST["txPassword"];
        self::$picture = $_POST["txPicture"];
    }

    public static function getId() {
        return self::$id;
    }

    public static function getName() {
        return self::$name;
    }

    public static function getUserName() {
        return self::$user_name;
    }

    public static function getPassword() {
        return self::$password;
    }

    public static function getPicture() {
        return self::$picture;
    }

}

?>