@extends('app')
@section('content')

<form method="post" action="{{url('country/'.$country->id)}}">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="md-form">
        <input name="name" class="form-control" type="text" id="countryName" value="{{$country->name}}">
        <label for="countryName"></label>
        <button class="btn btn-success" type="submit">Guardar cambios</button>
    </div>
</form>
<div class="container">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a data-toggle="tab" class="active nav-link " aria-expanded="true" href="#cities">
                Ciudades
            </a>
        </li>
        <li class="nav-item">
            <a data-toggle="tab" class="nav-link" href="#createCity">
                Adicionar ciudad
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="cities" class="tab-pane fade in active show">
            <div class="container">
                <table class="table">
                    <tbody>
                    @foreach($country->cities as $city)
                        <tr>
                            <td>{{$city->name}}</td>
                            <td>
                                <a class="teal-text" data-toggle="modal" data-target="#editModal"
                                   data-idcity="{{$city->id}}" data-namecity="{{$city->name}}">
                                    <i class="fa fa-pencil"></i>
                                </a>


                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div id="createCity" class="tab-pane fade in active">
            <div class="container">
                <form class="form-horizontal" style="padding-top: 15px"
                      action="{{url('city/'.$country->id)}}" method="post" >
                    <div class="md-form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input class="form-control" type="text" name="name">
                        <label for="name">Nombre</label>
                    </div>
                    <button class="btn btn-success" type="submit">Adicionar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="EditProvincia">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title w-100" id="EditProvincia">Editar ciudad</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <p>La edicion de estos datos repercutira en otras entidades y formularios </p>
                <form method="post" id="edit-form" class="form-horizontal">

                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="md-form">
                        <input id="namecity" class="form-control" name="name" type="text">
                    </div>
                    <div class="pull-right row">
                        <button type="submit" class="btn btn-secondary">
                            <i class="fa fa-save"></i>
                        </button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

@endsection
@section('page-script')
    <script>
        $('#editModal').on('show.bs.modal',function(e)
        {
            var link=$(e.relatedTarget);
            var idcity=link.data("idcity");
            var namecity=link.data("namecity");
            var modal=$(this);

            modal.find("#namecity").val(namecity);
            modal.find("#edit-form").attr('action','http://posgradoiiisp.dev.com/city/'+idcity);
        });
    </script>
@endsection