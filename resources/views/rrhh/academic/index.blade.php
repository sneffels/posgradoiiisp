@extends('app')
@section('content')
    <table class="table">
        <thead>
            <th>Nombres y Apellidos</th>
            <th>Descripcion</th>
            <th>Acciones</th>
            <th>Historial</th>
        </thead>
        <tbody>
            @foreach($academics as $academic)
                <tr>
                    <td>{{$academic->person->name.' '.$academic->person->lastName.' '.$academic->person->middleName}}</td>
                    <td>{{$academic->description}}</td>
                    <td> Acciones </td>
                    <td> <button class="btn btn-primary btn-sm">Historial</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection