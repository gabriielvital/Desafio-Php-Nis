$(document).ready(function () {

    // Função para Cadastrar Usuarios
    $('#btnCadCidadao').click(function (e) {
        e.preventDefault();
        var dados = $('#cadCidadao-form').serialize();
        $.ajax({
            type: "POST",
            url: "../controller/ControllerCidadao.php",
            data: dados,
            success: function (result) {
                if (result == 1) {
                    Swal.fire("Cadastrado com sucesso");
                    $('#cadastrarCidadao').modal('hide');
                    var table = $('#sampleTable').DataTable();
                    table.ajax.reload(null, false);
                    $("#cadCidadao-form").trigger('reset');
                } else {
                    Swal.fire("Algo deu errado!");
                }
            },
            error: function () {
                Swal.fire("Erro", "Não foi possível completar o cadastro", "error");
            }
        });
        return false;
    });

    $('#btnModalCadCidadao').click(function () {
        $('#cadastrarCidadao').modal('show');
    });

    // Função para Pesquisar Usuarios
    $('#btnPesCidadao').click(function (e) {
        e.preventDefault();
        var dados = $('#pesCidadao-form').serialize();
        $.ajax({
            type: "POST",
            url: "../Controller/ControllerCidadao.php",
            data: dados,
            success: function (response) {
                var result = JSON.parse(response);
                if (result.status === 'success') {
                    Swal.fire("Usuário encontrado com sucesso", "Nome: " + result.data.nomeCidadao + " NIS: " + result.data.nisCidadao);
                    $('#pesquisarCidadao').modal('hide');
                    var table = $('#sampleTable').DataTable();
                    table.ajax.reload(null, false);
                    $("#pesCidadao-form").trigger('reset');
                } else {
                    Swal.fire("Algo deu errado!", result.message, "error");
                }
            },
            error: function () {
                Swal.fire("Erro", "Não foi possível completar a pesquisa", "error");
            }
        });
        return false;
    });

    $('#btnModalPesCidadao').click(function () {
        $('#pesquisarCidadao').modal('show');
    });

});