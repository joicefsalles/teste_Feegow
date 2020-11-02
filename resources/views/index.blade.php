<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teste</title>
    <link rel="stylesheet" href="{{asset('site/bootstrap.css')}}">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col p-0">
                <div class="jumbotron-consulta">
                    <div class="container">
                        </br>
                        <div class="form-group row d-flex justify-content-center">
                            <label class="col-sm-2 col-form-label col-form-label-lg texto">Consulta de:</label>
                            <div class="col-sm-4">
                                <select class="form-control" id="consulta">
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" id="agendar" class="btn btn-success">AGENDAR</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center medicos-telas">
            <div class="col-4 medicos d-none">
                <div class="card mb-3 bg-light cursor-grab border  ">
                    <div class="card-body">
                        <div class="col">
                            <span id="img"></span>
                        </div>
                        <div class="col">
                            <span id="medico" class="nome-medico">
                            </span>
                            <span id="crm" class="crm"> </span>
                        </div>
                        </br>
                        <button type="submit" class="btn btn-success agendar_consulta" id_profissinal=""  id_especialidade="">AGENDAR</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container_medicos d-flex row"></div>
    </div>
</body>
<script src="{{asset('site/jquery.js')}}"></script>
<script src="{{asset('site/bootstrap.js')}}"></script>
<script src="{{asset('site/axios.js')}}"></script>
<script src="{{asset('site/assets/js/services/especialidades.js')}}"></script>
<script>
    $(document).ready(function() {
        selectConsulta('#consulta');
        $('#agendar').click(function() {
            var esp = $("#consulta").val();
            if (esp == 0) {
                alert("Escolhar uma especialidade");
            } else {
                especialidadeAgendar(esp);
            }

        });

        $(document).on('click','.agendar_consulta',function() {
            agendarConsulta($(this).attr('id_profissinal'),$(this).attr('id_especialidade'));

        });
    });
</script>

</html>