<?php

class ReservaBO {

    private $reservaDao = NULL;

    public function __construct() {
        include_once("reservaDao.class.php");
        $this->reservaDao = new reservaDao();
    }

    public function __destruct() {
        unset($this->reservaDao);
    }

    public function save() {

        $nroReserva = ReservaVd::getNroReserva();
        $codCliente = ReservaVd::getCodCliente();
        $dias = ReservaVd::getDias();
        $extras = ReservaVd::getExtras();
        $desconto = ReservaVd::getDesconto();
        $valor = ReservaVd::getValor();

        if ($desconto != 0 &&
                $this->findDesconto() == FALSE)
            throw new Exception("Este cliente não pode 
				    ter desconto!");

        //fazendo o calculo do valor
        $total = ($valor * $dias) + $extras;

        //faz o calculo com desconto
        $totalDesconto = $total -
                ($total * ($desconto / 100));

        $return = $this->reservaDao->insert(
                "nroReserva,codCliente,dias,desconto,valorPago", "$nroReserva,$codCliente,$dias,$desconto,
			 $totalDesconto");

        if ($return == 1)
            return "Gravacao com sucesso </br>
				        Valor Pago é R$ $totalDesconto";
        else {

            return "Não foi possível Gravar.Verifique!";
        }
    }

    private function findDesconto() {
        $codCliente = ReservaVd::getCodCliente();

        $row = $this->reservaDao->find("*", "codCliente=$codCliente and valorPago > 260");

        if ($row != NULL) {
            return TRUE;
        }
        else
            return FALSE;
    }

}

?>