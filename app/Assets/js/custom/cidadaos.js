
// Função para cadastrar Usuarios
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


