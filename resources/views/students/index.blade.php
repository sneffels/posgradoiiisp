@extends('app')
@section('content')
    <h4>Estudiantes</h4>
    <table class="table">
        <thead>
        <th>Apellido paterno</th>
        <th>Apellido materno</th>
        <th>Nombres</th>
        <th>C.I.</th>
        <th>Acciones</th>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{$student->lastName}}</td>
                    <td>{{$student->middleName}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->personalId}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection