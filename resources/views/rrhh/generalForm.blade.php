@extends('app')
@section('content')
    <form class="form-horizontal" method="post"
          action="{{url('regNewRRHH/')}}"  id="regNewStudentForm" enctype="multipart/form-data"
    >
        <div class="card text-center z-depth-2"
        style="margin-bottom: 20px"
        >
            <div class="card-block">
                <div class="row " style="text-align: center;">
                    <div class="col">
                        <nav>
                            <ul class="pagination pg-teal">
                                <!--Numbers-->
                                <li class="page-item active" id="pag-personal"><a class="page-link">Personal</a></li>
                                <li class="page-item" id="pag-academic"><a class="page-link" >Academico</a></li>
                                <li class="page-item" id="pag-work"><a class="page-link" >Experiencia Laboral</a></li>
                                <li class="page-item" id="pag-rrhh"><a class="page-link">Recursos humanos</a></li>


                            </ul>
                        </nav>
                    </div>
                    <div class="col" style="text-align: right">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save left"></i>
                            Guardar todo el registro</button>
                    </div>

                </div>
            </div>
        </div>

        <div id="errors">
            @if ($errors->any())
                {{ implode('', $errors->all('<div>:message</div>')) }}
            @endif

        </div>

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
        <div class="pag-rrhh" hidden>
            @include('rrhh.rrhhForm')
        </div>
    </form>


@endsection
@section('page-script')
    <script type="text/javascript" src="style\js\registerForm.js">

    </script>

    <script>
        $('#startDate').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
        $('#pag-rrhh').on('click',function () {
            $('#pag-rrhh').addClass('active');
            $('#pag-academic').removeClass('active');
            $('#pag-work').removeClass('active');
            $('#pag-personal').removeClass('active');
            $('.'+$(this).attr('id')).removeAttr('hidden');
            $('.'+$(this).attr('id')).addClass('animated slideInLeft');
            $('.pag-academic').attr('hidden','true');
            $('.pag-work').attr('hidden','true');
            $('.pag-personal').attr('hidden','true');
        });
        $('#pag-personal').on('click',function () {
            $('#pag-rrhh').removeClass('active');
            $('.pag-rrhh').attr('hidden','true');
        });
        $('#pag-academic').on('click',function () {
            $('#pag-rrhh').removeClass('active');
            $('.pag-rrhh').attr('hidden','true');
        });
        $('#pag-work').on('click',function () {
            $('#pag-rrhh').removeClass('active');
            $('.pag-rrhh').attr('hidden','true');
        })


    </script>

@endsection