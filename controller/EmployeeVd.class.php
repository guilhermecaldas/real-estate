<?php

class ReservaVd {

    private static $nroReserva;
    private static $valor;
    private static $codCliente;
    private static $dias;
    private static $extras = 0;
    private static $desconto = 0;

    public static function validation() {

        if (!is_numeric($_POST["txNroReserva"]))
            throw new Exception("nro Reserva inválido");

        self::$nroReserva = $_POST["txNroReserva"];

        if (empty($_POST["lsTipoQuarto"]) ||
                ((int) $_POST["lsTipoQuarto"]) == 0)
            throw new Exception("escolha tipo quarto");

        if (isset($_POST["cbCamareira"]))
            self::$extras+= 20;
        if (isset($_POST["cbFrigobar"]))
            self::$extras+= 60;

        if (!is_numeric($_POST["txDias"]) ||
                ((int) $_POST["txDias"]) <= 0)
            throw new Exception("Dias inválido");
        if (!empty($_POST["txDesconto"])) {
            if (!is_numeric($_POST["txDesconto"]) ||
                    ((int) $_POST["txDesconto"]) <= 0 ||
                    ((int) $_POST["txDesconto"]) > 30)
                throw new Exception("desconto inválido");

            self::$desconto = $_POST["txDesconto"];
        }
        if (!is_numeric($_POST["txCodCliente"]))
            throw new Exception("Cód cliente inválido");

        //self é this para os atributos estaticos.	
        self::$dias = $_POST["txDias"];
        self::$codCliente = $_POST["txCodCliente"];
        self::$valor = $_POST["lsTipoQuarto"];
    }

    public static function getNroReserva() {
        return self::$nroReserva;
    }

    public static function getCodCliente() {
        return self::$codCliente;
    }

    public static function getDias() {
        return self::$dias;
    }

    public static function getExtras() {
        return self::$extras;
    }

    public static function getDesconto() {
        return self::$desconto;
    }

    public static function getValor() {
        return self::$valor;
    }

}

?>