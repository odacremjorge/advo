<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Transferencia</title>

    <!-- Scripts -->
    <script src="{{ asset('js/transfer.js') }}" defer></script>

    <!-- Fonts -->
   

    <!-- Styles -->
    <link href="{{ public_path('css/transferPDF.css') }}" rel="stylesheet" type="text">
    
     <!-- Bootstrap -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->

    

</head>


<body>
<img class= "foto2" src="{{public_path('images/logoavo.png')}}" width="100" loading="lazy" >
<div class="caja3">
    <br>
<center><h5>N° {{$transfers->id}}</h5></center>
</div>
<br>
        <center><h5>ASOCIACION DE VOLEIBOL ORURO</h5></center>
        <center><h5 style="color:red">Formulario de Compensación por Derecho de</h5></center>
        <center><h5 style="color:red">Formación Deportiva</h5></center>

<br><br>
<h5>Deportista:</h5>
<img class="foto1" src="{{public_path('storage/player_pic/'.$players->picture_player)}}" width="150" loading="lazy" >

    <div class="caja1">
        <h5>JUGADOR: <a>{{$players->name_player}}</a></h5>  
        <h5>FECHA DE NACIMIENTO: <a>{{$players->date_birth}}</a></h5> 
        <h5>LUGAR DE NACIMIENTO: <a>{{$players->city_player}}</a></h5> 
        <h5>NACIONALIDAD: <a>{{$players->nacionality}}</a></h5>  
        <h5>CEDULA DE IDENTIDAD O PASAPORTE: <a>{{$players->ci_player}}</a></h5>     
        <h5>TELEFONO: <a>{{$players->phone_player}}</a></h5>   
        <h5>DOMICILIO: <a>{{$players->address_player}}</a></h5>  
        <h5>NUMERO DE REGISTRO AVO: <a>{{$players->num_reg}}</a></h5>  
        <h5>NUMERO DE KARDEX NACIONAL: <a>{{$players->kardex}}</a></h5>  
        
    </div>
    <h5>Datos Generales:</h5>
    <div class="caja">
        <h5>ULTIMA CATEGORIA: <a>{{$players->category_player}}</a></h5>  
    </div>
    <div class="caja">
        <h5>RAMA: <a>{{$players->gender_player}}</a></h5>  
    </div>
    <h5>Datos de la Transferencia:</h5>
    <table id="myTable">
        <thead>
            <tr>
                
                <th>DE (Club de Origen)</th>
                <th>A (Club Receptor)</th>
                            
                
            </tr>
        </thead>              
                   
        <tbody>
       
        <tr>
                
                <td >{{$transfers->team_back}}</td>
                <td >{{$transfer}}</td>
               
               
        </tr>
        
        </tbody>  
    
    </table>
    <h5>Firmas y Sellos:</h5>
    <table id="myTable">
        <thead>
            <tr>
                
                <th>Firma del Jugador (a)</th>
                <th>Presidente (Club Receptor) - Sello</th>
                            
                
            </tr>
        </thead>              
                   
        <tbody>
       
        <tr>
                
                <td ><br><br><br></td>
                <td ><br><br><br></td>
               
               
        </tr>
        
        </tbody>  
    
    </table>

    <h5>Aprobación:</h5>
    <div class="caja2">
        <a >
            De conformidad con la reglamentación vigente, en la Asociación de Voleibol de Oruro, certificamos que el(a) jugador(a):
            <a style="font-weight:bold"> {{$players->name_player}}   </a>
            perteneciente a los registros del club:
            <a style="font-weight:bold"> {{$transfers->team_back}}   </a>
            no tiene cargos pendientes con el mismo y se autoriza su registro en el club
            <a style="font-weight:bold"> {{$transfer}}   </a>.
        </a>  
    </div>
    <br><br><br><br><br>
    <table id="myTable">
        <thead>
            <tr>
                
            <th>Presidente Club de Origen</th>
                <th>Presidente Asociación de Voleibol Oruro</th>
                            
                
            </tr>
        </thead>              
                   
        <tbody>
       
        <tr>
                
                <td ><br><br><br></td>
                <td ><br><br><br></td>
               
               
        </tr>
        
        </tbody>  
    
    </table>
    <h5> Del Monto de Transferencia (Bs.):</h5>
    <table id="myTable">
        <thead>
            <tr>
                <th>Monto Total en Bs.</th>
                <th>Secretaria de Hacienda ADVO</th>
               
                            
                
            </tr>
        </thead>              
                   
        <tbody>
       
        <tr>
                
                <td >{{$transfers->price}}</td>
                <td ><br></td>
               
               
        </tr>
        
        </tbody>  
    
    </table>
    </body>

</html>