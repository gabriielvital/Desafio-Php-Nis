<?php

require_once ('../Dao/DaoCidadao.php');
$cidadaosDao = new DaoCidadao();

if (isset($_POST['nisPesquisa'])) {
    $nisPesquisa = $_POST['nisPesquisa'];
    $stmtCidadao = $cidadaosDao->runQuery("SELECT * FROM Cidadao WHERE nisCidadao = :nis");
    $stmtCidadao->bindParam(':nis', $nisPesquisa);
    $stmtCidadao->execute();
    $cidadao = $stmtCidadao->fetch(PDO::FETCH_ASSOC);

    if ($cidadao) {
        echo json_encode($cidadao);
    } else {
        echo json_encode([]);
    }
    exit();
}

function mask($val, $mask) {
    $maskared = '';
    $k = 0;

    for ($i = 0; $i <= strlen($mask) - 1; $i++) {
        if ($mask[$i] == '#') {
            if (isset($val[$k])) {
                $maskared .= $val[$k++];
            }
        } else {
            if (isset($mask[$i])) {
                $maskared .= $mask[$i];
            }
        }
    }

    return $maskared;
}

$encoding = 'UTF-8';

// Select na tabela Cidadaos...
$stmtCidadaos = $cidadaosDao->runQuery("SELECT * FROM Cidadao");
$stmtCidadaos->execute();

$data = array();

$i = 0;
// Mostrar tabela...
while ($rowCidadaos = $stmtCidadaos->fetch(PDO::FETCH_ASSOC)) {
    $data[$i]['idCidadao'] = $rowCidadaos['idCidadao'];
    $data[$i]['nomeCidadao'] = $rowCidadaos['nomeCidadao'];
    $data[$i]['nisCidadao'] = $rowCidadaos['nisCidadao'];
    $i++;
}

$datax = array('data' => $data);

function raw_json_encode($input, $flags = 0) {
    $fails = implode('|', array_filter(array(
        '\\\\',
        $flags & JSON_HEX_TAG ? 'u003[CE]' : '',
        $flags & JSON_HEX_AMP ? 'u0026' : '',
        $flags & JSON_HEX_APOS ? 'u0027' : '',
        $flags & JSON_HEX_QUOT ? 'u0022' : '',
    )));
    $pattern = "/\\\\(?:(?:$fails)(*SKIP)(*FAIL)|u([0-9a-fA-F]{4}))/";
    $callback = function ($m) {
        return html_entity_decode("&#x$m[1];", ENT_QUOTES, 'UTF-8');
    };
    return preg_replace_callback($pattern, $callback, json_encode($input, $flags));
}

echo raw_json_encode($datax);
?>