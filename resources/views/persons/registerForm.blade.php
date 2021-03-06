


    <div class="row">
        <div class="col-md-4">
            <div class="md-form indigo-text">
                <i class="fa fa-user prefix"></i>
                <label for="name">Nombre</label>
                <input class="form-control personalInfo" type="text" id="name" name="name" value="{{old('name')}}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="md-form indigo-text">
                <i class="fa fa-user prefix"></i>
                <label for="lastName">Apellido paterno</label>
                <input class="form-control personalInfo" type="text" id="lastName" name="lastName" value="{{old('lastName')}}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="md-form indigo-text">
                <i class="fa fa-user prefix"></i>
                <label for="middleName">Apellido materno</label>
                <input class="form-control personalInfo" type="text" id="middleName" name="middleName" value="{{old('middleName')}}">
            </div>

        </div>

    </div>
        <div class="md-form indigo-text">
            <i class="fa fa-calendar prefix"></i>
            <label for="birthDate">Fecha de nacimiento</label>
            <input class="form-control"  type="text" id="birthDate" name="birthDate" value="{{old('birthDate')}}">
        </div>


    <div class="md-form indigo-text">
        <i class="fa fa-id-card prefix" aria-hidden="true"></i>
        <label for="personalId">C.I.</label>
        <input class="form-control"  type="text" id="personalId" name="personalId" value="{{old('personalId')}}">
    </div>
    <div class="md-form indigo-text">
        <i class="fa fa-phone prefix" aria-hidden="true"></i>
        <label for="phone">Telefono</label>
        <input class="form-control" type="text" id="phone" name="phone" value="{{old('phone')}}">
    </div>
    <div class="md-form indigo-text">
        <i class="fa fa-mobile prefix" aria-hidden="true"></i>
        <label for="cellphone">Celular</label>
        <input class="form-control" type="text" id="cellphone" name="cellphone" value="{{old('cellphone')}}">
    </div>
    <div class="md-form indigo-text">
        <i class="fa fa-at prefix" aria-hidden="true"></i>
        <label for="email">Correo Electronico</label>
        <input class="form-control" type="text" id="email" name="email" value="{{old('email')}}">
    </div>
    <div class="input-group md-form indigo-text">
        <i class="fa fa-users fa-2x" aria-hidden="true"></i>
        <select class="form-control" type="text" id="gender" style="margin-left: 15px" name="gender" {{old('gender')}}>
            <option disabled selected>Genero</option>
            <option value="F">Femenino</option>
            <option value="M">Masculino</option>
        </select>
    </div>
    <div class="input-group md-form indigo-text">
        <i class="fa fa-map fa-2x" aria-hidden="true"></i>
        <select class="form-control" type="text" id="originType" style="margin-left: 15px" name="originType" value="{{old('originType')}}">
            <option disabled selected>Tipo procedencia</option>
            <option value="N">Nacional</option>
            <option value="E">Extranjero</option>
        </select>
    </div>
    <div class="input-group md-form indigo-text" id="ig_countries" hidden>
        <i class="fa fa-globe fa-2x" aria-hidden="true"></i>
        <select class="form-control" id="countries" name="countryId" style="margin-left: 15px" value="{{old('countryId')}}">
            <option disabled selected>Elegir un pais</option>
            @foreach($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="input-group md-form indigo-text" id="ig_cities" hidden>
        <i class="fa fa-globe fa-2x" aria-hidden="true"></i>
    <select class="form-control" id="cities" name="cityId" style="margin-left: 15px" value="{{old('cityId')}}">

        <option disabled selected>Elegir un ciudad</option>

    </select>
    </div>
    <div class="input-group md-form indigo-text" id="ig_departments" hidden>
        <i class="fa fa-globe fa-2x" aria-hidden="true"></i>
        <select class="form-control" id="departments" name="departmentId" style="margin-left: 15px" value="{{old('departmentId')}}">
            <option disabled selected>Elegir un departamento</option>
            @foreach($departments as $department)
                <option value="{{$department->id}}">{{$department->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="input-group md-form indigo-text" id="ig_provinces" hidden>
        <i class="fa fa-globe fa-2x" aria-hidden="true"></i>
            <select class="form-control" id="provinces" name="provinceId" style="margin-left: 15px" value="{{old('provinceId')}}">
            <option disabled selected>Elegir una provincia</option>

        </select>
    </div>




