@extends('layouts.layoutPlayer')

@section('content')
<div class="container">
<main>
        <center><h1>JUGADORES DE LA ASOCIACION DE VOLEIBOL ORURO</h1><br></center>
        

</main>
<a class= "buttonA" href="{{ url('/player/create') }}">
        Agregar Jugador
</a>
<br><br><br>
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
                        
                        <td><center>{{$data->category_player}}<center></td>
                        <td>
                            <center>
                            <img src="{{asset('storage/player_pic/'.$data->picture_player)  }}" alt="" width="80" height="80">

                            <center>
                            
                        </td>
                        <td><center>{{$data->condition_player}}<center></td>
                        <td><center>{{$data->name_team}}<center></td>
                        
                        <td><center>
                      
                            
                            
                            <form
                                    action="{{ route('player.destroy', $data->id) }}"
                                    method="POST">
                                   
                                    <a href="/race/index/{{$data->id}}" class="btn3" title="Agregar Trayectoria"><i class="fa fa-plus" ></i></a>
                                    <a href="/player/playerPDF/{{$data->id}}" class="btn1" target="_blank" title="Imprimir Ficha de Jugador"><i class="fa fa-print" ></i></a>
                                    <a href="/game/index/{{$data->id}}" class="btn1" title="Agregar Datos de Juego"><i class="fas fa-volleyball-ball" ></i></a>
                                    @if ( Auth::user()->role != 'Super Usuario')
                                    <a href="/card_player/{{$data->id}}/edit" class="btn5" title="Carnet de Jugador"><i class="fa fa-address-card" ></i></a>
                                    <a href="/player/{{$data->id}}/edit" class="btn4" title="Editar"><i class="fa fa-edit" ></i></a>
                                    @if ($data->condition_player != 'Antiguo') 
                                    <a href="/player/{{$data->id}}/enable" class="btn2" onclick="return confirm('¿Seguro que quiere habilitar al jugador?')" title="Habilitar"><i class="fa fa-check" ></i></a>
                                    @endif
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn"
                                        onclick="return confirm('¿Seguro que quiere eliminar el registro del jugador?')"
                                            title="Clic para eliminar" data-toggle="tooltip"><i
                                            class="fa fa-trash"></i></button>
                                    @endif
                                </form>
                           
                            </center></td></tr>
                    @endforeach
                    </tbody>
                    
                </table>
            </div>

@endsection

@section('js')

    

@endsection