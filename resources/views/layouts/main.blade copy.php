<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <!-- Bootstrap -->
    <link href="{{asset('/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Switchery -->
    <link href="{{asset('/vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet">
    <!-- Ion.RangeSlider -->
    <link href="{{asset('vendors/normalize-css/normalize.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/ion.rangeSlider/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('/build/css/custom.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/css/main.css')}}" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col" style="margin-top: 71px; min-height: 90%;">
            <div class="left_col scroll-view" style="width: 100%;">
                <div class="nav toggle">
                    <a id="menu_toggle" style="color: #404040; padding: 15px 25px 0;"><i class="fa fa-bars"></i></a>
                </div>

                <div class="clearfix"></div>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li>
                                <a href="{{url('home')}}">
                                    <i class="fa fa-home" style="text-align: center;"></i> Home
                                </a>
                            </li>
                            <li>
                                <a href="{{url('moleculas')}}">
                                    <i class="fa fa-archive" style="text-align: center;"></i> Moléculas
                                </a>
                            </li>
                            <li>
                                <a href="{{url('usuarios')}}">
                                    <i class="fa fa-users" style="text-align: center;"></i> Usuários
                                </a>
                            </li>
                            <li>
                                <a href="{{url('usuarios-app')}}">
                                    <i class="fa fa-mobile" style="text-align: center;"></i> Usuários App
                                </a>
                            </li>
                            <li>
                                <a href="{{url('relatorio-buscas')}}">
                                    <i class="fa fa-file-text" style="text-align: center;"></i> Relatório de Buscas
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav" style="margin-left: 0px;">
            <div class="nav_menu">
                <nav>
                    <img class="logo" src="{{asset('images/eurofarma_logo.png')}}">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="@if(Auth::user()->imagem) {{App\Helpers::storage(Auth::user()->imagem)}} @else {{asset('images/user.png')}} @endif" alt=""> {{Auth::user()->name}}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="{{url('perfil/'.Auth::user()->id.'/edit')}}"> Meu Perfil</a></li>
                                <li><a href="{{route('logout')}}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out pull-right"></i>
                                        Sair
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer style="margin-left: 0px;">
            <div class="pull-right">
                Desenvolvido por <a href="https://superteia.com.br" target="_blank">Superteia</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="{{asset('/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('/vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{asset('/vendors/nprogress/nprogress.js')}}"></script>
<script src="{{asset('/vendors/moment/min/moment.min.js')}}"></script>
<!-- morris.js -->
<script src="{{asset('/vendors/raphael/raphael.min.js')}}"></script>
<script src="{{asset('/vendors/morris.js/morris.min.js')}}"></script>
<!-- Switchery -->
<script src="{{asset('/vendors/switchery/dist/switchery.min.js')}}"></script>
<!--Mask.js
<script src="{{asset('js/jquery.mask.js')}}"></script>-->
<!-- Ion.RangeSlider -->
<script src="{{asset('vendors/ion.rangeSlider/js/ion.rangeSlider.min.js')}}"></script>
<!-- Custom Theme Scripts -->
<script src="{{asset('/build/js/custom.min.js')}}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@yield('javascript')
</body>
</html>