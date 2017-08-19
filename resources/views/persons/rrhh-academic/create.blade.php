@extends('app')
@section('content')
    <div class="card default-color-dark text-left z-depth-1">
        <div class="card-block">
            <div class="d-flex flex-row justify-content-around align-items-center">
                <div class="mr-auto p-2">
                    <h4 class="white-text">Formulario de designación</h4>
                </div>
                <div class="ml-auto p-2">
                    <label class="btn btn-cyan" for="designation-form-btn"><i class="fa fa-save left"></i> Guardar</label>
                </div>
            </div>
        </div>
    </div>
    <br>
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <strong>Error en el formulario!</strong> Verifique la información y los campos obligatorios
        </div>
    @endif

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a data-toggle="tab" class="active nav-link " aria-expanded="true" href="#program-selection">
                <h6><span class="badge default-color-dark">1</span> Seleccion de programa</h6>
            </a>
        </li>
        <li class="nav-item">
            <a data-toggle="tab" class="nav-link" href="#p-personal-data">
                <h6><span class="badge default-color-dark">2</span> Docente-Informacion personal</h6>
            </a>
        </li>
        <li class="nav-item">
            <a data-toggle="tab" class="nav-link" href="#p-studies-made">
                <h6><span class="badge default-color-dark">3</span> Docente-Estudios realizados</h6>
            </a>
        </li>
        <li class="nav-item">
            <a data-toggle="tab" class="nav-link" href="#p-work-experience">
                <h6><span class="badge default-color-dark">4</span> Docente-Experiencia Laboral</h6>
            </a>
        </li>
    </ul>
    <form method="post" id="designation-form" action="{{url('designation')}}" >
        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="tab-content">


            <div class="tab-pane fade" id="p-personal-data">
                <br>
                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="row justify-content-around">
                            <div class="col">
                                <div class="md-form">
                                    <input type="search" id="form-rrhh" class="form-control">
                                    <label for="form-rrhh" class="active">Buscar por C.I.</label>
                                </div>
                            </div>
                            <div class="col">
                                <button class="btn default-color-dark" id="person-search-btn"><i class="fa fa-search"></i></button>

                            </div>

                        </div>
                        <br>

                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="p-studies-made">
                <br>
                @include('persons.academicInfoForm')
            </div>
            <div class="tab-pane fade" id="p-work-experience">
                <br>
                @include('persons.eworkInfoForm')

            </div>
        </div>
        <input type="submit" id="designation-form-btn" hidden>
    </form>

@endsection
@section('page-script')

<script>

    var univL;
    var univI;
    $.get('/api/local-universities/',function (data) {
        univL=data;
    });
    $.get('/api/international-universities/',function (data) {
        univI=data;
    });
    $('.loc').on('change',function () {
        uVal=$(this).val();
        var rSelected=$(this);
        rSelected.closest('.card').find('.univSelect').empty();
        $(this).closest('.card').find('.univSelect').append('<option value="" selected disabled>Seleccionar una opcion</option>')
        if (uVal=='L')
        {
            $.each(univL, function (index, object) {

                rSelected.closest('.card').find('.univSelect').append('<option value="' + object.id + '">' + object.name + '</option>')
            });
        }
        else {
            $.each(univI, function (index, object) {
                rSelected.closest('.card').find('.univSelect').append('<option value="' + object.id + '">' + object.name + '</option>')
            });
        }
    });


</script>
@endsection