
        <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('style/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{asset('style/css/mdb.min.css')}}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{asset('style/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('style/css/navbar-side.css')}}" rel="stylesheet">
    <link href="{{asset('style/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>


<div class="nav-side-menu">
    <div class="brand">Unidad de Posgrado</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
    <div class="menu-list">
        <ul id="menu-content" class="menu-content collapse out">
            <li data-toggle="collapse" data-target="#academics" class="collapsed active">
                <a href="#"><i class="fa fa-gift fa-lg"></i> Académico <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="academics">
                <li class="active"><a href="#">Administrar Programas</a></li>
                <li><a href="#">Administrar Módulos</a></li>
            </ul>
            <li data-toggle="collapse" data-target="#products" class="collapsed">
                <a href="#"><i class="fa fa-gift fa-lg"></i> Recursos Humanos <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="products">
                <li class="active"><a href="#">Administrativos</a></li>
                <li><a href="#">Docentes</a></li>

            </ul>
            <li data-toggle="collapse" data-target="#new" class="collapsed">
                <a href="#"><i class="fa fa-car fa-lg"></i> Estudiantes<span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="new">
                <li>Admisión</li>
                <li>Administración de estudiantes</li>
                <li>Aprobación de módulos</li>
            </ul>
            <li data-toggle="collapse" data-target="#service" class="collapsed">
                <a href="#"><i class="fa fa-globe fa-lg "></i>Configuraciones<span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="service">
                <li>
                    <a href="{{url('/regional')}}">
                        Regional
                    </a>
                </li>
                <li>
                    <a href="{{url('/instacademics')}}">
                        Instituciones académicas
                    </a>

                </li>
                <li>Cuentas</li>
            </ul>


        </ul>
    </div>
</div>
<div class="container" id="main">
    <div class="row z-depth-1" style="height: 70px; background-color: #fafafa; ">
        <div class="col-md-6 align-self-start vertical-center">
            <h5>Instituto de Investigación, Interacción Social y Posgrado</h5>
            <h6>Carrera de Trabajo Social - UMSA</h6>
        </div>

        <div class="col-md-6 align-self-end">
            <div class="pull-right ">
                <a class="blue-grey-text" style="padding-right: 15px"><i class="fa fa-university"></i> Rol</a>
                <a class="blue-grey-text" style="padding-right: 15px"><i class="fa fa-user"></i> Wendy</a>
                <a class="blue-grey-text"><i class="fa fa-sign-out"></i> Salir</a>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="container" style="padding-top: 40px">
            @yield('content')
        </div>

    </div>
</div>
</div>
<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="{{asset('style/js/jquery-3.1.1.min.js')}}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{asset('style/js/tether.min.js')}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{asset('style/js/bootstrap.min.js')}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{asset('style/js/mdb.min.js')}}"></script>
<!-- Time picker-->
<script type="text/javascript" src="{{asset('style/js/moment.js')}}"></script>
<script type="text/javascript" src="{{asset('style/js/bootstrap-material-datetimepicker.js')}}"></script>

    @yield('page-script')

</body>

</html>
