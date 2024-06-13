<?php

require_once('../Classes/GenerateNis.php');
    class ModelCidadao {

        private $id;
        private $nome;
        private $nis;


        function __construct() {
            $generateNis = new GenerateNis();
            $this-> nis = $generateNis->generate();
        }

        function getId() {
            return $this->id;
        }

        function getNome() {
            return $this->nome;
        }

        function getNis() {
            return $this->nis;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setNome($nome) {
            $this->nome = $nome;
        }

        function setNis($nis) {
            $this->nis = $nis;
        }

    }
?>