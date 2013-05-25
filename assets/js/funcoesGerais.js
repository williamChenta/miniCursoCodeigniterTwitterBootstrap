function acao(acao, frm, id) {

    if ($("#hdnAcao").val()!='alterar') {
        $("#hdnId").val(id);
    }

    $("#hdnAcao").val(acao);

    switch (acao) {
        case "excluir":
            if (confirm("Deseja realmente excluir?")) {
                $("#" + frm).submit();
            }
            else {
                $("#hdnId").val('');
                $("#hdnAcao").val('');
            }
            break;
        case "alterar":
            carregaCliente(id);
            break;
        default:
            $("#" + frm).submit();
            break;
    }
}

function carregaCliente(id) {
    $.ajax({
        type: "POST",
        url: "clientes/ajxCarregaCliente",
        data: {hdnId: id},
        dataType: "json",
        success: function(json) { //Se ocorrer tudo certo
            $("#hdnAcao").val('alterar');
            $("#hdnId").val(json.id);            
            $("#txtNome").val(json.nome);
            $("#txtEndereco").val(json.endereco);
            $("#txtTelefone").val(json.telefone);
        }
    });
}