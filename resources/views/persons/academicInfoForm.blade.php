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

                    <div class="md-form">
                        <label class="lbl_gd" >Titulo de egreso</label>
                        <input class=" form-control input_gd" type="text" >
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
            <input hidden class="dependencyId" value="0" >

            </div>





        </div>

    </div>



