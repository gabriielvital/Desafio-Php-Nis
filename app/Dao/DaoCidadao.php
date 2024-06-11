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

    public function editarCidadao(ModelCidadao $cidadao) {
        try {
            //recupero valores do Model
            $id = $cidadao->getId();
            $nome = $cidadao->getNome();
            $nis = $cidadao->getNis();

            //preparo o comando
            $stmt = $this->conn->prepare("UPDATE Cidadao SET nomeCidadao = ?, nisCidadao = ? WHERE idCidadao = ?");

            //bind nos valores dos campos
            $stmt->bindparam(1, $nome);
            $stmt->bindparam(2, $nis);
            $stmt->bindparam(3, $id);

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

    public function excluirCidadao(ModelCidadao $cidadao) {
        try {
            //recupero valores do Model
            $id = $cidadao->getId();

            //preparo o comando
            $stmt = $this->conn->prepare("DELETE FROM Cidadao WHERE idCidadao = ?");

            //bind nos valores dos campos
            $stmt->bindparam(1, $id);
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

}

?>