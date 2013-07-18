<?php

$admin_login = "caldas"; 
$admin_password = "guilherme"; 

class connection {

    private static $conn;
    private static $hostname = "localhost"; //ou 127.0.0.1  ip padrao de servidor
    private static $dataBaseName = "imobiliaria";
    private static $userName = "root";
    private static $pwd = "autocad";
    private static $dataBaseType = "mysql";

    public static function connect() {
        //try to connect to the server
        try {
            self::$conn = new
                    PDO(self::$dataBaseType . ":host=" . self::$hostname . ";dbname=" .
                    self::$dataBaseName, self::$userName, self::$pwd);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public static function getConn() {
        return self::$conn;
    }

    public static function disconnect() {
        self::$conn = null;
    }

}
?>
