<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Eurofarma</title>

    <!-- Bootstrap -->
    <link href="{{asset('/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('/vendors/nprogress/nprogress.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('/build/css/custom.min.css')}}" rel="stylesheet">
    {{--devs css--}}
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/css/login.css')}}" rel="stylesheet">
</head>

<body class="nav-md" style="background: none;">
<div class="container body">
    <div class="main_container">
        <!-- top navigation -->
        <div class="top_nav m-l-0">
            <div class="nav_menu">
                <nav>
                    <img src="{{asset('images/eurofarma_logo.png')}}">
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col m-l-0" role="main">
            <div class="container">
                <div class="row">
                    <div class="text-center">
                        <h1>Redefinição de senha</h1>
                        <h5>Insira e confirme sua nova senha abaixo</h5>
                    </div>

                    <div class="col-md-12 m-t-50">
                        <div class="row">
                            <div class="col-md-6">
                            </div>

                            <div class="col-md-offset-1 col-md-4">
                                <div class="text-center">
                                    <i class="fa fa-5x fa-lock" aria-hidden="true"></i>
                                </div>

                                <form method="POST" action="{{url('redefinir-senha')}}">
                                    @csrf
                                    @include('parts.messages')
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            </div>
                                            <input id="senha" type="password" class="form-control" name="password" required autofocus placeholder="Senha">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-asterisk" aria-hidden="true"></i>
                                            </div>
                                            <input id="password" type="password" class="form-control" name="password_confirmation" required placeholder="Confirme sua senha">
                                        </div>
                                    </div>
                                    {{csrf_field()}}
                                    <input type="hidden" name="token" value="{{$token}}">
                                    <button type="submit" class="btn btn-info pull-right">Redefinir Senha</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer class="m-l-0">
            <div class="row">
                <div class="col-md-6">
                    Todos os Direitos Reservados
                </div>
                <div class="col-md-6">
                    <div class="pull-right">
                        <img src="{{asset('images/superteia_logo.png')}}">
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
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

<!-- Custom Theme Scripts -->
<script src="{{asset('/build/js/custom.min.js')}}"></script>
</body>
</html>
