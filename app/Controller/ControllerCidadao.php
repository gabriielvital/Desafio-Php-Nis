<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControllerCidadao
 *
 *
 */
//ação recebida da view
$acao = $_POST["acao"];

switch ($acao) {
    case 'adicionar':
        adicionarCidadao();
        break;
    case 'editar':
        editarCidadao();
        break;
    case 'excluir':
        excluirCidadao();
        break;
}

function adicionarCidadao() {
    //inclui o modelo, a dao e a database
    require_once ('../Model/ModelCidadao.php');
    require_once ('../Dao/DaoCidadao.php');
    require_once('../Database/Database.php');

    //instancia das classes
    $db = new Database();
    $dao = new DaoCidadao();
    $cidadao = new ModelCidadao();

    //campos a serem recebidos da view
    $nome = $_POST['nome'];
    $nis = $_POST['nis'];

    //adiciono os elementos em um objeto Cidadao
    $cidadao->setNome($nome);
    $cidadao->setNis($nis);

    //chamo a função da DAO, que efetivamente manipula o BD
    $dao->adicionarCidadao($cidadao);
}

function editarCidadao() {
    //inclui o modelo, a dao e a database
    require_once ('../Model/ModelCidadao.php');
    require_once ('../Dao/DaoCidadao.php');
    require_once('../Database/Database.php');

    //instancia das classes
    $db = new Database();
    $dao = new DaoCidadao();
    $cidadao = new ModelCidadao();

    //campos a serem recebidos da view
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $nis = $_POST['nis'];

    //adiciono os elementos em um objeto Cidadao
    $cidadao->setId($id);
    $cidadao->setNome($nome);
    $cidadao->setNis($nis);

    //chamo a função da DAO, que efetivamente manipula o BD
    $dao->editarCidadao($cidadao);
}

function excluirCidadao() {
    //inclui o modelo, a dao e a database
    require_once ('../Model/ModelCidadao.php');
    require_once ('../Dao/DaoCidadao.php');
    require_once('../Database/Database.php');

    //instancia das classes
    $db = new Database();
    $dao = new DaoCidadao();
    $cidadao = new ModelCidadao();

    //id do usuário a ser deletado
    $id = $_POST['id'];

    $cidadao = new ModelCidadao();
    $cidadao->setId($id);
    
    //chamo a função da DAO, que efetivamente manipula o BD
    $dao->excluirCidadao($cidadao);
}