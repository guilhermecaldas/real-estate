<?php

abstract class Dao {

    private $tableName;
    private $rs;   //record set   - retorno da consulta
    private $rowsSelAffected;

    public function __construct($tableName) {
        require_once("Connection.class.php");

        $this->tableName = $tableName;
    }

    public function insert($fields, $values) {

        try {

            //faz a concexao com o banco de dados
            Connection::connect();

            //montar o comando sql para gravar
            $sql = "INSERT INTO $this->tableName ($fields) VALUES ($values)";

            //comando para executar a query no banco de dados
            Connection::getConn()->beginTransaction();

            //RETORNO DO BANCO DE DADOS APOS EXECUCAO DA SQL
            $rowsAffected = Connection::getConn()->exec($sql);
            Connection::getConn()->commit();
            //encerrar a concexao com o banco
            Connection::disconnect();

            return $rowsAffected;
        } catch (Exception $ex) {
            Connection::getConn()->rollBack();
            throw($ex);
        }
    }

    public function update($fieldsValues, $filter) {

        try {
            //faz a concexao com o banco de dados
            Connection::connect();

            //monta a clausula WHERE
            if ($filter != "") {
                $filter = " WHERE " . $filter;
            }

            //montar o comando sql para gravar
            $sql = "UPDATE $this->tableName SET $fieldsValues $filter";


            //comando para executar a query no banco de dados
            Connection::getConn()->beginTransaction();

            //RETORNO DO BANCO DE DADOS APOS EXECUCAO DA SQL
            $rowsAffected = Connection::getConn()->exec($sql);
            Connection::getConn()->commit();

            //encerrar a concexao com o banco
            Connection::disconnect();

            return $rowsAffected;
        } catch (Exception $ex) {
            Connection::getConn()->rollBack();
            throw($ex);
        }
    }

    public function delete($filter) {
        try {
            //faz a concexao com o banco de dados
            Connection::connect();

            //monta a clausula DELETE
            if ($filter != "") {
                $filter = " WHERE " . $filter;
            }

            //montar o comando sql para EXCLUSAO
            $sql = "DELETE FROM $this->tableName $filter";

            //comando para executar a query no banco de dados
            Connection::getConn()->beginTransaction();

            //RETORNO DO BANCO DE DADOS APOS EXECUCAO DA SQL
            $rowsAffected = Connection::getConn()->exec($sql);
            Connection::getConn()->commit();

            //encerrar a concexao com o banco
            Connection::disconnect();

            return $rowsAffected;
        } catch (Exception $ex) {
            Connection::getConn()->rollBack();
            throw($ex);
        }
    }

    public function find($columns, $filter) {
        try {
            //faz a concexao com o banco de dados
            Connection::connect();

            //monta a clausula WHERE
            if ($filter != "") {
                $filter = " WHERE " . $filter;
            }

            //montar o comando sql para CONSULTA
            $sql = "SELECT $columns FROM $this->tableName $filter";

            $this->rs = Connection::getConn()->query($sql);

            $this->rowsSelAffected = $this->rs->columnCount();

            //encerrar a concexao com o banco
            Connection::disconnect();

            return $this->rowsSelAffected;
        } catch (Exception $ex) {

            throw($ex);
        }
    }

    public function getRecordSet() {
        try {
            $return = NULL;

            if (!$this->rs) {
                return NULL;
            }

            while ($row = $this->rs->fetch()) {
                $return[] = $row;
            }

            return $return;
        } catch (Exception $ex) {
            throw($ex);
        }
    }

}
?>