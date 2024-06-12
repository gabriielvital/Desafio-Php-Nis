// Função para Pesquisar Usuarios
$(document).ready(function () {
    $('#btnPesquisarNIS').click(function () {
        var nis = $('#pesquisarCidadao-form').val();
        $.ajax({
            type: "POST",
            url: "../Controller/ControllerCidadao.php",
            data: { 
                acao: "pesquisar",
                nisPesquisa: nis 
            },
            success: function (result) {
                if (result) {
                    $('#resultadoPesquisa').html('<p>Nome: ' + result.nomeCidadao + '</p><p>NIS: ' + result.nisCidadao + '</p>');
                } else {
                    $('#resultadoPesquisa').html('<p>Cidadão não encontrado.</p>');
                }
            },
            error: function () {
                $('#resultadoPesquisa').html('<p>Erro ao pesquisar cidadão.</p>');
            }
        });
        return false;
    });
});

$('#btnModalPesquisarNIS').click(function () {

    $('#nisPesquisa').modal('show');
});

// Função para Cadastrar Usuarios
$(document).ready(function () {
    $('#btnCadCidadao').click(function () {
        var dados = $('#cadCidadao-form').serializeArray();
        $.ajax({
            type: "POST",
            url: "../Controller/ControllerCidadao.php",
            data: dados,
            success: function (result) {
                if (result == 1) {
                    Swal.fire("cadastrado com sucesso");
                    $('#cadastrarCidadao').modal('hide');
                    var table = $('#sampleTable').DataTable();
                    table.ajax.reload(null, false);
                    $("#cadCidadao-form").trigger('reset');
                } else {
                    Swal.fire("Algo deu errado!");
                }
            }
        });
        return false;
    });
});

$('#btnModalCadMembro').click(function () {

    $('#cadastrarMembro').modal('show');
});