@extends('layouts.layoutRace')

@section('content')

<section class="form-register">
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif
<center><h4>Registro de Juego del Jugador: {{$player->name_player}} </h4></center>
        <form action="{{ route('game.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <input type="hidden" name="player_id" value="{{$player->id}}">

                <div class="col-xl-3">
                    <label>Partido:</label>
                    <br><br>
                        <input class="controls" type="text" name="Partido" id="Partido" placeholder="Ejm: Bolivar vs Ingenieros">
                    <br>    
                </div>

                <div class="col-xl-3"> 
                <label>Posición:</label>
                    <br><br>
                        <select class="controls"  name="Posicion" id="Posicion" placeholder="Seleccione">
                                
                                <option value="Servidor">Servidor</option>
                                <option value="Opuesto">Opuesto</option>
                                <option value="Punta Receptor">Punta Receptor</option>
                                <option value="Central">Central</option>
                                <option value="Libero">Libero</option>
                                                                
                        </select>  
                        
                         <br> 
                </div>

                <div class="col-xl-2">
                    <label>Fecha:</label>
                    <br><br>
                        <input class="controls" type="date" name="Fecha" id="Fecha" placeholder="Fecha">
                    <br>    
                </div>

                <div class="col-xl-2"> 
                <label>Resultado:</label>
                    <br><br>
                        <select class="controls"  name="Resultado" id="Resultado" placeholder="Seleccione">
                                
                                <option value="Victoria">Victoria</option>
                                <option value="Derrota">Derrota</option>
                                                                                              
                        </select>  
                        
                         <br> 
                </div>

                <div class="col-xl-2"> 
                <label>Sets:</label>
                    <br><br>
                        <select class="controls"  name="Sets" id="Sets" placeholder="Seleccione">
                                
                                <option value="2 a 0">2 a 0</option>
                                <option value="2 a 1">2 a 1</option>
                                <option value="3 a 0">3 a 0</option>
                                <option value="3 a 1">3 a 1</option>
                                <option value="3 a 2">3 a 2</option>                                                             
                        </select>  
                        
                         
                </div>

                

                <div class="col-xl-6">
                    <label>Estadisticas del Juego: ATAQUE</label>
                </div>
                <div class="col-xl-6">
                    <label>Estadisticas del Juego: RECEPCIÓN</label>
                </div>
                <div class="col-xl-2">
                    <center><label>++</label></center>
                    <br>
                        <input class="controls" type="number" name="dpa" id="dpa">
                    <br>    
                </div>
                <div class="col-xl-1">
                    <center><label>+</label></center>
                    <br>
                        <input class="controls" type="number" name="pa" id="pa">
                    <br>    
                </div>
                <div class="col-xl-1">
                    <center><label>/</label></center>
                    <br>
                        <input class="controls" type="number" name="neua" id="neua">
                    <br>    
                </div>
                <div class="col-xl-1">
                    <center><label>-</label></center>
                    <br>
                        <input class="controls" type="number" name="na" id="na">
                    <br>    
                </div>
                <div class="col-xl-1">
                    <center><label>--</label></center>
                    <br>
                        <input class="controls" type="number" name="dna" id="dna">
                    <br>    
                </div>
                
                
                <div class="col-xl-2">
                <center><label>++</label></center>
                    <br>
                        <input class="controls" type="number" name="dpr" id="dpr">
                    <br>    
                </div>
                <div class="col-xl-1">
                <center><label>+</label></center>
                    <br>
                        <input class="controls" type="number" name="pr" id="pr">
                    <br>    
                </div>
                <div class="col-xl-1">
                <center><label>/</label></center>
                    <br>
                        <input class="controls" type="number" name="neur" id="neur">
                    <br>    
                </div>
                <div class="col-xl-1">
                <center><label>-</label></center>
                    <br>
                        <input class="controls" type="number" name="nr" id="nr">
                    <br>    
                </div>
                <div class="col-xl-1">
                <center><label>--</label></center>
                    <br>
                        <input class="controls" type="number" name="dnr" id="dnr">
                    <br>    
                </div>


                <div class="col-xl-6">
                    <label>Estadisticas del Juego: BLOQUEO</label>
                </div>
                <div class="col-xl-6">
                    <label>Estadisticas del Juego: SAQUE</label>
                </div>
                <div class="col-xl-2">
                    <center><label>++</label></center>
                    <br>
                        <input class="controls" type="number" name="dpb" id="dpb">
                    <br>    
                </div>
                <div class="col-xl-1">
                    <center><label>+</label></center>
                    <br>
                        <input class="controls" type="number" name="pb" id="pb">
                    <br>    
                </div>
               
                <div class="col-xl-1">
                    <center><label>-</label></center>
                    <br>
                        <input class="controls" type="number" name="nb" id="nb">
                    <br>    
                </div>
                <div class="col-xl-2">
                    <center><label>--</label></center>
                    <br>
                        <input class="controls" type="number" name="dnb" id="dnb">
                    <br>    
                </div>
                
                
                <div class="col-xl-2">
                <center><label>++</label></center>
                    <br>
                        <input class="controls" type="number" name="dps" id="dps">
                    <br>    
                </div>
                <div class="col-xl-1">
                <center><label>+</label></center>
                    <br>
                        <input class="controls" type="number" name="ps" id="ps">
                    <br>    
                </div>
                <div class="col-xl-1">
                <center><label>/</label></center>
                    <br>
                        <input class="controls" type="number" name="neus" id="neus">
                    <br>    
                </div>
                <div class="col-xl-1">
                <center><label>-</label></center>
                    <br>
                        <input class="controls" type="number" name="ns" id="ns">
                    <br>    
                </div>
                <div class="col-xl-1">
                <center><label>--</label></center>
                    <br>
                        <input class="controls" type="number" name="dns" id="dns">
                    <br>    
                </div>

                <div class="col-xl-6">
                    <label>Estadisticas del Juego: DEFENSA</label>
                </div>
                <div class="col-xl-6">
                    <label>Estadisticas del Juego: CONTRATAQUE</label>
                </div>
                <div class="col-xl-2">
                    <center><label>++</label></center>
                    <br>
                        <input class="controls" type="number" name="dpd" id="dpd">
                    <br>    
                </div>
                <div class="col-xl-1">
                    <center><label>+</label></center>
                    <br>
                        <input class="controls" type="number" name="pd" id="pd">
                    <br>    
                </div>
                <div class="col-xl-1">
                    <center><label>/</label></center>
                    <br>
                        <input class="controls" type="number" name="neud" id="neud">
                    <br>    
                </div>
                <div class="col-xl-1">
                    <center><label>-</label></center>
                    <br>
                        <input class="controls" type="number" name="nd" id="nd">
                    <br>    
                </div>
                <div class="col-xl-1">
                    <center><label>--</label></center>
                    <br>
                        <input class="controls" type="number" name="dnd" id="dnd">
                    <br>    
                </div>
                
                
                <div class="col-xl-2">
                <center><label>++</label></center>
                    <br>
                        <input class="controls" type="number" name="dpc" id="dpc">
                    <br>    
                </div>
                <div class="col-xl-1">
                <center><label>+</label></center>
                    <br>
                        <input class="controls" type="number" name="pc" id="pc">
                    <br>    
                </div>
                <div class="col-xl-1">
                <center><label>/</label></center>
                    <br>
                        <input class="controls" type="number" name="neuc" id="neuc">
                    <br>    
                </div>
                <div class="col-xl-1">
                <center><label>-</label></center>
                    <br>
                        <input class="controls" type="number" name="nc" id="nc">
                    <br>    
                </div>
                <div class="col-xl-1">
                <center><label>--</label></center>
                    <br>
                        <input class="controls" type="number" name="dnc" id="dnc">
                    <br>    
                </div>

               
               <input class="botons" type="submit" value="Guardar Datos">
        </div>

        </form>
