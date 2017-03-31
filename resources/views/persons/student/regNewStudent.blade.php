@extends('app')
@section('content')
    <div class="row" style="text-align: center;">
        <nav>
            <ul class="pagination pg-teal">
                <!--Numbers-->
                <li class="page-item active" id="pag-personal"><a class="page-link">Personal</a></li>
                <li class="page-item" id="pag-academic"><a class="page-link" >Academico</a></li>
                <li class="page-item" id="pag-work"><a class="page-link" >Trabajo</a></li>

            </ul>
        </nav>
    </div>
    <form class="form-horizontal" method="post"
    action="{{url('regNewStudent/')}}"  id="regNewStudentForm">
        <button type="submit" class="btn btn-amber">Guardar</button>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="pag-personal">
            @include('persons.registerForm')
        </div>
        <div class="pag-academic" hidden>
            @include('persons.academicInfoForm')
        </div>
        <div class="pag-work" hidden>
            @include('persons.eworkInfoForm')
        </div>
    </form>

   
@endsection
@section('page-script')
    <script>
        var nwe=0;
        var nai=0;
        $('#birthDate').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
        //-----------Selects----------------
        $('#countries').on('change',function (e) {

            var country_id=e.target.value;

            $.get('/api/country/'+country_id,function (data) {
                $('#cities').empty();
                $('#provinces').append('<option disabled selected>Elegir un pais</option>');
                $.each(data,function (index, object) {
                    $('#cities').append('<option value="'+object.id+'">'+object.name+'</option>');
                })
            })
        }); //selects
        $('#departments').on('change',function (e) {

            var department_id=e.target.value;

            $.get('/api/provinces/'+department_id,function (data) {
                $('#provinces').empty();
                $('#provinces').append('<option disabled selected>Elegir una provincia</option>');
                $.each(data,function (index, object) {
                    $('#provinces').append('<option value="'+object.id+'">'+object.name+'</option>');
                })
            })
        });
        $('#originType').on('change',function (e) {

            var val=e.target.value;

            if(val=='N')
            {
                console.log("es n");

                $('#ig_countries').attr('hidden','true');
                $('#ig_cities').attr('hidden','true');

                $('#ig_departments').removeAttr('hidden');
                $('#ig_provinces').removeAttr('hidden');



            }
            else if(val=='E'){

                $('#ig_countries').removeAttr('hidden');
                $('#ig_cities').removeAttr('hidden');

                $('#ig_departments').attr('hidden','true');
                $('#ig_provinces').attr('hidden','true');
            }
            else{
                $('#ig_departments').attr('hidden','true');
                $('#ig_provinces').attr('hidden','true');
                $('#ig_countries').attr('hidden','true');
                $('#ig_cities').attr('hidden','true');
            }
        })
        
        //-----------Pagination-------------
        $('#pag-personal').on('click',function () {
            $('#pag-personal').addClass('active');
            $('#pag-academic').removeClass('active');
            $('#pag-work').removeClass('active');
            $('.'+$(this).attr('id')).removeAttr('hidden');
            $('.'+$(this).attr('id')).addClass('animated slideInLeft');
            $('.pag-academic').attr('hidden','true');
            $('.pag-work').attr('hidden','true');
        });
        $('#pag-academic').on('click',function () {
            $('#pag-academic').addClass('active');
            $('#pag-personal').removeClass('active');
            $('#pag-work').removeClass('active');
            $('.'+$(this).attr('id')).removeAttr('hidden');
            $('.'+$(this).attr('id')).addClass('animated slideInLeft');
            $('.pag-personal').attr('hidden','true');
            $('.pag-work').attr('hidden','true');
            if($('.academicInfoItem').length==0)
                addAIItem();
        });
        $('#pag-work').on('click',function () {
            $('#pag-work').addClass('active');
            $('#pag-academic').removeClass('active');
            $('#pag-personal').removeClass('active');
            $('.'+$(this).attr('id')).removeAttr('hidden');
            $('.'+$(this).attr('id')).addClass('animated slideInLeft');
            $('.pag-academic').attr('hidden','true');
            $('.pag-personal').attr('hidden','true');
            if($('.expWorkItem').length==0)
                addEWItem();
        });

        //-----------Person data-------------
        $('.personalInfo').on('change',function () {
            $('.personData').append(
                    $('#name').value+' '+$('#lastName').value+' '+$('#middleName').value
            );
        });

        //----------eWork data----------------
        $('#addEWItem').on('click',function () {
            addEWItem();
        });
        $('.btnDeleteEWItem').on('click',function () {
            nai--;
            $(this).closest('.card-block').remove()
        });
        function addEWItem () {
            nai++;
            $('#masterEWItem').clone(true,true).removeAttr('hidden').removeAttr('id').
            addClass('expWorkItem').attr('id','wi_'+nai).appendTo($('#workExperienceList'));

        $('#wi_'+nai).find('.lblInst').attr('for','institution_'+nai);
        $('#wi_'+nai).find('.inputInst').attr('id','institution_'+nai);
        $('#wi_'+nai).find('.inputInst').attr('name','institution[]');
        $('#wi_'+nai).find('.lblPos').attr('for','position_'+nai);
        $('#wi_'+nai).find('.inputPos').attr('id','position_'+nai);
        $('#wi_'+nai).find('.inputPos').attr('name','position[]');
        }
        //----------aInfo data----------------
        $('#addAIItem').on('click',function () {
            addAIItem();
        });
        $('.btnDeleteAIItem').on('click',function () {
            nwe--;
            $(this).closest('.card-block').remove()
        });
        function addAIItem () {
            nwe++;
            $('#masterAIItem').clone(true,true).removeAttr('hidden').removeAttr('id').
            addClass('academicInfoItem').appendTo($('#academicInfoList')).attr('id','academicInfoItem_'+nwe);
            $('#academicInfoItem_'+nwe).find('.dependenciesDivMax').attr('id','dependenciesDivMax_'+nwe);
            $('#academicInfoItem_'+nwe).find('.dependenciesDiv').attr('id','dependenciesDiv_'+nwe);
            $('#academicInfoItem_'+nwe).find('.dependencyId').attr('id','dependencyId_'+nwe);
            $('#academicInfoItem_'+nwe).find('.dependencies').attr('id','dependencies_'+nwe);
             $('#academicInfoItem_'+nwe).find('.lbl_gd').attr('for','graduationDegree_'+nwe);
             $('#academicInfoItem_'+nwe).find('.input_gd').attr('id','graduationDegree_'+nwe);
             $('#academicInfoItem_'+nwe).find('.input_gd').attr('name','graduationDegree[]');
             $('#academicInfoItem_'+nwe).find('.dependencyId').attr('name','dependencyId[]');

        }

        $(".dependencies").change(function () {
            var arr=$(this).closest('.dependenciesDivMax').attr('id').split('_');
             var ew=arr[1];
            var id=this.value;
            $('#dependenciesDiv_'+ew).empty();
            $('#dependenciesDiv_'+ew).show();
            $.get('api/dependencies/'+id,function (data) {
                if (data.length> 0)
                {
                    $('#dependenciesDiv_'+ew).append(
                            '<tr>'+
                            '<td><select class="dependencyChild_ew_'+ew+' form-control" id="'+id+'_dependency_ew_'+ew+'"> </select></div><td>' +
                            '<td><button class="btn btn-sm btn-amber deletelevel" type="button">Eliminar nivel</button><td>' +
                            '</tr>'


                    );

                    $('input[class=dependencyChild_ew_'+ew+']').empty();
                    $('#dependenciesDiv_'+ew).removeAttr('hidden');
                    $('#'+id+"_dependency_ew_"+ew).append('<option value="vacio" selected>Elegir opcion</option>');
                    $.each(data,function (index, object) {

                        $('#'+id+"_dependency_ew_"+ew).append('<option value="'+object.institution.id+'">'+object.institution.name+'</option>');
                    })
                }
                else
                {
                    if($('#dependenciesDiv_'+ew).children().length>0)
                    {
                        $('#dependencyId_'+ew).attr('value',$('#dependenciesDiv_'+ew+' tr:last-child').find('.dependencyChild').val());

                    }
                    else{
                        $('#dependencyId_'+ew).attr('value',$('#dependencies_'+ew).val());

                    }

                }

            })
        });
        $('.dependenciesDiv').on('change','select',function (e) {

            var arr=$(this).closest('.dependenciesDiv').attr('id').split('_');
            var ew=arr[1];
            var childId=this.value;

            $.get('api/dependencies/'+childId,function (data) {

                if(data.length>0)
                {
                    $('#dependenciesDiv_'+ew).show();
                    $('#dependenciesDiv_'+ew).append(
                    '<tr>'+
                    '<td><select class="dependencyChild_ew_'+ew+' form-control" id="'+childId+'_dependency_ew_'+ew+'"> </select></div><td>' +
                    '<td><button class="btn btn-sm btn-amber deletelevel" type="button">Eliminar nivel</button><td>' +
                    '</tr>'
                    );

                    var d=$("#"+childId+'_dependency_ew_'+ew);
                    d.empty();
                    d.append('<option disabled selected>Elegir opcion</option>');
                    $.each(data,function (index, object) {
                        d.append('<option value="'+object.institution.id+'">'+object.institution.name+'</option>');
                    })
                }
                else{

                    console.log(ew);
                    if($('#dependenciesDiv_'+ew).children().length>0)
                    {

                        $('#dependencyId_'+ew).attr('value',$('#dependenciesDiv_'+ew+' tr:last-child').find('.dependencyChild_ew_'+ew).val());

                    }
                    else{
                        $('#dependencyId_'+ew).attr('value',$('#dependencies_'+ew).val());

                    }

                }
            });
        });
        $('.dependenciesDiv').on('click','.deletelevel',function () {

            var par=$(this).parent('td').parent('tr').index();

            var dv=$(this).closest('.dependenciesDiv').attr('id').split('_')[1];
            console.log(dv);
            $('#dependenciesDiv_'+dv).children().slice(par).detach();
            if($('#dependenciesDiv_'+dv).children().length>0)
            {

                $('#dependencyId_'+dv).attr('value',$('#dependenciesDiv_'+dv+' tr:last-child').find('.dependencyChild_ew_'+dv).val());

            }
            else{

                $('#dependencyId_'+dv).attr('value',$('#dependencies_'+dv).val());

            }
        });

        $('.gd-di').on('click',function () {

            //<button type="button" class="btn btn-danger" id="gd-val">'+$(this).text()+'</button>
           $('#gd-val').remove();


        });


    </script>

@endsection

