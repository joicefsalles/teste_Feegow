function ajax_consulta() {
    var URLAJAX = '/api/especialidades';
    return axios.get(URLAJAX)
        .then((response) => {
            return response
        })
        .catch(function(err) {
            alert('erro, tente novamente, mais tarde.');
        });
}

function ajax_agendar(id) {
    var URLAJAX = "/api/especialidades/" + id;
    return axios.get(URLAJAX, id)
        .then((response) => {
            return response
        })
        .catch(function(err) {
            alert('erro, tente novamente, mais tarde.');
        });
}

function agendarConsulta(id_profissinal, id_especialidade) {
    sessionStorage.clear();
    sessionStorage.setItem("id_profissinal", JSON.stringify(id_profissinal));
    sessionStorage.setItem("id_especialidade", JSON.stringify(id_especialidade));
    window.location.href = "/agendamento";

}



function selectConsulta(ElementoSelect) {
    $(ElementoSelect).append($("<option />").val('0').text('Carregando...')).prop('disabled', true);
    $('#agendar').prop('disabled', true);
    ajax_consulta().then((response) => {
        $(ElementoSelect + " option[value='0']").remove();
        $('#agendar').prop('disabled', false);
        $(ElementoSelect).append($("<option />").val('0').text('Selecionar')).prop('disabled', false);
        if (response.data.content) {
            $.each(response.data.content, function(index, value) {
                $(ElementoSelect).append($("<option />").val(value['especialidade_id']).text(value['nome']));
            });
        }
    });
}


function especialidadeAgendar(id) {
    $('#agendar').text('Carregando...').prop('disabled', true);
    ajax_agendar(id).then((response) => {
        $('#agendar').text('AGENDAR').prop('disabled', false);
        if (response.data.content) {
            $(".container_medicos").html('');
            $.each(response.data.content, function(index, value) {
                var medicos = $(".medicos").eq(0).clone().removeClass('d-none');
                if (value.foto == null) {
                    medicos.find(".card").find(".card-body").find("#img").html('<img src="http://127.0.0.1:8000/site/img/sem.jpg"    width="70" height="70" class="rounded-circle" alt="Avatar"></img>');
                } else {
                    medicos.find(".card").find(".card-body").find("#img").html('<img src="' + value.foto + '" width="70" height="70" class="rounded-circle" alt="Avatar"></img>');
                }

                if (value.sexo == "Feminino") {
                    medicos.find(".card").find(".card-body").find("#medico").text("Dra." + value.nome);
                } else {
                    medicos.find(".card").find(".card-body").find("#medico").text("Dr." + value.nome);
                }
                if (value.especialidades[0].CBOS == null) {
                    medicos.find(".card").find(".card-body").find("#crm").text("CRM" + value.especialidades[0].CBOS);
                } else {
                    medicos.find(".card").find(".card-body").find("#crm").text('');
                }
                medicos.find(".card").find(".card-body").find(".agendar_consulta").attr('id_profissinal', value.profissional_id);
                medicos.find(".card").find(".card-body").find(".agendar_consulta").attr('id_especialidade', value.especialidades[0].especialidade_id);

                $(".container_medicos").append(medicos);
            });

        }
    });
}