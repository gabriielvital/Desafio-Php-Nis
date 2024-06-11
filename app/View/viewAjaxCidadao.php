<?php

require_once ('../Dao/DaoCidadao.php');
$CidadaosDao = new DaoCidadao();

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
$stmtCidadaos = $CidadaosDao->runQuery("SELECT * FROM Cidadao");
$stmtCidadaos->execute();

$data = array();

$i = 0;
// Mostrar tabela...
while ($rowCidadaos = $stmtCidadaos->fetch(PDO::FETCH_ASSOC)) {

    $data[$i]{'idCidadao'} = $rowCidadaos['idCidadao'];
    $data[$i]{'nomeCidadao'} = $rowCidadaos['nomeCidadao'];
    $data[$i]{'nisCidadao'} = $rowCidadaos['nisCidadao'];
    $data[$i]{'button'} = '
              <a id="rowEditarCidadao_' . $i . '" data-id="' . $rowCidadaos['idCidadao'] . '" data-nome="' . $rowCidadaos['nomeCidadao'] . '"data-nis="' . $rowCidadaos['nisCidadao'] . '" onclick="editarCidadao(' . ($i + 1) . ')" data-tooltip="tooltip" title="Editar Cidadao"><span class="mdi mdi-account-key"></span> Editar</a></li>
              <a id="rowDeleteCidadao_' . $i . '" data-id="' . $rowCidadaos['idCidadao'] . '" data-nome="' . $rowCidadaos['nomeCidadao'] . '" onclick="excluirCidadao(' . ($i + 1) . ')" data-tooltip="tooltip" title="Excluir"><span class="mdi mdi-delete-forever"></span> Excluir</a></li>
           ';

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