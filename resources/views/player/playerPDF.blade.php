<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Jugador</title>

    <!-- Scripts -->
    <script src="{{ asset('js/player.js') }}" defer></script>

    <!-- Fonts -->
   

    <!-- Styles -->
    <link href="{{ public_path('css/playerPDF.css') }}" rel="stylesheet" type="text">
    
     <!-- Bootstrap -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->

    

</head>


<body>
<img class= "foto2" src="{{public_path('images/logoavo.png')}}" width="100" loading="lazy" >
<div class="caja3">
    <br>
<center><h5>FICHA N° {{$players->id}}</h5></center>
</div>
<br>
        <center><h5>ASOCIACION MUNICIPAL DE VOLEIBOL ORURO</h5></center>
        <center><h5 style="color:red">Ficha de Información Personal</h5></center>
        <center><h5 style="color:red">AMVO-{{$players->id}}</h5></center>

<br><br>
<h5>Datos Generales:</h5><br>
<img class="foto1" src="{{public_path('storage/player_pic/'.$players->picture_player)}}" width="150" loading="lazy" >

    <div class="caja1">
        <h5>CLUB: <a>{{$players->name_team}}</a></h5>        
    </div>
    <div class="caja">
        <h5>GESTIÓN: <a>2022</a></h5>        
    </div>
       <br><br><br>
    <div class="caja1">
        <h5>CATEGORIA: <a>{{$players->category_player}}</a></h5>        
    </div>
    <div class="caja">
        <h5>RAMA: <a>{{$players->gender_player}}</a></h5>        
    </div>  
    <h5>Datos del Jugador:</h5><br>
    <div class="caja2">
        <h5>NOMBRE COMPLETO: <a>{{$players->name_player}}</a></h5>
        <h5>CEDULA DE IDENTIDAD: <a>{{$players->ci_player}}</a></h5>
        <h5>NACIONALIDAD: <a>{{$players->nacionality}}</a></h5>
        <h5>LUGAR DE NACIMIENTO: <a>{{$players->city_player}}</a></h5>
        <h5>DIRECCIÓN: <a>{{$players->address_player}}</a></h5>
        <h5>TELEFONO: <a>{{$players->phone_player}}</a></h5>
    </div>
<br><br><br>
    <div class="caja4">
        <h5>N° REG: <a>{{$players->num_reg}}</a></h5>   
        <h5>FECHA: <a>{{$players->date_hab}}</a></h5>       
    </div>  

    <br><br><br><br><br>
    <h5>Certificado de Nacimiento:</h5> <br>  
    <table id="myTable">
        <thead>
            <tr>
                
                <th>O.R.C.</th>
                <th>L.N°.</th>
                <th>PARTIDA</th>
                <th>LOCALIDAD</th>
               
                
            </tr>
        </thead>              
                   
        <tbody>
       
        <tr>
                
                <td >{{$players->orc_player}}</td>
                <td >{{$players->ln_player}}</td>
                <td >{{$players->partida_player}}</td>
                <td >{{$players->city_player}}</td>
               
        </tr>
        
        </tbody>  
    
    </table>

    <br><h5>Fecha de Nacimiento:</h5><br>
    <div class="caja5">
        <h5>FECHA DE NACIMIENTO: <a>{{$players->date_birth}}</a></h5>
        <h5>EDAD: <a>{{$date}}</a></h5><br><br>
        <center><h5 style="font-size:12px">Firma del Jugador</h5></center>
    </div>
    
   
    <div class="caja5">
        
        <h5>CENTRO DE TRABAJO: <a>{{$players->work_player}}</a></h5>
        <h5>CENTRO DE ESTUDIOS: <a>{{$players->studies_player}}</a></h5>
        <h5>GRADO DE ESTUDIOS: <a>{{$players->degree_player}}</a></h5>
        <h5>CLUB ANTERIOR: <a>{{$players->team_ant}}</a></h5>
        <h5>CLUB ACTUAL: <a>{{$players->name_team}}</a></h5>
        
    </div>
   
    <br><h5>Nota:</h5><br>
    <div class="caja6">
        <br>
        <a>Declaro que los datos proporcionados en esta ficha, son veridicos pudiendo en su caso ser comprobados con la documentación original correspondiente para los fines consiguientes.</a>
    </div>
    <div class="caja7">
        <br><br><br><br>
    <center><h5 style="font-size:12px">Firma y Sello Club</h5></center>
    </div>
    <br><br><br><br><br>
    <center><h5 style="color:red">ADVO Cancha Auxiliar Palacio de los Deportes. Telefono: 72445673</h5></center>
</body>

</html>