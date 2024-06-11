<?php

require_once('../database/Database.php');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DaoMembro
 *
 *
 */
class DaoMembro {

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

    public function adicionarMembro(ModelMembro $Membro) {
        try {
            //recupero valores do Model
            $nome = $Membro->getNome();
            $nis = $Membro->getNis();

            //preparo o comando
            $stmt = $this->conn->prepare("INSERT INTO Membro(nomeMembro, nisMembro) VALUES(?, ?)");

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

    public function editarMembro(ModelMembro $Membro) {
        try {
            //recupero valores do Model
            $id = $Membro->getId();
            $nome = $Membro->getNome();
            $nis = $Membro->getNis();

            //preparo o comando
            $stmt = $this->conn->prepare("UPDATE Membro SET nomeMembro = ?, nisMembro = ? WHERE idMembro = ?");

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

    public function excluirMembro(ModelMembro $Membro) {
        try {
            //recupero valores do Model
            $id = $Membro->getId();

            //preparo o comando
            $stmt = $this->conn->prepare("DELETE FROM Membro WHERE idMembro = ?");

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