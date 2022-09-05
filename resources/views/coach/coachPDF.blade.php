<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Entrenador</title>

    <!-- Scripts -->
    <script src="{{ asset('js/coach.js') }}" defer></script>

    <!-- Fonts -->
   

    <!-- Styles -->
    <link href="{{ public_path('css/coachPDF.css') }}" rel="stylesheet" type="text">
    
     <!-- Bootstrap -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->

    

</head>


<body>
<img class= "foto2" src="{{public_path('images/logoavo.png')}}" width="100" loading="lazy" >
<div class="caja">
    <br>
<center><h5>FICHA N° {{$coaches->id}}</h5></center>
</div>
<br>
        <center><h5>ASOCIACION MUNICIPAL DE VOLEIBOL ORURO</h5></center>
        <center><h5 style="color:red">Ficha Técnica de Entrenador</h5></center>
        <center><h5 style="color:red">AMVO/{{$coaches->id}}/2022</h5></center>

<br><br>

<h5>Datos del Entrenador:</h5>
    <div class="caja1">
        <h5>NOMBRE: <a>{{$coaches->name}}</a></h5>
        <h5>CATEGORIA: <a>{{$coaches->category}}</a></h5>
        <h5>TELEFONO: <a>{{$coaches->phone}}</a></h5>
        <h5>C.I.: <a>{{$coaches->ci}}</a></h5>
        <h5>EDAD: <a>{{$coaches->age}}</a></h5>
        <h5>CLUB ACTUAL: <a></a></h5>
        <h5>GESTION: <a>2022</a></h5>
    </div>
    <img class="foto1" src="{{public_path('storage/profile_pic/'.$coaches->photography)}}" width="150" loading="lazy" >
     <br><br><br><br><br><br><br><br> <br><br><br> 
    <h5>Historial de Trabajos del Entrenador:</h5>   
    <table id="myTable">
        <thead>
            <tr>
                
                <th>GESTION</th>
                <th>CAMPEONATO</th>
                <th>CLUB/DEPARTAMENTO</th>
                <th>CATEGORIA</th>
                <th>RAMA</th>
                <th>POSICION</th>
                
            </tr>
        </thead>              
                   
        <tbody>
       @foreach($rec as $data)
        <tr>
                
                <td >{{$data->year}}</td>
                <td >{{$data->type_championship}}</td>
                <td >{{$data->team_dep}}</td>
                <td >{{$data->category_type}}</td>
                <td >{{$data->gender}}</td>
                <td >{{$data->position}}</td>
        </tr>
        @endforeach
        </tbody>  
    
    </table>


   

</body>

</html>