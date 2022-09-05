<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ 'ADVO' }}</title>
    <link rel="shortcut icon" href="{{asset('images/volleyball.png')}}">
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/app1.js') }}" defer></script>
    <script src="{{ asset('js/app2.js') }}" defer></script>
    <script src="{{ asset('js/tableOperators.js') }}" defer></script>
    <script src="{{ asset('js/canvas.js') }}" defer></script>
    
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap -->
   
    

</head>
<body id="body">

<header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>
        <a class="navbar" href="{{ url('/') }}" >
                    <img src="{{asset('images/balon5.gif')}}" width="100" loading="lazy">
        </a>

       {{ 'Asociación Departamental de Voleibol Oruro' }}
                
</header>
    <div class="menu__side" id="menu_side">

        <div class="name__page">
            <i class="fas fa-volleyball-ball"></i>
            <h4>Club Bolivar</h4>
        </div>

        <div class="options__menu">	

            <a href="{{ url('/home') }}">
                <div class="option">
                    <i class="fas fa-home" title="Inicio"></i>
                    <h4>Inicio</h4>
                </div>
            </a>

            <a href="{{ url('/team') }}">
                <div class="option">
                <i class="fas fa-volleyball-ball" title="Clubes"></i>
                    <h4>Clubes</h4>
                </div>
            </a>
            
            <a href="{{ url('/player') }}">
                <div class="option">
                    <i class="fas fa-users" title="Jugadores"></i>
                    <h4>Jugadores</h4>
                </div>
            </a>

            <a href="{{ url('/cv') }}">
                <div class="option">
                    <i class="fas fa-chart-pie" title="Estadisticas"></i>
                    <h4>Estadisticas</h4>
                </div>
            </a>

            <a href="{{ url('/transfer') }}">
                <div class="option">
                    <i class="far fa-file-excel" title="Transferencias"></i>
                    <h4>Transferencias</h4>
                </div>
            </a>
            
            <a href="{{ url('/coach') }}">
                <div class="option">
                    <i class="fas fa-user-circle" title="Entrenadores"></i>
                    <h4>Entrenadores</h4>

                </div>
            </a>
            @if ( Auth::user()->role == 'Super Administrador')
            <a href="{{ route('users.index') }}">
                <div class="option">
                    <i class="far fa-user" title="Usuarios"></i>
                    <h4>Usuarios</h4>

                </div>
            </a>
            @endif
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <div class="option">
                    <i class="fas fa-sign-out-alt" title="Cerrar Sesion"></i>
                    <h4>Cerrar Sesión</h4>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    </form>
                </div>
            </a>

        </div>

    </div>

    <!--Container Main start-->
    
    </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    
<!-- Scripts -->

<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.css" rel="stylesheet" />
<!-- estilos de la tabla -->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- datatables -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<!--<script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>-->
<!-- Responsive -->
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>

<script src="http://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
  
<!--<script src="js/jquery.js"></script>
<script src="js/jquery.slicebox.js"></script>

<script src="js/script.js"></script>-->


</body>

</html>