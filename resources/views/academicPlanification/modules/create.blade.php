@extends('app')
@section('content')
    <div class="card card-block">
        <div class="card-title">
            <h3>Adicionar modulo</h3>
        </div>
        <div class="card-text">
            <form method="post" action="{{url('/versionModule')}}" id="versionModuleForm">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="row">
                    <div class="col">
                        <select class="form-control" id="programId" name="program_id">
                            <option value="prog" disabled>Programas</option>
                            @foreach($programs as $version)
                                <option value="{{$version->id}}" >{{$version->program->name.' - v.'.$version->nroVersion}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-control" id="modules" name="module_id">
                            <option value="dis" disabled>Modulos</option>
                            <option value="new">Nuevo modulo...</option>
                        </select>
                    </div>
                    <div class="col">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-blue-grey active">
                                <input value="A" type="radio" name="state" id="option1" autocomplete="off" checked onchange='$("#stateText").html("Este personal se encuentra [ACTIVO]");'>En progreso
                            </label>
                            <label class="btn btn-blue-grey">
                                <input value="I" type="radio" name="state" id="option2" autocomplete="off" onchange='$("#stateText").html("Este personal se encuentra [INACTIVO]");'>Finalizado
                            </label>

                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col">
                        <div class="md-form blue-grey-text">
                            <label for="startDate">Fecha de inicio</label>
                            <input class="form-control" type="text" id="startDate" name="startDate">
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-form blue-grey-text">
                            <label for="finishDate">Fecha de finalizacion</label>
                            <input class="form-control" type="text" id="finishDate" name="finishDate">
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-form blue-grey-text">
                            <label for="credits">Creditos</label>
                            <input class="form-control" type="number" min="1" id="credits" name="credits">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-deep-orange">Guardar</button>
            </form>

        </div>


    </div>
    <div>
        <table class="table">
            <thead>
            <th>Modulo</th>
            <th>Programa</th>
            <th>Estado</th>
            <th>Acciones</th>
            </thead>
            <tbody id="modulesList">
                @foreach($modules as $module)
                    <tr>
                        <td>{{$module->module->name}}</td>
                        <td>{{$module->version->program->name.' v.'.$module->version->nroVersion}}</td>
                        <td>{{$module->state}}</td>
                        <td>acciones</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="AddModule">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100" id="AddModule">Adicionar modulo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>Adicionar modulo para el programa de: </strong>
                    <p id="programName"></p>
                    <form method="post" id="add-form" class="form-horizontal"
                          action="{{url('/module')}}"
                    >
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="md-form">
                            <label for="moduleName">Nombre de modulo</label>
                            <input class="form-control" name="name" type="text" id="moduleName">
                        </div>
                        <input name="program_id" hidden value="">
                        <div class="pull-right row">
                            <button type="submit" class="btn btn-primary">Adicionar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('page-script')
    <script>
        $.ajaxSetup({
            type: 'POST',
            headers: { "cache-control": "no-cache" }
        });
        $('#startDate').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
        $('#finishDate').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
        var np=0;
        $('#programId').val("prog");
        $('#modules').val("dis");
        $('#programId').on('change',function () {
            $id=$(this).val();
            var $progId;
            $.get('/api/version/'+$id,function (data) {
                $progId=data.program_id;

                $.get('/api/modules/'+$progId,function (data) {
                    $('#modules').empty();
                    $('#modules').append('<option value="new">Nuevo modulo...</option>');
                    $.each(data,function (index, object) {
                        $('#modules').prepend('<option value="'+object.id+'">'+object.name+'</option>');
                    })
                    $('#modules').prepend('<option value="dis" disabled>Modulos</option>');
                    $('#modules').val('dis');
                })
            });


        });
        $('#modules').on('change',function () {

           if($(this).val()=="new")
           {
               var $progName;
               $.get('/api/version/'+$('#programId').val(),function (data) {
                   console.log(data.program_id);
                   $progName=data.program.name;
                   $('#programName').text($progName);
                   $('input[name="program_id"]').attr('value',data.program_id);
               });
               $('#addModal').modal('show');

           }
        });
        $('#add-form').submit(function (event) {
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: '/module',
                data: {
                    name:$('input[name="name"]').val(),
                    program_id:$('input[name="program_id"]').val(),
                    _token:$('input[name="_token"]').val()},
                    cache:false,
                    async:false

            });

            $id=$('#programId').val();
            var $progId;
            $.get('/api/version/'+$id,function (data) {
                $progId=data.program_id;
                    $.get('/api/modules/'+$progId,function (data) {
                    $('#modules').empty();
                    $('#modules').append('<option value="new">Nuevo modulo...</option>');
                    $.each(data,function (index, object) {
                        $('#modules').prepend('<option value="'+object.id+'">'+object.name+'</option>');
                    })
                    $('#modules').prepend('<option value="dis" disabled>Modulos</option>');
                    $('#modules').val('dis');
                });
            });

            $('#addModal').modal('hide');



        });
        $('#versionModuleForm').submit(function (event) {
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'versionModule',
                data: {
                    module_id: $('select[name="module_id"]').val(),
                    program_id: $('select[name="program_id"]').val(),
                    state: $('input[name="state"]').val(),
                    startDate: $('input[name="startDate"]').val(),
                    finishDate: $('input[name="finishDate"]').val(),
                    credits: $('input[name="credits"]').val(),
                    _token: $('input[name="_token"]').val()
                },
                cache: false

            });

            $('#modulesList').empty();
            $('#modulesList').fadeOut();
            $.get('/api/versionModules/', function (data) {
                $.each(data, function (index, object) {
                    $('#modulesList').append('<tr>'+
                            '<td>'+object.module.name+'</td>'+
                            '<td>'+object.version.program.name+'</td>'+
                            '<td>'+object.state+'</td>'+
                            '<td>acciones</td>'+
                            '</tr>');
                });

            });
            $('#modulesList').fadeIn();


        });




    </script>
@endsection