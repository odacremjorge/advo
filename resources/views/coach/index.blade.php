@extends('layouts.layoutCoach')

@section('content')
<div class="container">
<main>
        <center><h1>ENTRENADORES DE LA ASOCIACION DE VOLEIBOL ORURO</h1><br></center>
        

</main>
@if ( Auth::user()->role != 'Super Usuario')
<a class= "buttonA" href="{{ url('/coach/create') }}">
        Agregar Entrenador
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
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Categoria</th>
                            <th>C.I.</th>
                            <th>Telefono</th>
                            <th>Foto de Perfil</th>
                            <th>Edad</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                    @foreach ($entrenadors as $record)
                        <td><center>{{ $record->id }}<center></td>
                        <td><center>{{ $record->name }}<center></td>
                        <td><center>{{ $record->category }}<center></td>
                        <td><center>{{ $record->ci }}<center></td>
                        <td><center>{{ $record->phone }}<center></td>
                        
                        <td>
                            <center>
                            <img src="{{asset('storage/profile_pic/'.$record->photography)  }}" alt="" width="80" height="80">
                            <center>
                            
                        </td>
                        <td><center>{{ $record->age }}<center></td>
                        <td><center>
                      
                            
                            
                            <form
                                    action="{{ route('coach.destroy', $record->id) }}"
                                    method="POST">
                                    <a href="/coach/coachPDF/{{$record->id}}" class="btn1" target="_blank" title="Imprimir Ficha de Entrenador"><i class="fa fa-print"></i></a>
                                    @if ( Auth::user()->role != 'Super Usuario')
                                    <a href="/coach/{{$record->id}}/edit" class="btn2" title="Editar"><i class="fa fa-edit" ></i></a>
                                    <a href="/record/index/{{$record->id}}" class="btn3" title="Agregar Historial"><i class="fa fa-plus" ></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn"
                                        onclick="return confirm('¿Seguro que quiere eliminar el registro del entrenador?')"
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
