@extends('app')
@section('content')
        <div class="row">
            <div class="col-md-9">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a data-toggle="tab" class="active nav-link " aria-expanded="true" href="#institutions">
                            Instituciones
                        </a>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="tab" class="nav-link" href="#createInstitution">
                            Adicionar institucion
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="institutions" class="tab-pane fade in active show">
                        <div class="container">
                            <table class="table">
                                <tbody>

                                @foreach($institutions as $institution)
                                    <tr>
                                        <td>{{$institution->name}}</td>
                                        <td>{{$institution->dependencyState}}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="createInstitution" class="tab-pane fade in active">
                        <div class="container">
                            <form class="form-horizontal" style="padding-top: 15px"
                                  action="{{url('institution/')}}" method="post" id="instAcademicForm">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="md-form">
                                    <input class="form-control" type="text" name="name">
                                    <label for="name">Nombre</label>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <select class="form-control" id="type" name="institutionTypeId">

                                            @foreach($types as $type)
                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" id="countries" name="countryId">
                                            <option>Elegir un pais</option>
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" id="cities" name="cityId">
                                            <option>Elegir un ciudad</option>

                                        </select>
                                    </div>
                                </div>

                                <p>Esta institucion es dependiente?</p>
                                <div class="custom-controls-stacked">
                                    <label class="custom-control custom-radio">
                                        <input name="dependencyState" type="radio" class="custom-control-input" value="0">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Es dependiente</span>
                                    </label>
                                    <label class="custom-control custom-radio">
                                        <input name="dependencyState" type="radio" class="custom-control-input" value="1">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Es independiente</span>
                                    </label>
                                </div>

                                <div id="dependenciesDivMax" hidden>
                                    <select class="form-control" id="dependencies">

                                    </select>
                                </div>
                                <div id="dependenciesDiv" hidden>

                                </div>

                                <input hidden id="dependencyId" value="0" name="dependencyId">
                                <button class="btn btn-primary" type="submit">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 animated slideInDown">
                <div class="card text-center">
                    <div class="card-header default-color-dark white-text">
                        Tipos de instituciones
                    </div>
                    <div class="card-block">
                        <table class="table">
                            <tbody>
                            @foreach($types as $type)
                                <tr>
                                    <td>
                                        <p> {{$type->name}}</p>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                            <a data-toggle="modal" data-target="#addModal" class="btn btn-default">
                                Adicionar tipo
                            </a>
                    </div>
                </div>
            </div>

    </div>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="AddType">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100" id="AddType">Adicionar tipo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="add-form" class="form-horizontal"
                    action="{{url('/institutiontype')}}"
                    >
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="md-form">
                            <label for="typeName">Tipo de institucion</label>
                            <input class="form-control" name="name" type="text" id="typeName">
                        </div>
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
       $('#countries').on('change',function (e) {

           var country_id=e.target.value;

           $.get('/api/country/'+country_id,function (data) {
               $('#cities').empty();
               $('#cities').append('Elegir un pais');
               $.each(data,function (index, object) {
                    $('#cities').append('<option value="'+object.id+'">'+object.name+'</option>');
               })
           })
       });
       $('#dependenciesDiv').on('change','select',function (e) {


             var childId=this.value;


            $.get('api/dependencies/'+childId,function (data) {

            if(data.length>0)
            {
                $('#dependenciesDiv').show();
                $('#dependenciesDiv').append(
                        '<tr>' +
                        '<td><select class="dependencyChild form-control" id="'+childId+'_dependency"> </select><td>' +
                        '<td><button class="btn btn-sm btn-amber deletelevel">Eliminar nivel</button><td>'  +
                        '</tr>'
                    );

                    var d=$("#"+childId+"_dependency");
                    d.empty();
                    d.append('<option value="vacio" selected>Elegir opcion</option>');
                    $.each(data,function (index, object) {
                    d.append('<option value="'+object.institution.id+'">'+object.institution.name+'</option>');
                    })
            }
            else{

            //$('#dependencyId').attr('value',$('#dependenciesDiv select:last-child').val());
            }


            });
       });

       $('input[name="dependencyState"]').change(function () {
            if(this.value=="0")
            {
                $('#dependenciesDivMax').removeAttr('hidden');
                $('#dependenciesDivMax').show();
                country=$('#countries').val();
                city=$('#cities').val();
                $.get('/api/independents/'+country+'/'+city,function (data) {
                    $('#dependencies').empty();
                    $('#dependencies').append('<option value="vacio" selected>Elegir opcion</option>');
                    $.each(data,function (index, object) {
                        $('#dependencies').append('<option value="'+object.id+'">'+object.name+'</option>');
                    })
                })

            }
            else {
                $('#dependenciesDivMax').hide();
                $('#dependenciesDiv').hide();

            }
        });
       $("#dependencies").change(function () {
           var id=this.value;

           $('#dependenciesDiv').empty();
           $('#dependenciesDiv').show();
           $.get('api/dependencies/'+id,function (data) {
               if (data.length> 0)
               {
                   $('#dependenciesDiv').append(
                           '<tr>'+
                           '<td><select class="dependencyChild form-control" id="'+id+'_dependency"> </select></div><td>' +
                           '<td><button class="btn btn-sm btn-amber deletelevel" type="button">Eliminar nivel</button><td>' +
                           '</tr>'


                   );

                   $('input[class=dependencyChild]').empty();
                   $('#dependenciesDiv').removeAttr('hidden');
                   $('#'+id+"_dependency").append('<option value="vacio" selected>Elegir opcion</option>');
                   $.each(data,function (index, object) {

                       $('#'+id+"_dependency").append('<option value="'+object.institution.id+'">'+object.institution.name+'</option>');
                   })
               }
               else
               {
                   //$('#dependencyId').attr('value',0);

               }

           })
       });

        $('#dependenciesDiv').on('click','.deletelevel',function () {
            var par=$(this).parent('td').parent('tr').index();
            $('#dependenciesDiv').children().slice(par).detach();
        });

        $('#instAcademicForm').submit(function () {
            if($('#dependenciesDiv').children().length>0)
            {
                $('#dependencyId').attr('value',$('#dependenciesDiv tr:last-child').find('.dependencyChild').val());
                return;
            }
            else{
                $('#dependencyId').attr('value',$('#dependencies').val());
                return;
            }



        });
    </script>
@endsection