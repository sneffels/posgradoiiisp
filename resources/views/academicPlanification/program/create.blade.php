@extends('app')

@section('content')
    <form class="form-horizontal" action="{{url('program')}}" method="post" style="text-align: center;">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="card text-center">
            <div class="card-header default-color-dark white-text">
                Datos del programa
            </div>
            <div class="card-block">

                <div class="md-form">
                    <div class="row">

                        <div class="col-8">
                            <select class="form-control" id="programId" name="programId">
                                <option disabled>Elegir programa</option>
                                @foreach($programs as $program)
                                    <option value="{{$program->id}}">{{$program->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">

                            <select class="form-control" id="state" name="state">
                                <option disabled>Estado</option>

                                <option value="A">En progreso</option>
                                <option value="I">Finalizado</option>

                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="md-form">
                                <label for="version">Numero de version</label>
                                <input type="number" name="version" id="version" class="form-control" min="1">
                            </div>
                        </div>
                        <div class="col">
                            <div class="md-form">
                                <label for="credits">Nro. de creditos</label>
                                <input type="number" name="credits" id="credits" class="form-control" min="1">
                            </div>
                        </div>
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
                    </div>

                </div>
            </div>

        </div>
        <div class="card text-center">
            <div class="card-header default-color-dark white-text">
                Designacion de coordinador
            </div>
            <div class="card-block">
                <div class="md-form">
                    <div class="row">
                        <div class="col-8" style="text-align: left">
                            <input class="form-control" type="text" placeholder="Buscar por CI" id="valSearchCoo">
                            <div>
                                <small>El coordinador debe estar previamente registrado</small>
                            </div>
                            <span class="red-text" id="errorCoo"></span>
                        </div>
                        <div class="col-4" style="text-align: left">
                            <a class="btn btn-primary" id="searchCoo"><i class="fa fa-search"></i></a>
                        </div>

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

            </div>

        </div>
        <div class="card text-center">
            <div class="card-header default-color-dark white-text">
                Definicion de pagos
            </div>
            <div class="card-block">
                <div class="row">
                    <div class="col">
                        <div class="md-form">
                            <label for="enrollPrice">Costo matricula</label>
                            <input type="number" name="enrollPrice" id="enrollPrice" class="form-control" min="1">
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-form blue-grey-text">

                            <label for="price">Costo del programa</label>
                            <input class="form-control" type="text" id="price" name="price">
                        </div>

                    </div>
                    <div class="col">
                        <div class="md-form blue-grey-text">

                            <label for="discountPrice">Costo al contado</label>
                            <input class="form-control" type="text" id="discountPrice" name="discountPrice">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card text-center">
            <div class="card-header default-color-dark white-text">
                Definicion de requisitos
            </div>
            <div class="card-block">

                @foreach($req as $r)
                    <div class="checkbox">
                        <label><input type="checkbox" name="req[]" value="{{$r->id}}">{{$r->name}}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <button class="btn btn-cyan" type="submit">
            Crear programa
        </button>
    </form>

@endsection
@section('page-script')
    <script>
        $('#startDate').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
        $('#finishDate').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
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


    </script>
@endsection