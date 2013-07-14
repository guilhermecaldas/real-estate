<?php

class Connection {

    private static $conn;
    private static $hostname = "localhost"; //ou 127.0.0.1  ip padrao de servidor
    private static $dataBaseName = "dbhotel";
    private static $userName = "root";
    private static $pwd = "";
    private static $dataBaseType = "mysql";

    public static function connect() {
        //TENTA CONCETAR NO SERVIDO
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