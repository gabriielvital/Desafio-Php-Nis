<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelMembro
 *
 *
 */
class ModelMembro {

    private $id;
    private $nome;
    private $nis;

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