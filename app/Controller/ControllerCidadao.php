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
    case 'pesquisar':
        pesquisarCidadao();
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

    //adiciono os elementos em um objeto Cidadao
    $cidadao->setNome($nome);

    //chamo a função da DAO, que efetivamente manipula o BD
    $dao->adicionarCidadao($cidadao);
}

function pesquisarCidadao() {
    //inclui o modelo, a dao e a database
    require_once ('../Model/ModelCidadao.php');
    require_once ('../Dao/DaoCidadao.php');
    require_once('../Database/Database.php');

    //instancia das classes
    $db = new Database();
    $dao = new DaoCidadao();
    $cidadao = new ModelCidadao();

    //id do usuário a ser deletado
    $nis = $_POST['nis'];

    $cidadao = new ModelCidadao();
    $cidadao->setNis($nis);
    
    //função da DAO, que efetivamente manipula o BD
    $result = $dao->pesquisarCidadao($cidadao);

    if ($result) {
        echo json_encode(['status' => 'success', 'data' => $result]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Usuário não encontrado']);
    }
    
}