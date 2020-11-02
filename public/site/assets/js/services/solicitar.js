function ajax_consulta() {
    var URLAJAX = '/api/solicitar';
    return axios.get(URLAJAX)
        .then((response) => {
            return response
        })
        .catch(function(err) {
            alert('erro, tente novamente, mais tarde.');
        });
}

function ajax_inserir_solicitar(data) {
    var URLAJAX = "/api/solicitar";
    return axios.post(URLAJAX, data).then((response) => {
        return response;
    });
}

function selectComoConheceu(ElementoSelect) {
    $(ElementoSelect).append($("<option />").val('0').text('Carregando...')).prop('disabled', true);
    ajax_consulta().then((response) => {
        $(ElementoSelect + " option[value='0']").remove();
        $(ElementoSelect).append($("<option />").val('').text('Como conheceu?  ')).prop('disabled', false);
        if (response.data.content) {
            $.each(response.data.content, function(index, value) {
                $(ElementoSelect).append($("<option />").val(value['origem_id']).text(value['nome_origem']));
            });
        }
    });
}

function inserirSolicitar() {
    dados = $("#form_solicitar").serialize();
    ajax_inserir_solicitar(dados)
        .then((response) => {

            msgvalidacao(' ', 'Sua solicitação foi enviada com sucesso');

            // window.location.href = "/";
        }).catch(function(err) {
            if (err.response['status'] == 422) {
                msg = montaMsgValidacao(err);
                msgvalidacao('Obrigatório', msg, 'ok');
                return false;
            }
            //alert("erro, tente novamente, mais tarde.");
            // return false;
        });
}


function telainicial() {
    window.location.href = "/";
}