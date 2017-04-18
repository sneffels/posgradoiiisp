@extends('app')
@section('content')

    <div class="card card-block">
        <div class="card-title">

            <h3>Inscripcion</h3>
        </div>
        <div class="card-text">
            <form method="post" action="{{url('enrollment')}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <h5 class="card-header default-color-dark white-text text-center">Datos del estudiante</h5>

                <div class="row">
                    <div class="col-8" style="text-align: left">
                        <input class="form-control" type="text" placeholder="Buscar estudiante por CI" id="valSearchCoo">
                        <div>
                            <small>El estudiante debe estar previamente registrado <a href="{{url('regNewStudent')}}">Registrar</a>
                            </small>
                        </div>
                        <span class="red-text" id="errorCoo"></span>
                    </div>
                    <div class="col-4" style="text-align: left">
                        <a class="btn btn-primary" id="searchCoo"><i class="fa fa-search"></i></a>
                    </div>


                </div>
                <div class="row">
                    <div class="col">
                        <div class="md-form">

                            <input value=""  class="form-control blue-grey-text h5 " id="cName" type="text" disabled placeholder="Nombre">
                        </div>

                    </div>
                    <div class="col">
                        <div class="md-form">

                            <input value="" class="form-control blue-grey-text h5" id="cLastName" type="text" disabled
                                   placeholder="Apellido paterno">
                        </div>

                    </div>
                    <div class="col">
                        <div class="md-form">

                            <input value="" class="form-control blue-grey-text h5" id="cMiddleName" type="text" disabled
                                   placeholder="Apellido materno">
                        </div>
                        <input id="cId" name="cId" hidden value="">
                    </div>
                </div>
                <hr class="my-4">
                <h5 class="card-header default-color-dark white-text text-center">Datos del programa</h5>
                <div class="row">

                    <div class="col">
                        <select class="form-control" id="programId" name="program_id">
                            <option value="prog" disabled selected>Programas</option>
                            @foreach($programs as $version)
                                <option value="{{$version->id}}">{{$version->program->name.' - v.'.$version->nroVersion}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <div class="md-form">
                            <label for="obs">Observaciones</label>
                            <textarea id="obs" name="obs" class="md-textarea" type="textarea"></textarea>
                        </div>
                    </div>
                </div>
                <hr class="my-4">

                <div>
                    <h5 class="card-header default-color-dark white-text text-center">Datos del modulo y paralelo iniciales</h5>
                    <div class="row">
                        <div class="col">
                            <div class="md-form">
                                <select id="moduleStart" class="form-control" name="module_id">
                                    <option>Modulo 1</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="md-form">
                                <select id="courseStart" class="form-control" name="course_id">
                                    <option>Paralelo 1</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-blue-grey active">
                                    <input value="A" type="radio" name="type" id="option1" autocomplete="off" checked onchange='$("#stateText").html("Este personal se encuentra [ACTIVO]");'>Nuevo
                                </label>
                                <label class="btn btn-blue-grey">
                                    <input value="I" type="radio" name="type" id="option2" autocomplete="off" onchange='$("#stateText").html("Este personal se encuentra [INACTIVO]");'>Repitente
                                </label>

                            </div>
                        </div>

                    </div>



                </div>
                <hr class="my-4">
                <h5 class="card-header default-color-dark white-text text-center">Requisitos presentados</h5>
                <div class="container-fluid">
                    <div class="checkbox" id="enrollmentReq">
                    </div>
                </div>

                <div style="text-align: right">
                    <button class="btn btn-success" type="submit" id="enrollmentButton">Inscribir</button>
                </div>
            </form>



        </div>

    </div>
@endsection
@section('page-script')
    <script>
        $('#searchCoo').on('click', function () {
            var cooCi = $('#valSearchCoo').val();

            $.get('api/person/' + cooCi, function (data) {

                if (data.length > 0) {
                    $('#errorCoo').html("");

                    $('#cName').val(data[0].name);
                    $('#cLastName').val(data[0].lastName);
                    $('#cMiddleName').val(data[0].middleName);
                    $('#cId').val(data[0].id);


                }
                else {

                    $('#errorCoo').html("El C.I. no existe");
                    $('#cName').val("");
                    $('#cLastName').val("");
                    $('#cMiddleName').val("");
                    $('#cId').val("");


                }
            });
        });





    $('#programId').on('change',function () {

        $('#enrollmentReq').empty();

        $.get('/api/reqByProgram/'+$(this).val(),function (data) {
            $.each(data,function (index,object) {$('#enrollmentReq').append(' <label><input type="checkbox" name="reqEnrollment[]" value="'+object.req.id+'">'+object.req.name+   '</label>')
            });
        });
        $.get('/api/versionModules/'+$(this).val(),function (data) {
            $('#moduleStart').empty();
            $('#moduleStart').append('<option value="">Modulos</option>');
            $.each(data,function (index, object) {

                $('#moduleStart').append('<option value='+object.id+'>'+object.module.name+'</option>')
            })
        });


    });
        $('#moduleStart').on('change',function () {
            $('#courseStart').empty();
            $('#courseStart').append('<option value="">Paralelos</option>');
            $.get('/api/coursesByModule/'+$(this).val(),function (data) {
               $.each(data,function (index,object) {
                   $('#courseStart').append('<option value="'+object.id+'">'+object.course+'</option>')
               })
            });

        });

</script>
@endsection