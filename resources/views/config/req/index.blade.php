@extends('app')
@section('content')
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a data-toggle="tab" class="active nav-link " aria-expanded="true" href="#requirements">
                Requisitos generales
            </a>
        </li>
        <li class="nav-item">
            <a data-toggle="tab" class="nav-link" href="#createReq">
                Adicionar requisito
            </a>
        </li>
    </ul>

    <div class="tab-content">
        <div id="requirements" class="tab-pane fade in active show">
            <div class="container">
                <table class="table">
                    <tbody>
                    @foreach($req as $r)
                        <tr>
                            <td>{{$r->name}}</td>

                            <td>
                                <a class="teal-text" href="{{url('/req/edit/'.$r->id)}}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div id="createReq" class="tab-pane fade in active">
            <div class="container">
                <form class="form-horizontal" style="padding-top: 15px"
                      method="post" action="{{url('/requirements')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="md-form">
                        <input class="form-control" type="text" name="name" id="reqName">
                        <label for="reqName">Requisito</label>
                    </div>

                    <button class="btn btn-success" type="submit">Adicionar</button>
                </form>
            </div>
@endsection