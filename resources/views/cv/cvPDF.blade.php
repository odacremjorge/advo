<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cv</title>

    <!-- Scripts 
    <script src="{{ public_path('js/cvPDF.js') }}" defer></script>-->

    <!-- Fonts -->
   

    <!-- Styles -->
    <link href="{{ public_path('css/cvPDF.css') }}" rel="stylesheet" type="text">
    
     <!-- Bootstrap -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->

    

</head>


<body>
<img class= "foto2" src="{{public_path('images/logoavo.png')}}" width="100" loading="lazy" >
<div class="caja3">
    <br>
<center><h5>Edad: {{$date_age}} años</h5></center>
</div>
<br>
        <center><h5>ASOCIACION DE VOLEIBOL ORURO</h5></center>
        <center><h5 style="color:red">Formulario Estadístico de Registro de</h5></center>
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
        <h5>CLUB: <a>{{$name}}</a></h5>  
    </div>
    <h5>Progreso del jugador:</h5>
    <table id="myTable">
        <thead>
            <tr>
                
                <th>Fecha</th>
                <th>Estatura (cm)</th>
                <th>Posición Habitual</th>
                <th>Alcance al Ataque (cm)</th>           
                <th>Alcance al Bloqueo (cm)</th>
            </tr>
        </thead>              
                   
        <tbody>
       @foreach($rec1 as $data)
        <tr>
                
                <td >{{$data->created_at}}</td>
                <td style="color:red; font-weight:bold">{{$data->height_player}}</td>
                <td >{{$data->position_usual}}</td>
                <td style="color:red; font-weight:bold">{{$data->scope1}}</td>
                <td style="color:red; font-weight:bold">{{$data->scope2}}</td>
                
        </tr>
        @endforeach
        </tbody>  
    
    </table>
    <h5>Estadisticas Parciales del jugador:</h5>
    <table id="myTable">
                                                <thead>
                                                    <tr>
                                                           
                                                        <th>Partido</th>
                                                        <th>%Recepción</th>
                                                        <th>%Ataque</th>
                                                        <th>%Bloqueo</th>
                                                        <th>%Saque</th>
                                                        <th>%Defensa</th>
                                                        <th>%Contrataque</th>
                                                        
                                                        
                                                        
                                                    </tr>
                                                </thead>
                        
                                                <tbody>
                                                @php
                                                    $totalRecepcion = 0;
                                                    $contRecepcion = 0;  
                                                    $totalAtaque = 0;
                                                    $contAtaque = 0; 
                                                    $totalBloqueo = 0;
                                                    $contBloqueo = 0; 
                                                    $totalSaque = 0;
                                                    $contSaque = 0; 
                                                    $totalDefensa = 0;
                                                    $contDefensa = 0; 
                                                    $totalContrataque = 0;
                                                    $contContrataque = 0; 
                                                @endphp
                                              @foreach ($rec as $data)
                                              
                                                <tr>
                                                        
                                                        <td style="font-size:14px"><center>{{$data->name_game}}</center></td> 
                                                         
                                                        @php
                                                            $totalA = $data->dpA+$data->pA+$data->neuA+$data->nA+$data->dnA;
                                                            $totalR = $data->dpR+$data->pR+$data->neuR+$data->nR+$data->dnR;  
                                                            $totalB = $data->dpB+$data->pB+$data->nB+$data->dnB;  
                                                            $totalS = $data->dpS+$data->pS+$data->neuS+$data->nS+$data->dnS;  
                                                            $totalD = $data->dpD+$data->pD+$data->neuD+$data->nD+$data->dnD;
                                                            $totalC = $data->dpC+$data->pC+$data->neuC+$data->nC+$data->dnC; 
                                                            $total = $totalA+$totalR+$totalB+$totalS+$totalD+$totalC; 
                                                            
                                                            if($total != 0){
                                                            $totalDP = $data->dpA+$data->dpR+$data->dpB+$data->dpS+$data->dpD+$data->dpC;
                                                            $eficacia = round (($totalDP*100)/$total);
                                                            
                                                            $totalDN = $data->dnA+$data->dnR+$data->dnB+$data->dnS+$data->dnD+$data->dnC;
                                                            $error = round (($totalDN*100)/$total);  
                                                            
                                                            $accP = $data->dpA+$data->pA+$data->dpR+$data->pR+$data->dpB+$data->pB+$data->dpS+$data->pS+$data->dpD+$data->pD+$data->dpC+$data->pC;
                                                            $accN = $data->dnA+$data->nA+$data->dnR+$data->nR+$data->dnB+$data->nB+$data->dnS+$data->nS+$data->dnD+$data->nD+$data->dnC+$data->nC;
                                                            $eficiencia = round ((($accP-$accN)*100)/$total);
                                                            }
                                                            else{
                                                            $eficacia = 1;
                                                            $eficiencia = 1;
                                                            $error = 1;
                                                            }
                                                            if ($totalA != 0)
                                                            $ataque = round((($data->dpA+$data->pA-($data->dnA+$data->nA))*100)/$totalA);
                                                            else
                                                            $ataque = 1;

                                                            if ($totalR != 0)
                                                            $recepcion = round((($data->dpR+$data->pR-($data->dnR+$data->nR))*100)/$totalR);
                                                            else
                                                            $recepcion = 1;

                                                            if ($totalB != 0)
                                                            $bloqueo = round((($data->dpB+$data->pB-($data->dnB+$data->nB))*100)/$totalB);
                                                            else
                                                            $bloqueo = 1;

                                                            if ($totalS != 0)
                                                            $saque = round((($data->dpS+$data->pS-($data->dnS+$data->nS))*100)/$totalS);
                                                            else
                                                            $saque = 1;

                                                            if ($totalD != 0)
                                                            $defensa = round((($data->dpD+$data->pD-($data->dnD+$data->nD))*100)/$totalD);
                                                            else
                                                            $defensa = 1;

                                                            if ($totalC != 0)
                                                            $contrataque = round((($data->dpC+$data->pC-($data->dnC+$data->nC))*100)/$totalC);
                                                            else
                                                            $contrataque = 1;
                                                            
                                                            $totalRecepcion = $totalRecepcion+$recepcion;
                                                            $contRecepcion = $contRecepcion+1;

                                                            $totalAtaque = $totalAtaque+$ataque;
                                                            $contAtaque = $contAtaque+1;

                                                            $totalBloqueo = $totalBloqueo+$bloqueo;
                                                            $contBloqueo = $contBloqueo+1;

                                                            $totalSaque = $totalSaque+$saque;
                                                            $contSaque = $contSaque+1;

                                                            $totalDefensa = $totalDefensa+$defensa;
                                                            $contDefensa = $contDefensa+1;

                                                            $totalContrataque = $totalContrataque+$contrataque;
                                                            $contContrataque = $contContrataque+1;
                                                        @endphp
                                                       
                                                        <td style="font-size:14px; font-weight:bold"><center>{{$recepcion}} %</center></td> 
                                                        <td style="font-size:14px; font-weight:bold"><center>{{$ataque}} %</center></td>  
                                                        <td style="font-size:14px; font-weight:bold"><center>{{$bloqueo}} %</center></td> 
                                                        <td style="font-size:14px; font-weight:bold"><center>{{$saque}} %</center></td>  
                                                        <td style="font-size:14px; font-weight:bold"><center>{{$defensa}} %</center></td> 
                                                        <td style="font-size:14px; font-weight:bold"><center>{{$contrataque}} %</center></td>  
                                                      
                                                  @endforeach    
                                                </tbody>
    </table>
    @php
    if ($contAtaque != 0)
        $promAtaque = round($totalAtaque/$contAtaque);
    else
        $promAtaque = 1;

    if ($contRecepcion != 0)
        $promRecepcion = round($totalRecepcion/$contRecepcion);
    else
        $promRecepcion = 1;

    if ($contBloqueo != 0)
        $promBloqueo = round($totalBloqueo/$contBloqueo);
    else
        $promBloqueo = 1;

    if ($contSaque != 0)
        $promSaque = round($totalSaque/$contSaque);
    else
        $promSaque = 1;

    if ($contDefensa != 0)
        $promDefensa = round($totalDefensa/$contDefensa);
    else
        $promDefensa = 1;

    if ($contContrataque != 0)
        $promContrataque = round($totalContrataque/$contContrataque);
    else
        $promContrataque = 1;
    @endphp

    
   
    <h5>Mejores Habilidades del jugador Según su Porcentaje en Cada Sistema de Juego:</h5>
    
    <a>Recepción: <div class="v100" style="width:{{$promRecepcion}}%">{{$promRecepcion}}%</div></a>
    <a>Ataque: <div class="v20" style="width:{{$promAtaque}}%">{{$promAtaque}}%</div></a>
    <a>Bloqueo: <div class="v21" style="width:{{$promBloqueo}}%">{{$promBloqueo}}%</div></a>
    <a>Saque: <div class="v22" style="width:{{$promSaque}}%">{{$promSaque}}%</div></a>
    <a>Defensa: <div class="v23" style="width:{{$promDefensa}}%">{{$promDefensa}}%</div></a>
    <a>Contrataque: <div class="v24" style="width:{{$promContrataque}}%">{{$promContrataque}}%</div></a>
    


    
   
   
    <h5>Estadisticas Globales del jugador:</h5>
    <table id="myTable">
                                                <thead>
                                                    <tr>
                                                           
                                                        <th>Partido</th>
                                                        <th>Eficacia</th>
                                                        <th>Eficiencia</th>
                                                        <th>Error</th>
                                                        
                                                        
                                                    </tr>
                                                </thead>
                        
                                                <tbody>
                                                @php
                                                    $totalEficacia = 0;
                                                    $contEficacia = 0;  
                                                    $totalEficiencia = 0;
                                                    $contEficiencia = 0; 
                                                    $totalError = 0;
                                                    $contError = 0; 
                                                   
                                                @endphp
                                              @foreach ($rec as $data)
                                              
                                                <tr>
                                                        
                                                        <td style="font-size:14px"><center>{{$data->name_game}}</center></td> 
                                                         
                                                        @php
                                                            $totalA = $data->dpA+$data->pA+$data->neuA+$data->nA+$data->dnA;
                                                            $totalR = $data->dpR+$data->pR+$data->neuR+$data->nR+$data->dnR;  
                                                            $totalB = $data->dpB+$data->pB+$data->nB+$data->dnB;  
                                                            $totalS = $data->dpS+$data->pS+$data->neuS+$data->nS+$data->dnS;  
                                                            $totalD = $data->dpD+$data->pD+$data->neuD+$data->nD+$data->dnD;
                                                            $totalC = $data->dpC+$data->pC+$data->neuC+$data->nC+$data->dnC; 
                                                            $total = $totalA+$totalR+$totalB+$totalS+$totalD+$totalC; 
                                                            
                                                            if($total != 0){
                                                            $totalDP = $data->dpA+$data->dpR+$data->dpB+$data->dpS+$data->dpD+$data->dpC;
                                                            $eficacia = round (($totalDP*100)/$total);
                                                            
                                                            $totalDN = $data->dnA+$data->dnR+$data->dnB+$data->dnS+$data->dnD+$data->dnC;
                                                            $error = round (($totalDN*100)/$total);  
                                                            
                                                            $accP = $data->dpA+$data->pA+$data->dpR+$data->pR+$data->dpB+$data->pB+$data->dpS+$data->pS+$data->dpD+$data->pD+$data->dpC+$data->pC;
                                                            $accN = $data->dnA+$data->nA+$data->dnR+$data->nR+$data->dnB+$data->nB+$data->dnS+$data->nS+$data->dnD+$data->nD+$data->dnC+$data->nC;
                                                            $eficiencia = round ((($accP-$accN)*100)/$total);
                                                            }
                                                            else{
                                                            $eficacia = 1;
                                                            $eficiencia = 1;
                                                            $error = 1;
                                                            }

                                                            if ($totalA != 0)
                                                            $ataque = round((($data->dpA+$data->pA-($data->dnA+$data->nA))*100)/$totalA);
                                                            else
                                                            $ataque = 1;

                                                            if ($totalR != 0)
                                                            $recepcion = round((($data->dpR+$data->pR-($data->dnR+$data->nR))*100)/$totalR);
                                                            else
                                                            $recepcion = 1;

                                                            if ($totalB != 0)
                                                            $bloqueo = round((($data->dpB+$data->pB-($data->dnB+$data->nB))*100)/$totalB);
                                                            else
                                                            $bloqueo = 1;

                                                            if ($totalS != 0)
                                                            $saque = round((($data->dpS+$data->pS-($data->dnS+$data->nS))*100)/$totalS);
                                                            else
                                                            $saque = 1;

                                                            if ($totalD != 0)
                                                            $defensa = round((($data->dpD+$data->pD-($data->dnD+$data->nD))*100)/$totalD);
                                                            else
                                                            $defensa = 1;

                                                            if ($totalC != 0)
                                                            $contrataque = round((($data->dpC+$data->pC-($data->dnC+$data->nC))*100)/$totalC);
                                                            else
                                                            $contrataque = 1;

                                                            $totalEficacia = $totalEficacia+$eficacia;
                                                            $contEficacia = $contEficacia+1;

                                                            $totalEficiencia = $totalEficiencia+$eficiencia;
                                                            $contEficiencia = $contEficiencia+1;

                                                            $totalError = $totalError+$error;
                                                            $contError = $contError+1;
                                                        @endphp
                                                        <td style="color:red; font-size:14px; font-weight:bold"><center>{{$eficacia}} %</center></td>
                                                        <td style="color:red; font-size:14px; font-weight:bold"><center>{{$eficiencia}} %</center></td>  
                                                        <td style="color:red; font-size:14px; font-weight:bold"><center>{{$error}} %</center></td>  

                                                        
                                                  @endforeach    
                                                </tbody>
    </table>
    @php
    if ($contEficacia != 0)
        $promEficacia = round($totalEficacia/$contEficacia);
    else
        $promEficacia = 1;

    if ($contEficiencia != 0)
        $promEficiencia = round($totalEficiencia/$contEficiencia);
    else
        $promEficiencia = 1;

    if ($contError != 0)
        $promError = round($totalError/$contError);
    else
        $promError = 1;
    @endphp
    <h5>Habilidades Globales del jugador Según su Porcentaje:</h5>
    <ul>
    <a>Eficacia: <div class="v22" style="width:{{$promEficacia}}%">{{$promEficacia}}%</div></a>
    <a>Eficiencia: <div class="v23" style="width:{{$promEficiencia}}%">{{$promEficiencia}}%</div></a>
    <a>Error: <div class="v24" style="width:{{$promError}}%">{{$promError}}%</div></a>
    </ul>

    <h5>Carrera Deportiva del jugador:</h5>
    <table id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th>Año</th>    
                                                        <th>Categoria</th>
                                                        <th>Posicion</th>
                                                        <th>Tipo de Campeonato</th>
                                                        <th>Club/Departamento</th>
                                                       
                                                        
                                                    </tr>
                                                </thead>
                        
                                                <tbody>
                                              @foreach($rec2 as $data) 
                                                <tr>
                                                        <td style="font-size:12px"><center>{{$data->year_race}}</center></td>
                                                        <td style="font-size:12px"><center>{{$data->category_race}}</center></td> 
                                                        <td style="font-size:12px"><center>{{$data->position_race}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$data->type_race}}</center></td>
                                                        <td style="font-size:12px"><center>{{$data->team_race}}</center></td>  
                                                        
                                                      
                                                        
                                                  @endforeach       
                                                </tbody>
                                            </table>
   
    </body>

</html>