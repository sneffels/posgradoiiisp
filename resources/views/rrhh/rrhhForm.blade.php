
    <div class="row">
        <div class="col">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-blue-grey active">
                    <input value="A" type="radio" name="state" id="option1" autocomplete="off" checked onchange='$("#stateText").html("Este personal se encuentra [ACTIVO]");'>activo
                </label>
                <label class="btn btn-blue-grey">
                    <input value="I" type="radio" name="state" id="option2" autocomplete="off" onchange='$("#stateText").html("Este personal se encuentra [INACTIVO]");'>inactivo
                </label>

            </div>
            <div>
                <span id="stateText">
        Este personal se encuentra [ACTIVO]
            </span>
            </div>

        </div>
        <div class="col">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-blue-grey active">
                    <input value="D" type="radio" name="type" id="option1" autocomplete="off" checked onchange='$("#typeText").html("Este personal se encuentra  en el grupo[ADMINISTRATIVO]");'> Administrativo
                </label>
                <label class="btn btn-blue-grey">
                    <input value="A" type="radio" name="type" id="option2" autocomplete="off" onchange='$("#typeText").html("Este personal se encuentra  en el grupo[ACADEMICO]");'> Academico
                </label>

            </div>
            <div>
    <span id="typeText">
        Este personal se encuentra en el grupo [ADMINISTRATIVO]
    </span>
            </div>
        </div>

    </div>

<div>

</div>

<div class="md-form blue-grey-text" style="margin-top: 20px">
    <i class="fa fa-calendar prefix"></i>
    <label for="startDate">Fecha de ingreso</label>
    <input class="form-control"  type="text" id="startDate" name="startDate">
</div>
    <div class="md-form blue-grey-text">
        <i class="fa fa-pencil prefix"></i>
        <textarea type="text" id="description" class="md-textarea" name="description"></textarea>
        <label for="description">Descripion del puesto</label>
    </div>
<div class="md-form">
    <div style="position:relative;">
        <a class='btn btn-blue-grey' href='javascript:;'>
            <i class="fa fa-upload"></i>
            Elegir archivo de curriculum
            <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="curriculum" size="40"  onchange='$("#upload-file-info").html($(this).val().replace("C:\\fakepath\\", ""));'>
        </a>

        <span id="upload-file-info"></span>
    </div>

</div>
