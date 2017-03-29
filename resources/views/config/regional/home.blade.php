@extends('app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="container">
                <h3>Extranjero</h3>
                <hr>
            </div>

            <div class="container">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a data-toggle="tab" class="active nav-link " aria-expanded="true" href="#countries">
                            Paises
                        </a>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="tab" class="nav-link" href="#createCountry">
                            Adicionar pais
                        </a>
                    </li>
                </ul>

            </div>
            <div class="tab-content">
                <div id="countries" class="tab-pane fade in active show">
                    <div class="container">
                        <table class="table">
                            <tbody>
                            @foreach($countries as $country)
                                <tr>
                                    <td>{{$country->name}}</td>
                                    <td>
                                        <a class="teal-text" href="{{url('country/edit/'.$country->id)}}"><i class="fa fa-pencil"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="createCountry" class="tab-pane fade in active">
                    <div class="container">
                        <form action="{{url('/country')}}" method="post" class="form-horizontal"
                              style="padding-top: 15px">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                                <div class="md-form">
                                    <input class="form-control" type="text" name="name">
                                    <label for="name">Pais</label>

                                </div>

                            <button type="submit" class="btn btn-success">Adicionar</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-6">
            <div class="container">
                <h3>Nacional</h3>
                <hr>
            </div>
            <div class="container">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a data-toggle="tab" class="active nav-link " aria-expanded="true" href="#departments">
                            Departamentos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="tab" class="nav-link" href="#createDepartment">
                            Adicionar departamento
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div id="departments" class="tab-pane fade in active show">
                    <div class="container">
                        <table class="table">
                            <tbody>
                            @foreach($departments as $department)
                                <tr>
                                    <td>{{$department->name}}</td>
                                    <td>
                                        <a class="teal-text" href="{{url('/department/edit/'.$department->id)}}">
                                            <i class="fa fa-pencil"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="createDepartment" class="tab-pane fade in active">
                    <div class="container">
                        <form class="form-horizontal" style="padding-top: 15px"
                              method="post" action="{{url('/department')}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="md-form">
                                <input class="form-control" type="text" name="departmentName">
                                <label for="departmentName">Nombre</label>
                            </div>
                            <button class="btn btn-success" type="submit">Adicionar</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection

