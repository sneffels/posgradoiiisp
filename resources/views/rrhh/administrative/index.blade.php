@extends('app')
@section('content')
    <table class="table">
        <thead>
        <th>Nombres y Apellidos</th>
        <th>Descripcion</th>
        <th>Acciones</th>

        </thead>
        <tbody>
        @foreach($administratives as $administrative)
            <tr>
                <td>{{$administrative->person->name.' '.$administrative->person->lastName.' '.$administrative->person->middleName}}</td>
                <td>{{$administrative->description}}</td>
                <td> Acciones </td>

            </tr>
        @endforeach
        </tbody>
    </table>
@endsection