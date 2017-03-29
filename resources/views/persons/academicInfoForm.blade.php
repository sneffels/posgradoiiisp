<a class="btn btn-dark-green" id="addAIItem">Adicionar informacion academica<i class="fa fa-plus right"></i></a>
<div  id="academicInfoList">
    <div class="card card-block" hidden id="masterAIItem">
        <div class="card-title row">
            <div class="col">
                <h4>Informacion academica</h4>
            </div>
            <div class="col" style="text-align: right">
                <a class="btn btn-danger btn-sm btnDeleteAIItem"><i class="fa fa-trash"></i></a>
            </div>
        </div>
        <div class="card-text">
            <div class="row">
                <div class="col-3">
                    <div class="btn-group btn-group-xs">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>

                        <button type="button" class="btn btn-danger" id="gd-val">action</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item gd-di" href="javascript:void(0)">Tecnico</a>
                            <a class="dropdown-item gd-di" href="javascript:void(0)">Lic.</a>
                            <a class="dropdown-item gd-di" href="javascript:void(0)">M.Sc.</a>
                            <a class="dropdown-item gd-di" href="javascript:void(0)">Ph.D</a>
                            <a class="dropdown-item gd-di" href="javascript:void(0)">---</a>
                        </div>
                    </div>
                </div>
                <div class="col" style="text-align: left">
                    <div class="md-form">
                        <label for="graduationDegree">Titulo de egreso</label>
                        <input id="graduationDegree" type="text" class="form-control">
                    </div>
                </div>
            </div>


            <div class="dependenciesDivMax">
                <select class="form-control dependencies">
                    <option active >Elegir institucion</option>
                    @foreach($dependencies as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                </select>
            </div>
            <div class="dependenciesDiv">

            </div>
            <input hidden class="dependencyId" value="0" name="dependencyId" >


        </div>

    </div>

</div>