</section>

<br>
                    <div class="col-xl-12">
                    <center> <label style="font-size:32px">Historial de Juegos</label> </center>
                    </div>
                    <div class="col-xl-12">
                        <div class="container">
                            <div class="row-fluid" style="margin-top: 0">
                                <div class="span12">
                                    <div class="widget-box">
                                        <div class="widget-content">
                                       
                                            <table id="myTable" class="display nowrap cell-border" style="width:100%">
                                                <thead>
                                                    <tr>
                                                           
                                                        <th>Partido</th>
                                                        <th>%Recepción</th>
                                                        <th>%Ataque</th>
                                                        <th>%Bloqueo</th>
                                                        <th>%Saque</th>
                                                        <th>%Defensa</th>
                                                        <th>%Contrataque</th>
                                                        <th>Eficacia</th>
                                                        <th>Eficiencia</th>
                                                        <th>Error</th>
                                                        <th>Fecha</th> 
                                                        <th>Posicion</th>
                                                        <th>Resultado</th>
                                                        <th>Sets</th>
                                                        <th>Acción</th>
                                                    </tr>
                                                </thead>
                        
                                                <tbody>
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
                                                        @endphp
                                                        <td style="font-size:14px; font-weight:bold"><center>{{$recepcion}} %</center></td> 
                                                        <td style="font-size:14px; font-weight:bold"><center>{{$ataque}} %</center></td>  
                                                        <td style="font-size:14px; font-weight:bold"><center>{{$bloqueo}} %</center></td> 
                                                        <td style="font-size:14px; font-weight:bold"><center>{{$saque}} %</center></td>  
                                                        <td style="font-size:14px; font-weight:bold"><center>{{$defensa}} %</center></td> 
                                                        <td style="font-size:14px; font-weight:bold"><center>{{$contrataque}} %</center></td>  
                                                        <td style="color:red; font-size:14px; font-weight:bold"><center>{{$eficacia}} %</center></td>
                                                        <td style="color:red; font-size:14px; font-weight:bold"><center>{{$eficiencia}} %</center></td>  
                                                        <td style="color:red; font-size:14px; font-weight:bold"><center>{{$error}} %</center></td>  

                                                        <td style="font-size:14px"><center>{{$data->date_game}}</center></td>
                                                        <td style="font-size:14px"><center>{{$data->position_game}}</center></td>   
                                                        <td style="font-size:14px"><center>{{$data->result_game}}</center></td>
                                                        <td style="font-size:14px"><center>{{$data->parcial_game}}</center></td>
                                                        <td><center>

                                                   
                                                   
                                                                                                        
                                                    <form
                                                            action="{{ route('game.destroy', $data->id) }}"
                                                            method="POST">
                                                            
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn1"
                                                                    onclick="return confirm('¿Seguro que quiere eliminar el registro del juego?')"
                                                                    title="Clic para eliminar" data-toggle="tooltip"><i
                                                                    class="fa fa-trash"></i></button>
                                                    </form>
                                                   

                                                         </center></td></tr>
                                                  @endforeach    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
            </div>
</section>
        


@endsection

@section('js')

    

@endsection