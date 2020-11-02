<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teste</title>
    <link rel="stylesheet" href="{{asset('site/bootstrap.css')}}">
</head>

<body>
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-center">
                <h2>Preencha seus Dados</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="jumbotron jumbotron-fluid ">
                <form id="form_solicitar">
                    <div class="form-row d-flex justify-content-center">
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" id="nome_paciente" name="nome" placeholder="Nome Completo">
                        </div>
                        <div class="form-group col-md-4">
                            <select class="form-control" id="como_conheceu" name="id_origem">
                            </select>
                        </div>
                    </div>
                    <div class="form-row d-flex justify-content-center">
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" id="nascimento_paciente" name="nascimento" placeholder="Nascimento">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" id="CPF_paciente" name="CPF" placeholder="CPF">
                        </div>
                    </div>
                    <div class="form-row d-flex justify-content-center">
                        <button class="btn btn-success" type="button" onClick="inserirSolicitar()">SOLICITAR HORÁRIOS</button>
                    </div>
                    <input type="hidden" class="form-control" id="id_profissinal" name="id_profissinal">
                    <input type="hidden" class="form-control" id="id_especialidade" name="id_especialidade">
                </form>
            </div>
        </div>
    </div>
    <div id="modalAlert">
        
    </div>
    </div>

</body>
<script src="{{asset('site/jquery.js')}}"></script>
<script src="{{asset('site/bootstrap.js')}}"></script>
<script src="{{asset('site/axios.js')}}"></script>
<script src="{{asset('site/assets/js/services/functionsGlobal.js')}}"></script>
<script src="{{asset('site/assets/js/services/solicitar.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.min.js"> </script>
<script>
    selectComoConheceu('#como_conheceu');
    $("#nascimento_paciente").mask("99/99/9999");
    $("#CPF_paciente").mask("999.999.999-99");
    $("#id_profissinal").val(JSON.parse(sessionStorage.getItem('id_profissinal')));
    $("#id_especialidade").val(JSON.parse(sessionStorage.getItem('id_especialidade')));
</script>

</html>