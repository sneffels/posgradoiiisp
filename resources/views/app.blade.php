<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="_token" content="{!! csrf_token() !!}"/>

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
    <style>

        .sidenav {
            height: 100%;
            width: 300px;
            position: fixed;
            z-index: 11;
            top: 0;
            left: 0;
            background-color: #1e242f;
            overflow-x: hidden;
            transition: 0.6s;
            padding-top: 53.5px;
            margin-left: -300px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 20px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }

        #blue-bg img {
            position: absolute;
            opacity: 0.7;
            margin-left: -70px;
            margin-top: 90px;
        }

        .prin-side-nav-item {
            cursor: pointer;
            color: #fff;

        }

        .prin-side-nav-subitem {
            cursor: pointer;
            color: #fff;

        }

        .sidenav ul {
            position: relative;
        }

        .sidenav li {
            position: relative;
        }

        #blue-bg {
            position: absolute;
            background-color: #3c763d;
            opacity: 0.4;
        }

    </style>
</head>

<body id="generalBody" style="width: 100%">
<div style="position: fixed; background-color: #fff; height: 100%; width: 100%; opacity: 0.6; z-index: 0" id="block-box">

</div>

<nav class="navbar navbar-dark blue-grey darken-4" style="position: fixed; z-index: 10;width: 100%">
    <div class="container">
        <div class="row">
            <div class="col">
                <a class="navbar-brand" style="cursor:pointer" id="buttonNavBar">

                    <i class="fa fa-bars sm">

                    </i>
                    <span style="font-size: 14px">Area de posgrado</span>

                </a>
            </div>
            <div class="col" style="text-align: right">
                <a class="navbar-brand" style="cursor:pointer;>
                        <i class="fa fa-user sm"></i>
                <span style="font-size: 14px">Wendy Cruz</span>
                <span style="font-size: 14px">Estudiante</span>
                </a>
            </div>


        </div>

    </div>

</nav>
<div class="row" id="generalBody" style="width: 100%; z-index: 0">
    <div class="container" style="margin-top: 70px; ">

        @yield('content')
    </div>
</div>




<div id="mySidenav" class="sidenav nav-side-menu">

    <div style="background-color: snow;
                text-align: center;

                ">
        <img src="/images/logoinst.png"
             width="150" height="120">
    </div>

    <li id="academics " data-toggle="collapse" data-target="#l_academics" class="collapsed nv-item">
        <a href="#"><i class="fa fa-gift fa-lg"></i>Planificacion academica<span class="arrow"></span></a>
    </li>
    <ul class="sub-menu collapse" id="l_academics">
        <li class="active"><a href="{{url('programs')}}">Administrar Programas</a></li>
        <li><a href="{{url('/modules')}}">Administrar Módulos</a></li>
        <li><a href="{{url('/courses')}}">Administrar Paralelos</a></li>
        <li><a href="{{url('/params')}}">Parametrizacion</a></li>
    </ul>
    <li id="hhrr" data-toggle="collapse" data-target="#l_hhrr" class="collapsed nv-item">
        <a href="#"><i class="fa fa-gift fa-lg"></i> Recursos Humanos <span class="arrow"></span></a>
    </li>
    <ul class="sub-menu collapse" id="l_hhrr">
        <li class="active"><a href="#">Administrativos</a></li>
        <li><a href="#">Docentes</a></li>
    </ul>
    <li data-toggle="collapse" data-target="#l_students" class="collapsed nv-item" id="students">
        <a href="#"><i class="fa fa-car fa-lg"></i> Estudiantes<span class="arrow"></span></a>
    </li>
    <ul class="sub-menu collapse" id="l_students">
        <li>
            <a href="{{url('/regNewStudent')}}">
                Registro
            </a>
        </li>
        <li>
            <a href="{{url('enrollment')}}">
                Admisión
            </a></li>
        <li>Administración de estudiantes</li>
        <li>Aprobación de módulos</li>
    </ul>
    <li data-toggle="collapse" data-target="#l_config" class="collapsed nv-item" id="config">
        <a href="#"><i class="fa fa-globe fa-lg "></i>Configuraciones<span class="arrow"></span></a>
    </li>
    <ul class="sub-menu collapse" id="l_config">
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
</div>


<!--Navbar-->

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



</body>

<script>
    var isOpen = 0;

    $('#buttonNavBar').on('click', function (ev) {

        document.getElementById("mySidenav").style.marginLeft = "0px";
        $("#block-box").css('background-color','#000');
        $("#block-box").css('z-index','9');
        isOpen = 1;
        ev.stopPropagation();
    });

    $('.nv-item').on('click', function (ev) {

        ev.stopPropagation();
        var id = $(this).attr('id');
        $('#l_' + id).collapse('toggle');

    });
    $('.sub-menu li').on('click', function (ev) {

        ev.stopPropagation();


    });
    $('#generalBody').on('click', function () {

        if (isOpen = 1) {
            document.getElementById("mySidenav").style.marginLeft = "-300px";
            document.getElementById("generalBody").style.marginLeft = "0";
            $("#block-box").css('background-color','#fff');
            $("#block-box").css('z-index','-1');
        }
    });

</script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
</script>
@yield('page-script')
</html>

