@extends('app')
@section('content')
    <div class="row">

        <a class="btn btn-primary" href="{{url('program')}}">Crear programa</a>

    </div>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th>Programa</th>
                    <th>Estado</th>
                    <th>Administracion</th>
                </tr>
            </thead>
            <tbody>
            @foreach($versions as $version)

                <tr>
                <td>{{$version->program->name}}</td>
                <td>
                    @if($version->state ='A')
                        {{"En progreso"}}
                    @else
                        {{"Finalizado"}}
                    @endif

                </td>
                <td>
                    <a class="blue-text"><i class="fa fa-user"></i></a>
                    <a class="teal-text"><i class="fa fa-pencil"></i></a>
                    <a class="red-text"><i class="fa fa-times"></i></a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>


    </div>
@endsection
