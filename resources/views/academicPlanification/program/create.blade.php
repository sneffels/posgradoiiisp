@extends('app')

@section('content')
        <!--Nombre de programa-->

<ul class="nav nav-tabs">
    <li class="nav-item">
        <a data-toggle="tab" class="active nav-link " aria-expanded="true" href="#program-general-data">
            <h6><span class="badge indigo">1</span>  Datos generales</h6>
        </a>
    </li>
    <li class="nav-item">
        <a data-toggle="tab" class="nav-link" href="#program-modules">
            <h6><span class="badge indigo">2</span>  Definicion de modulos</h6>
        </a>
    </li>
    <li class="nav-item">
        <a data-toggle="tab" class="nav-link" href="#program-req">
            <h6><span class="badge indigo">3</span>  Definicion de requisitos</h6>
        </a>
    </li>
</ul>
<div class="tab-content">
    <div id="program-general-data" class="tab-pane fade in active show">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="form-group">
                    <label for="offers">Tipo de oferta</label>
                    <select class="form-control" id="offers" required>
                        <option selected disabled class="dummy">----- Seleccionar tipo de oferta -----</option>
                        @foreach($offers as $offer)
                            <option value="{{$offer->id}}">{{$offer->name}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label for="programId">Programa</label>
                    <select class="form-control" id="programId" required>
                        <option selected disabled class="dummy">----- Seleccionar programa -----</option>
                    </select>

                </div>
                <div class="md-form">
                    <i class="fa fa-hashtag prefix blue-grey-text"></i>
                    <label for="nroversion" data-error="incorrecto" data-sucess="correcto">Nro. version</label>
                    <input class="form-control" type="number" id="nroversion" required min="1">
                </div>
                        <div class="md-form">
                            <i class="fa fa-calendar-check-o prefix blue-grey-text"></i>
                            <label for="startDate">Fecha inicio</label>
                            <input class="form-control" type="text" id="startDate">
                        </div>
                        <div class="md-form">
                            <i class="fa fa-calendar-check-o prefix blue-grey-text"></i>
                            <label for="finishDate">Fecha finalizacion</label>
                            <input class="form-control" type="text" id="finishDate">
                        </div>
                <div class="d-flex justify-content-center">
                    <div class="p-2">
                        <button class=" btn btn-blue-grey btn-previous" disabled>Anterior</button>
                    </div>
                    <div class="p-2">
                        <button class=" btn btn-blue-grey btn-next">Siguiente</button>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <div id="program-modules" class="tab-pane fade">
        <div class="container">
            <div class="row justify-content-center">
                <div class="row justify-content-center">
                    <div class="col">
                        <br>
                        <div class="row">
                            <div class="col">
                                <div class="md-form">
                                    <i class="fa fa-hashtag prefix blue-grey-text"></i>
                                    <label for="nroModules">Nro de modulos</label>
                                    <input class="form-control" type="number" id="nroModules">
                                </div>
                            </div>
                            <div class="col">
                                <button class="btn btn-blue-grey btn-sm" id="addModules" disabled>Habilitar</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <th>Modulo</th>
                        <th>Fecha inicio</th>
                        <th>Fecha finalizacion</th>
                        <th>Horas presenciales (A)</th>
                        <th>Horas no presenciales (B)</th>
                        <th>Horas Academicas (A+B)</th>
                        <th>Creditos (A+B)/4</th>
                        </thead>
                        <tbody id="modulesList">

                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="p-2">
                        <button class=" btn btn-blue-grey btn-previous">Anterior</button>
                    </div>
                    <div class="p-2">
                        <button class=" btn btn-blue-grey btn-next">Siguiente</button>
                    </div>
                </div>


        </div>

    </div>
    </div>
    <div id="program-req" class="tab-pane fade">
        <div class="row justify-content-center">
            <div class="col-6">
                <table class="table">
                    <thead>
                        <th>Requerimientos</th>
                    </thead>
                    @foreach($requirements as $requirement)
                        <tr class="form-group">
                            <td>{{$requirement->name}}</td>
                            <td><input type="checkbox" id="checkbox1" name="req[]"></td>
                        </tr>
                    @endforeach
                </table>
                <div class="d-flex justify-content-center">
                    <div class="p-2">
                        <button class=" btn btn-blue-grey btn-previous">Anterior</button>
                    </div>
                    <div class="p-2">
                        <button class=" btn btn-blue-grey">Crear programa</button>
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>




@endsection
@section('page-script')
    <script>
        $('.btn-next').on('click',function () {
            $('.nav-tabs > li > .active').parent().next('li').find('a').trigger('click');

        });
        $('.btn-previous').on('click',function () {

            $('.nav-tabs > li > .active').parent().prev('li').find('a').trigger('click');

        });


        $('#startDate').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
        $('#finishDate').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
        //$('#startDateM').bootstrapMaterialDatePicker({ weekStart : 0, time: false });

        $('#finishDateM').bootstrapMaterialDatePicker({ weekStart : 0, time: false });

        $('#startDate').on('change',function () {


           if($('#modulesList > tr').length==0)
           {


               $('#startDateM').attr('readonly','readonly');
               $('#startDateM').val($('#startDate').val());
               $('#startDateM').focus();
           }
        });
        $('#offers').on('change',function () {

            $('#programId').empty();
            $('#programId').append('<option selected disabled>Programas</option>');
            $.get('/api/programByOffer/'+$(this).val(),function (data) {
                $.each(data, function (index, object) {

                    $('#programId').append('<option value="'+object.id+'">'+object.name+'</option>')
                });

            });
        });
        $('#programId').on('change',function () {
            $('#addModules').attr('disabled',false);
           $('#programNameAdd').text($("#programId option:selected").text());
            $('#modules').empty();
            $('#modules').append('<option selected disabled>'+'Modulos-'+$("#programId option:selected").text()+'</option>');
            $.get('/api/modules/'+$(this).val(),function (data) {
                $.each(data, function (index, object) {
                    $('#modules').append('<option value="'+object.id+'">'+object.name+'</option>')
                })
            })
        });
        $('#addModules').on('click',function () {

            // 5 5  5 lo que me pide
            // 0 1  2 menos lo que hay
            // 5  4 3 total for  append

           if($('#nroModules').val()>$('#modulesList > tr').length)
            {
                if($('#modulesList > tr').length>0)
                {
                    $('#modulesList tr:last-child').find('input[name="mFinishDate[]"]').val("").attr('readonly',false);
                }
                n=$('#nroModules').val()-$('#modulesList > tr').length;
                for (i=0; i<n;i++)
                {
                    $('#modulesList').append(
                            '<tr>'+
                            '<td style="width: 200px"><select class="form-control moduleSelect" name="module[]" class="mName">' +
                            '</td>'+
                            '<td><input class="form-control" name="mStartDate[]" ></td>'+
                            '<td><input class="form-control" name="mFinishDate[]" ></td>'+
                            '<td><input class="form-control" name="mClassroomWorkload[]" ></td>'+
                            '<td><input class="form-control" name="mResearchWorkload[]" ></td>'+
                            '<td><input class="form-control" name="mAcademicWorkload[]" readonly></td>'+
                            '<td><input class="form-control" name="mCredits[]" readonly></td>'+

                            '</tr>'
                    );
                }

                $('#modulesList tr:first-child').find('input[name="mStartDate[]"]').val($('#startDate').val()).attr('readonly',true);
                $('#modulesList tr:last-child').find('input[name="mFinishDate[]"]').val($('#finishDate').val()).attr('readonly',true);


                $.get('/api/modules/'+$('#programId').val(),function (data) {
                    $.each(data, function (index, object) {
                        $('.moduleSelect').append('<option value="'+object.id+'">'+object.name+'</option>')
                    })
                })
            }else if($('#nroModules').val()<$('#modulesList > tr').length)
            {
                $('#modulesList').children().slice($('#nroModules').val()).detach();
                $('#modulesList tr:last-child').find('input[name="mFinishDate[]"]').val($('#finishDate').val()).attr('readonly',true);
            }
            $('input[name="mStartDate[]"]').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
            $('input[name="mFinishDate[]"]').bootstrapMaterialDatePicker({ weekStart : 0, time: false });

        });

    </script>
@endsection