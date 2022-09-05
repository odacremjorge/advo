@extends('layouts.layoutTransfer')

@section('content')

<section class="form-register">
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif
<center><h4>Nuevo Registro de Progreso del Jugador {{$players->name_player}}</h4></center>
        <form action="{{ route('cv.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <input type="hidden" name="player_id" value="{{$players->id}}">
                

                <div class="col-xl-3">
                <label>Estatura en (cm):</label>
                <br><br>
                        <input class="controls" type="number" name="Estatura" id="Estatura" placeholder="Ingrese Estatura">
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
                <div class="col-xl-3">
                <label>Alcance al Ataque en (cm):</label>
                <br><br>
                        <input class="controls" type="number" name="Ataque" id="Ataque" placeholder="Ingrese alcance al ataque">
                        <br>    
                </div>
                <div class="col-xl-3">
                <label>Alcance al Bloqueo en (cm):</label>
                <br><br>
                        <input class="controls" type="number" name="Bloqueo" id="Bloqueo" placeholder="Ingrese alcance al bloqueo">
                        <br>    
                </div>

                </div>
               <center><input class="botons" type="submit" value="Guardar Datos"></center>
        </div>      

        </form>
</section>

<br>
                    <div class="col-xl-12">
                    <center> <label style="font-size:32px">Historial de Transferencias</label> </center>
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
                                                        <th>ID</th>
                                                        <th>Fecha</th>
                                                        <th>Estatura (cm)</th>
                                                        <th>Posición Habitual</th>
                                                        <th>Alcance en Ataque (cm)</th>
                                                        <th>Alcance en Bloqueo (cm)</th>
                                                       
                                                        <th>Acción</th>
                                                    </tr>
                                                </thead>
                        
                                                <tbody>
                                              
                                                @foreach($rec as $data)
                                                <tr>
                                                        
                                                        <td style="font-size:12px"><center>{{$data->id}}</center></td>   
                                                        <td style="font-size:12px"><center></center>{{$data->created_at}}</td>   
                                                        <td style="font-size:12px"><center>{{$data->height_player}}</center></td>
                                                        <td style="font-size:12px"><center>{{$data->position_usual}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$data->scope1}}</center></td>
                                                        <td style="font-size:12px"><center>{{$data->scope2}}</center></td>
                                                        <td><center>
                                                        <form
                                                            action="{{ route('cv.destroy', $data->id) }}"
                                                            method="POST">
                                                                                                                    @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn"
                                                                onclick="return confirm('¿Seguro que quiere eliminar el registro de progreso del jugador?')"
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