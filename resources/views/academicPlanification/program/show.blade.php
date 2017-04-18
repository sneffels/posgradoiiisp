@extends('app')
@section('content')
    <div class="container">
        <h3>{{$version->program->name.' v.'.$version->nroVersion}}</h3>
        <h5>{{'Coordinacion: '.$version->coo->person->name.' '.$version->coo->person->lastName.' '.$version->coo->person->middleName}}</h5>
    </div>


    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a data-toggle="tab" class="active nav-link " aria-expanded="true" href="#allStudents">
                    Todos los estudiantes
                </a>
            </li>
            <li class="nav-item">
                <a data-toggle="tab" class="nav-link" href="#studentsByCourse">
                Modulos
                </a>
            </li>
        </ul>
    </div>
    <div class="tab-content">
        <div id="allStudents" class="tab-pane fade in active show">
            <div class="container">
                <table class="table">
                    <thead>
                        <th>Apellidos Paterno</th>
                        <th>Apellidos Materno</th>
                        <th>Nombres</th>
                        <th>Carnet de Identidad</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        @foreach($version->enrollments as $enrollment)
                            <tr>
                                <td>{{$enrollment->student->lastName}}</td>
                                <td>{{$enrollment->student->middleName}}</td>
                                <td>{{$enrollment->student->name}}</td>
                                <td>{{$enrollment->student->personalId}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div id="studentsByCourse" class="tab-pane fade in active">
            <div class="container">
                <table class="table table-hover">
                    <tbody>
                    @foreach($version->versionModules as $module)
                        <tr >
                            <td>
                                <a class="black-text" href="{{url('module/'.$module->id)}}">
                                    {{$module->module->name}}
                                </a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection