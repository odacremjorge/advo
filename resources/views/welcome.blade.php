<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ADVO</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/volleyball.png')}}">
         <!-- Fonts -->
         <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

         <!-- Bootstrap -->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Styles -->
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    </head>
    <body>

        <img src="{{asset('images/balon4.gif')}}" class="img-fluid" width="400" loading="lazy">
        <a style="font-size: 26px"> Asociación Departamental de Voleibol Oruro</a>
        
        <div class="contanier">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Inicio</a>
                    @else


                    

                        <a href="{{ route('login') }}">Iniciar Sesión</a>
                        <!--
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registrarse</a>
                        @endif -->
                    @endauth
                    <br>
                    <center>  <img src="{{asset('images/logoavo.png')}}" width="130" height="130" alt="Club Bolivar" />   </center>
 
                        </div>
            @endif
            
        </div>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <marquee behavior="scroll" direction="left">
        
           
        <img src="{{asset('images/siluetajugador.png')}}" width="140" height="140" alt="Club Bolivar" />
        <img src="{{asset('images/mujer2.png')}}" width="140" height="140" alt="Club Bolivar" />
        <img src="{{asset('images/hombre.png')}}" width="140" height="140" alt="Club Bolivar" />
        <img src="{{asset('images/hombrerecepcion.png')}}" width="140" height="140" alt="Club Bolivar" />
        <img src="{{asset('images/servidor.png')}}" width="90" height="140" alt="Club Bolivar" />
        <img src="{{asset('images/mujer.png')}}" width="170" height="140" alt="Club Bolivar" />
        <img src="{{asset('images/salvar.png')}}" width="160" height="140" alt="Club Bolivar" />
        <img src="{{asset('images/mujer1.png')}}" width="170" height="140" alt="Club Bolivar" />
    </marquee>
    
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
