function excluirCidadao(id) {
    var codCidadao = $('#rowDeleteCidadao_' + (id - 1)).attr("data-id");
    var nomeCidadao = $('#rowDeleteCidadao_' + (id - 1)).attr("data-nome");
    Swal.fire({
        title: 'Confirma?',
        text: "Deseja realmente excluir o usuário " + nomeCidadao + " de id: " + codCidadao + " ?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sim, excluir!",
        cancelButtonText: "Não, cancelar!",
        preConfirm: function () {
            $.ajax({
                type: "POST",
                url: "../controller/ControllerCidadao.php",
                data: {
                    acao: "excluir",
                    id: codCidadao
                },
                success: function (result) {
                    if (result == 1) {
                        Swal.fire("Excluido com sucesso");
                        var table = $('#sampleTable').DataTable();
                        table.ajax.reload(null, false);
                    } else {
                        Swal.fire("Algo deu errado!");
                    }
                }
            });
        }
    });
    return false;
}


// Função para editar Usuarios
$(document).ready(function () {
    $('#btnEditarCidadao').click(function () {

        var dados = $('#edCidadao-form').serializeArray();
        $.ajax({
            type: "POST",
            url: "../controller/ControllerCidadao.php",
            data: dados,
            success: function (result) {
                if (result == 1) {
                    Swal.fire("editado com sucesso");
                    $('#editarCidadao').modal('hide');
                    var table = $('#sampleTable').DataTable();
                    table.ajax.reload(null, false);

                } else {
                    var table = $('#sampleTable').DataTable();
                    table.ajax.reload(null, false);
                    Swal.fire("erro ao editar");
                }
            }
        });
        return false;
    });
});


$(document).ready(function () {
    $('#btnCadCidadao').click(function () {
        var dados = $('#cadCidadao-form').serializeArray();
        $.ajax({
            type: "POST",
            url: "../controller/ControllerCidadao.php",
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



$('#btnModalCadCidadao').click(function () {

    $('#cadastrarCidadao').modal('show');
});


function editarCidadao(id) {
    var idCidadao = $('#rowEditarCidadao_' + (id - 1)).attr("data-id");
    var nomeCidadao = $('#rowEditarCidadao_' + (id - 1)).attr("data-nome");
    var nis = $('#rowEditarCidadao_' + (id - 1)).attr("data-nis");


    $('#editarCidadao').modal('show');
    $('.modal .modal-dialog .modal-content .modal-header #nome-Cidadao').text("Editar o Cidadao " + nomeCidadao);
    $('.modal .modal-dialog .modal-content .modal-body #nome').val(nomeCidadao);
    $('.modal .modal-dialog .modal-content .modal-body #nis').val(nis);
    $('.modal .modal-dialog .modal-content .modal-body #id').val(idCidadao);


    // $('.modal .modal-dialog .modal-content .modal-body #nomeCidadao').val(nomeCidadao);

}


