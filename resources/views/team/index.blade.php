@extends('layouts.layoutTeam')

@section('content')
<div class="container">
<main>
        <center><h1>CLUBES DE LA ASOCIACION DE VOLEIBOL ORURO</h1><br></center>
        

</main>
@if ( Auth::user()->role != 'Super Usuario')
<a class= "buttonA" href="{{ url('/team/create') }}">
        Agregar Club
</a>
@endif
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
                            <th>P. Juridica</th>
                            <th>Creación</th>
                            <th>Categoria</th>
                            <th>Logo</th>
                            <th>Delegado</th>
                            <th>Telefono</th>
                            <th>Entrenador</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                   @foreach($teams as $data)
                        <td><center>{{$data->name_team}}<center></td>
                        <td><center>{{$data->personality}}<center></td>
                        <td><center>{{$data->date_creation}}<center></td>
                        <td><center>{{$data->category_max}}<center></td>
                        
                        
                        <td>
                            <center>
                            <img src="{{asset('storage/logo/'.$data->logo)  }}" alt="" width="80" height="80">
                            
                            <center>
                            
                        </td>
                        <td><center>{{$data->manager}}<center></td>
                        <td><center>{{$data->phone_manager}}<center></td>
                        <td><center>{{$data->name}}<center></td>
                        <td><center>
                      
                            
                        @if ( Auth::user()->role != 'Super Usuario')
                            <form
                                    action="{{ route('team.destroy', $data->id) }}"
                                    method="POST">
                                    <a href="/team/{{$data->id}}/edit" class="btn2" title="Editar"><i class="fa fa-edit" ></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn"
                                        onclick="return confirm('¿Seguro que quiere eliminar el registro de club?')"
                                            title="Clic para eliminar" data-toggle="tooltip"><i
                                            class="fa fa-trash"></i></button>
                                </form>
                        @endif   
                            </center></td></tr>
                    @endforeach
                    </tbody>
                    
                </table>
            </div>

@endsection

@section('js')

    

@endsection