@extends('app')
@section('content')
    <div class="row">
        <div class="col-4 animated slideInDown">
            <div class="card text-center">
                <div class="card-header purple darken-4 white-text">
                    Tipos de ofertas academicas
                </div>
                <div class="card-block">
                    <table class="table">
                        <tbody>
                        @foreach($offers as $offer)
                            <tr>
                                <td>
                                    <p> {{$offer->name}}</p>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <a data-toggle="modal" data-target="#addModal" class="btn btn-secondary">
                        Adicionar tipo de oferta
                    </a>
                </div>
            </div>
        </div>


        <div class="col-8">

                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a data-toggle="tab" class="active nav-link " aria-expanded="true" href="#programs">
                            Programas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="tab" class="nav-link" href="#createProgram">
                            Adicionar programa
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                <div id="programs" class="tab-pane fade in active show">
                    <div class="container">
                        <table class="table">
                            <tbody>
                            @foreach($programs as $program)
                <tr>
                                    <td>{{$program->name}}</td>
                                    <td>{{$program->offer->name}}</td>
                                    <td>
                                        <a class="teal-text" href="{{url('/program/edit/'.$program->id)}}">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div id="createProgram" class="tab-pane fade in active">
        <div class="container">
            <form class="form-horizontal" style="padding-top: 15px"
                  method="post" action="{{url('/programMaster')}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="md-form">
                                <input class="form-control" type="text" name="programName" id="programName">
                                <label for="programName">Nombre</label>
                            </div>
                            <div class="md-form input-group">
                                <select class="form-control" id="type" name="offerId">

                                    @foreach($offers as $offer)
                <option value="{{$offer->id}}">{{$offer->name}}</option>
                                    @endforeach
                </select>
            </div>
            <button class="btn btn-success" type="submit">Adicionar</button>
        </form>
    </div>
</div>
</div>
        </div>



    </div>




    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="AddOffer">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100" id="AddOffer">Adicionar oferta</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="add-form" class="form-horizontal"
                          action="{{url('/paramsAcademicPlanning')}}"
                    >

                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="md-form">
                            <label for="offerName">Oferta académica</label>
                            <input class="form-control" name="name" type="text" id="offerName" required>
                        </div>
                        <div class="md-form">
                            <label for="workload">Minimo horas academicas</label>
                            <input class="form-control" name="workload" type="number" id="workload" required>
                        </div>

                            <h5>¿Ofrece grado academico?</h5>

                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-blue-grey active">
                                <input value="Y" type="radio" name="getDegree" id="option1" autocomplete="off" checked required>SI
                            </label>
                            <label class="btn btn-blue-grey">
                                <input value="N" type="radio" name="getDegree" id="option2" autocomplete="off" required>NO
                            </label>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <div class="pull-right row">
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection