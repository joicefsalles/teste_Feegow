function msgvalidacao(title, msg) {
    if (title === 'Obrigatório') {
        modal = '<div class="modal fade menssage" id="popupMensagem" tabindex="-1" role="dialog" aria-labelledby="popupHomeLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">' + title + '</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button> </div><div class="modal-body">' + msg + '</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button></div></div></div></div>';
    } else {
        modal = '<div class="modal fade menssage" id="popupMensagem" tabindex="-1" role="dialog" aria-labelledby="popupHomeLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">' + title + '</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button> </div><div class="modal-body">' + msg + '</div><div class="modal-footer"><button type="button"  class="btn btn-success" data-dismiss="modal"  onclick="telainicial()" >Ok</button></div></div></div></div>';
    }
    // popupMensagem
    $('#modalAlert').html(modal);
    $('#popupMensagem').modal();

}


function montaMsgValidacao(err) {
    var msg = "";
    if (err.response.data.errors) {
        for (erros in err.response.data.errors) {
            msg += err.response.data.errors[erros][0] + "<br>";
        }
        return msg;
    }
}