@extends('app')
@section('content')
    <div class="container">
        <h5>Programa: {{$course->version->program->name.' v.'.$course->version->nroVersion}}</h5>
        <h5>{{'Coordinacion del programa: '.$course->version->coo->person->name.' '.$course->version->coo->person->lastName.' '.$course->version->coo->person->middleName}}</h5>
        <h3>Modulo: {{$course->versionModule->module->name}}</h3>
        <h3>Paralelo {{$course->course}}</h3>

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
                    Paralelos
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
                    @foreach($course->enrollments as $enrollment)
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

                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection