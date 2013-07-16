<?php

class userVd {

    private static $user_name;
    private static $password;

    public static function validation() {

        if (is_numeric($_POST["txUsername"]))
            throw new Exception("Nome inválido"); //invalid user name

        self::$user_name = $_POST["txUsername"];

        self::$password = $_POST["txPassword"];
    }

    public static function login(){
        
    }
    
    public static function getUserName() {
        return self::$user_name;
    }

    public static function getPassword() {
        return self::$password;
    }

}

?>