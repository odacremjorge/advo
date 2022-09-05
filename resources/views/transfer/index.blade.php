@extends('layouts.layoutTransfer')

@section('content')
<div class="container">
<main>
        <center><h1>BUSQUE AL JUGADOR QUE QUIERA TRANSFERIR</h1><br></center>
        

</main>
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif

<div class="widget-content">
                <table id="myTable" class="display nowrap cell-border" style="width:100%">
                           

                <thead>
                        <tr>
                            
                            
                            <th>Nombre</th>
                           
                            <th>Fecha de nacimiento</th>
                            <th>C.I.</th>
                            <th>Categoria</th>
                            <th>Foto de Jugador</th>
                            <th>Jugador</th>
                            <th>Club</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                    @foreach($players as $data)
                        
                        <td><center>{{$data->name_player}}<center></td>
                        
                        <td><center>{{$data->date_birth}}<center></td>
                        <td><center>{{$data->ci_player}}<center></td>
                        <td><center>{{$data->category_player}}<center></td>
                        <td>
                            <center>
                            <img src="{{asset('storage/player_pic/'.$data->picture_player)  }}" alt="" width="80" height="80">

                            <center>
                            
                        </td>
                        <td><center>{{$data->condition_player}}<center></td>
                        <td><center>{{$data->name_team}}<center></td>
                        
                        <td><center>
                      
                        <a href="/transfer/create/{{$data->id}}" class="btn1" title="Generar Ficha de Transferencia"><i class="fa fa-plus" ></i></a>

                            
                            
                            </center></td></tr>
                    @endforeach
                    </tbody>
                    
                </table>
            </div>
@endsection

@section('js')

    

@endsection