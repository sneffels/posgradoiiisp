<form action="{{url('/country')}}" method="post" class="form-horizontal">


    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="row">
        <div class="form-group">
            <label>Pais</label>
            <input class="form-control" type="text" name="name">
        </div>
    </div>
    <button type="submit" class="btn btn-success">Adicionar</button>
</form>