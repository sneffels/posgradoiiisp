@extends('app')
@section('content')
    <div class="card card-block">
        <div class="card-title">
            <h3>Inscripcion</h3>
        </div>
        <div class="card-text">
            <div class="row">
                <div class="col">
                    <select class="form-control" id="programId" name="program_id">
                        <option value="prog" disabled>Programas</option>
                        @foreach($programs as $version)
                            <option value="{{$version->id}}">{{$version->program->name.' - v.'.$version->nroVersion}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
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

                        <input value="" class="form-control" id="cName" type="text" disabled placeholder="Nombre">
                    </div>

                </div>
                <div class="col">
                    <div class="md-form">

                        <input value="" class="form-control" id="cLastName" type="text" disabled
                               placeholder="Apellido paterno">
                    </div>

                </div>
                <div class="col">
                    <div class="md-form">

                        <input value="" class="form-control" id="cMiddleName" type="text" disabled
                               placeholder="Apellido materno">
                    </div>
                    <input id="cId" name="cId" hidden value="">
                </div>
            </div>
            <div class="card-title">
                <h4>Requisitos</h4>
            </div>
            <div class="checkbox" id="enrollmentReq">

            </div>

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
            $.get('')
            $('#enrollmentReq').append('')
        });
    </script>
@endsection