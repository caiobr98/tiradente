<ul class="sidebar-menu scrollable pos-r">

    <li class="nav-item mT-30 active"><a class="sidebar-link" href="{{url('home')}}"><span class="icon-holder"><i class="c-blue-500 fa fa-home"></i> </span><span class="title">Home</span></a></li>
    
    @can('isAdmin')
    <li class="nav-item"><a class="sidebar-link" href="{{url('usuarios')}}"><span class="icon-holder"><i class="c-purple-500 fa fa-lock"></i> </span><span class="title">Administradores</span></a></li>
    @endcan
    
    @if(Gate::check('isAdmin') || Gate::check('isGestor') || Gate::check('isColaborador'))
        <li class="nav-item"><a class="sidebar-link" href="{{url('usuarios')}}"><span class="icon-holder"><i class="c-blue-500 fa fa-calendar"></i> </span><span class="title">Eventos</span></a></li>
    @endif

    @if(Gate::check('isAdmin') || Gate::check('isGestor') || Gate::check('isColaborador'))
        <li class="nav-item"><a class="sidebar-link" href="{{url('arcadadentaria')}}"><span class="icon-holder"><i class="c-gray-500 fa fa-users"></i> </span><span class="title">Avaliação</span></a></li>
    @endif

    @can(['isAdmin',  'isGestor'])
        <li class="nav-item"><a class="sidebar-link" href="{{url('usuarios')}}"><span class="icon-holder"><i class="c-blue-500 fa fa-users"></i> </span><span class="title">Equipe</span></a></li>
    @endcan

    @can('isAdmin')
        <li class="nav-item"><a class="sidebar-link" href="{{url('colaboradores')}}"><span class="icon-holder"><i class="c-orange-500 fa fa-user-md"></i> </span><span class="title">Colaborador</span></a></li>
    @endcan
    
    @can('isAdmin')
        <li class="nav-item"><a class="sidebar-link" href="{{url('coordenadores')}}"><span class="icon-holder"><i class="c-blue-500 fa fa-user"></i> </span><span class="title">Coordenador</span></a></li>
    @endcan

    @can('isAdmin')
        <li class="nav-item"><a class="sidebar-link" href="{{url('escolas')}}"><span class="icon-holder"><i class="c-yellow-500 fa fa-graduation-cap"></i> </span><span class="title">Escola</span></a></li>
    @endcan

    @can('isAdmin')
        <li class="nav-item"><a class="sidebar-link" href="{{url('alunos')}}"><span class="icon-holder"><i class="c-red-500 fa fa-user"></i> </span><span class="title">Aluno</span></a></li>
    @endcan

    @can('isAdmin')
        <li class="nav-item"><a class="sidebar-link" href="{{url('usuarios')}}"><span class="icon-holder"><i class="c-green-500 fa fa-money"></i> </span><span class="title">Gastos</span></a></li>
    @endcan

    @can('isAdmin')
        <li class="nav-item"><a class="sidebar-link" href="{{url('usuarios')}}"><span class="icon-holder"><i class="c-black-500 fa fa-credit-card-alt"></i> </span><span class="title">Pagamentos</span></a></li>
    @endcan


    {{-- <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-orange-500 ti-layout-list-thumb"></i> </span><span class="title">Tables</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
        <ul class="dropdown-menu">
            <li><a class="sidebar-link" href="basic-table.html">Basic Table</a></li>
            <li><a class="sidebar-link" href="datatable.html">Data Table</a></li>
        </ul>
    </li>
    <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-purple-500 ti-map"></i> </span><span class="title">Maps</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
        <ul class="dropdown-menu">
            <li><a href="google-maps.html">Google Map</a></li>
            <li><a href="vector-maps.html">Vector Map</a></li>
        </ul>
    </li>
    <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-red-500 ti-files"></i> </span><span class="title">Pages</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
        <ul class="dropdown-menu">
            <li><a class="sidebar-link" href="blank.html">Blank</a></li>
            <li><a class="sidebar-link" href="404.html">404</a></li>
            <li><a class="sidebar-link" href="500.html">500</a></li>
            <li><a class="sidebar-link" href="signin.html">Sign In</a></li>
            <li><a class="sidebar-link" href="signup.html">Sign Up</a></li>
        </ul>
    </li>
    <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-teal-500 ti-view-list-alt"></i> </span><span class="title">Multiple Levels</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
        <ul class="dropdown-menu">
            <li class="nav-item dropdown"><a href="javascript:void(0);"><span>Menu Item</span></a></li>
            <li class="nav-item dropdown"><a href="javascript:void(0);"><span>Menu Item</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
                <ul class="dropdown-menu">
                    <li><a href="javascript:void(0);">Menu Item</a></li>
                    <li><a href="javascript:void(0);">Menu Item</a></li>
                </ul>
            </li>
        </ul>
    </li> --}}
</ul>
