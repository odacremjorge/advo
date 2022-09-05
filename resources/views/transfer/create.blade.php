@extends('layouts.layoutTransfer')

@section('content')

<section class="form-register">
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif
<center><h4>Nueva Transferencia del Jugador {{$players->name_player}}</h4></center>
        <form action="{{ route('transfer.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <input type="hidden" name="player_id" value="{{$players->id}}">
                <div class="col-xl-4"> 
                <label>Club de Origen:</label>
                    <br><br>
                    <select class="controls"  name="Team" id="Team" placeholder="Seleccione">
                                @foreach($teams as $data)
                                <option value="{{$data->name_team}}">{{$data->id}} | {{$data->name_team}}</option>
                               
                                 @endforeach                          
                        </select>  
                        
                         <br> 
                </div>
                
                <div class="col-xl-4"> 
                <label>Club Receptor:</label>
                    <br><br>
                    <select class="controls"  name="Team2" id="Team2" placeholder="Seleccione">
                                @foreach($teams as $data)
                                <option value="{{$data->id}}">{{$data->id}} | {{$data->name_team}}</option>
                               
                                 @endforeach                          
                        </select>  
                        
                         <br> 
                </div>

                <div class="col-xl-4">
                <label>Precio de Transferencia:</label>
                <br><br>
                        <input class="controls" type="number" name="Price" id="Price" placeholder="Precio de la transferencia en Bs.">
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
                                                        <th>Club de Origen</th>
                                                        <th>Club Receptor</th>
                                                        <th>Fecha de generación</th>
                                                        <th>Precio de Transferencia Bs.</th>
                                                        <th>Estado de Transferencia</th>
                                                       
                                                        <th>Acción</th>
                                                    </tr>
                                                </thead>
                        
                                                <tbody>
                                               @foreach($transfer as $record)
                                              
                                                <tr>
                                                        
                                                        <td style="font-size:12px"><center>{{$record->id}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$record->team_back}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$record->name_team}}</center></td>
                                                        <td style="font-size:12px"><center>{{$record->created_at}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$record->price}}</center></td>
                                                        <td style="font-size:12px"><center>{{$record->status}}</center></td>
                                                        <td><center>
                                                        <a href="/transfer/transferPDF/{{$record->id}}" class="btn" target="_blank" title="Imprimir Ficha de Transferencia"><i class="fa fa-print" ></i></a>
                                                        @if ( Auth::user()->role != 'Super Usuario')
                                                        <a href="/player/{{$record->id}}/approveTransfer" class="btn2" onclick="return confirm('¿Seguro que quiere aprovar la transferencia?')"title="Aprobar Transferencia"><i class="fa fa-check" ></i></a>
                                                        @endif    
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