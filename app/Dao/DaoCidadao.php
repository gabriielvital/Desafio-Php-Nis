<?php

require_once('../database/Database.php');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DaoCidadao
 *
 *
 */
class DaoCidadao {

    private $conn;

    function __construct() {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }

    public function runQuery($sql) {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    public function adicionarCidadao(ModelCidadao $cidadao) {
        try {
            //recupero valores do Model
            $nome = $cidadao->getNome();
            $nis = $cidadao->getNis();

            //preparo o comando
            $stmt = $this->conn->prepare("INSERT INTO Cidadao(nomeCidadao, nisCidadao) VALUES(?, ?)");

            //bind nos valores dos campos
            $stmt->bindparam(1, $nome);
            $stmt->bindparam(2, $nis);

            //executo a instrução
            $stmt->execute();

            //verifico se deu certo
            if ($stmt->rowCount() > 0) {
                echo 1;
            } else {
                echo 2;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function pesquisarCidadao(ModelCidadao $cidadao) {
        try {
            //recupero valores do Model
            $nis = $cidadao->getNis();

            //preparo o comando
            $stmt = $this->conn->prepare("SELECT * FROM Cidadao WHERE nisCidadao = ?");

            //bind nos valores dos campos
            $stmt->bindparam(1, $nis);
            $stmt->execute();

            //verifico se deu certo
            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}

?>