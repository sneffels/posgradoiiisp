@extends('app')
@section('content')
    <div class="card card-block">
        <div class="card-title">
            <h3>Adicionar paralelo</h3>
        </div>
        <div class="card-text">
            <form method="post" action="{{url('/versionModule')}}" id="versionModuleForm">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
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
                        <select class="form-control" id="modules" name="module_id">
                            <option value="dis" disabled>Modulos</option>

                        </select>
                    </div>
                    <div class="col">
                        <div class="md-form blue-grey-text">
                            <label for="course">Codigo paralelo</label>
                            <input class="form-control" type="text" id="course" name="course">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8" style="text-align: left">
                        <div class="md-form">
                            <label for="valSearchCoo">Docente de paralelo (buscar C.I.)</label>
                            <input class="form-control" type="text" id="valSearchCoo">
                        </div>

                        <div>
                            <small>El coordinador debe estar previamente registrado</small>
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

                            <input class="form-control" id="cName" type="text" disabled placeholder="Nombre">
                        </div>

                    </div>
                    <div class="col">
                        <div class="md-form">

                            <input class="form-control" id="cLastName" type="text" disabled placeholder="Apellido paterno">
                        </div>

                    </div>
                    <div class="col">
                        <div class="md-form">

                            <input class="form-control" id="cMiddleName" type="text" disabled
                                   placeholder="Apellido materno">
                        </div>
                        <input id="cId" name="cId" hidden value="">
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
            <th>Paralelo</th>
            <th>Programa</th>
            <th>Docente</th>
            <th>Acciones</th>
            </thead>
            <tbody id="coursesList">
            @foreach($courses as $course)
                <tr>
                    <td>{{$course->versionModule->module->name}}</td>
                    <td>{{$course->course}}</td>

                    <td class="blue-grey-text"><em>{{$course->version->program->name.' v.'.$course->version->nroVersion}}</em></td>

                    <td>{{$course->professor->person->name.' '.$course->professor->person->lastName.' '.$course->professor->person->middleName}}</td>
                    <td>acciones</td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>




@endsection
@section('page-script')
    <script>

        $.ajaxSetup({
            type: 'POST',
            headers: {"cache-control": "no-cache"}
        });

        $('#programId').on('change', function () {
            $id = $(this).val();


            $.get('/api/versionModules/' + $id, function (data) {
                $('#modules').empty();

                $.each(data, function (index, object) {
                    $('#modules').prepend('<option value="' + object.id + '">' + object.module.name + '</option>');
                })
                $('#modules').prepend('<option value="dis" disabled>Modulos</option>');
                $('#modules').val('dis');
            })


        });
        $('#searchCoo').on('click', function () {
            var cooCi = $('#valSearchCoo').val();

            $.get('api/academicRRHHById/' + cooCi, function (data) {
                console.log(cooCi);
                if (data.length > 0) {
                    $('#errorCoo').html("");
                    $.each(data, function (index, object) {
                        $('#cName').val(object.person.name);
                        $('#cLastName').val(object.person.lastName);
                        $('#cMiddleName').val(object.person.middleName);
                        $('#cId').val(object.id);

                    });
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

        $('#versionModuleForm').submit(function (event) {
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'course',
                data: {
                    module_id: $('select[name="module_id"]').val(),
                    program_id: $('select[name="program_id"]').val(),
                    course: $('input[name="course"]').val(),
                    professor_id: $('input[name="cId"]').val(),
                    _token: $('input[name="_token"]').val()
                },
                cache: false,
                async:false

            });

            $('#coursesList').empty();
            $('#coursesList').fadeOut();
            $.get('/api/courses/', function (data) {
                $.each(data, function (index, object) {
                    $('#coursesList').append('<tr>' +
                            '<td >' + object.version_module.module.name+ '</td>' +
                            '<td> ' + object.course + '</td>' +
                            '<td class="blue-grey-text"><em>' + object.version.program.name +' v.'+object.version.nroVersion+'</em></td>' +
                            '<td>' + '</td>' +
                            '<td></td>' +
                            '</tr>');
                });

            });
            $('#coursesList').fadeIn();


        });


    </script>
@endsection