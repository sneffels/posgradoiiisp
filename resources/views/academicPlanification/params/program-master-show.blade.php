@extends('app')
@section('content')
    <h4>Programa:</h4>
    <h3>{{$program->name}}</h3>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a data-toggle="tab" class="active nav-link " aria-expanded="true" href="#programs">
                Modulos
            </a>
        </li>
        <li class="nav-item">
            <a data-toggle="tab" class="nav-link" href="#createProgram">
                Adicionar modulo
            </a>
        </li>
    </ul>

    <div class="tab-content">
        <div id="programs" class="tab-pane fade in active show">
            <div class="container">
                <table class="table">
                    <tbody>
                    @foreach($modules as $module)
                        <tr>
                            <td>{{$module->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div id="createProgram" class="tab-pane fade in active">
            <div class="container">
                <form class="form-horizontal" style="padding-top: 15px"
                      method="post" action="{{url('/module')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="md-form">
                        <input class="form-control" type="text" name="name" id="name">
                        <label for="name">Nombre</label>
                    </div>
                    <input hidden value="{{$program->id}}" name="program_id">
                    <button class="btn btn-success" type="submit">Adicionar</button>
                </form>
            </div>
        </div>
    </div>
@endsection