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
    <script type="text/javascript" src="style\js\registerForm.js">
    </script>
@endsection

