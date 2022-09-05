@extends('layouts.layoutRecord')

@section('content')

<section class="form-register">
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif
<center><h4>Registro de Nuevo Historial al Entrenador: {{$coach->name}}</h4></center>
        <form action="{{ route('record.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <input type="hidden" name="entrenador_id" value="{{$coach->id}}">
                <div class="col-xl-4"> 
                <label>Categoria:</label>
                    <br><br>
                        <select class="controls"  name="Category" id="Category" placeholder="Seleccione">
                                
                                <option value="1ra de Honor">1ra de Honor</option>
                                <option value="1ra de Ascenso">1ra de Ascenso</option>
                                <option value="2da de Ascenso">2da de Ascenso</option>
                                <option value="Juveniles">Juveniles</option>
                                <option value="Menores">Menores</option>
                                <option value="Infantiles">Infantiles</option>
                                <option value="Minis">Minis</option>
                                
                        </select>  
                        
                         <br> 
                </div>
                
                <div class="col-xl-4"> 
                <label>Rama:</label>
                    <br><br>
                        <select class="controls"  name="Gender" id="Gender" placeholder="Seleccione">
                                
                                <option value="Masculina">Masculina</option>
                                <option value="Femenina">Femenina</option>
                                
                                
                        </select>  
                        
                         <br> 
                </div>

                <div class="col-xl-4">
                <label>Año:</label>
                <br><br>
                        <input class="controls" type="number" name="Year" id="Year" placeholder="Ingrese el año del campeonato">
                        <br>    
                </div>

                <div class="col-xl-4"> 
                <label>Posición:</label>
                    <br><br>
                        <select class="controls"  name="Position" id="Position" placeholder="Seleccione">
                                
                                <option value="1ro">1ro</option>
                                <option value="2do">2do</option>
                                <option value="3ro">3ro</option>
                                <option value="4to">4to</option>
                                <option value="5to">5to</option>
                                <option value="6to">6to</option>
                                <option value="7mo">7mo</option>
                                <option value="8vo">8vo</option>
                                <option value="9no">9no</option>
                                <option value="10mo">10mo</option>
                                <option value="11vo">11vo</option>
                                <option value="12vo">12vo</option>
                                <option value="13vo">13vo</option>
                                <option value="14vo">14vo</option>
                        </select>  
                        
                         <br> 
                </div>

                <div class="col-xl-4"> 
                <label>Tipo de Campeonato:</label>
                    <br><br>
                        <select class="controls"  name="Type" id="Type" placeholder="Seleccione">
                                
                                <option value="Selección Nacional">Selección Nacional</option>
                                <option value="Seleccion Departamental">Seleccion Departamental</option>
                                <option value="Liga Nacional">Liga Nacional</option>
                                <option value="Trasandino">Trasandino</option>
                                <option value="Campeonato Local">Campeonato Local</option>
                                
                        </select>  
                        
                         <br> 
                </div>

            <div class="col-xl-4">
            <label>Club/Departamento:</label>
            <br><br>
                    <input class="controls" type="text" name="Team" id="Team" placeholder="Ingrese el club o ciudad">
                    <br>    
            </div>
               <input class="botons" type="submit" value="Guardar Datos">
        </div>

        </form>
</section>

<br>
                    <div class="col-xl-12">
                    <center> <label style="font-size:32px">Historial</label> </center>
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
                                                        <th>Categoria</th>
                                                        <th>Rama</th>
                                                        <th>Año</th>
                                                        <th>Posicion</th>
                                                        <th>Tipo de Campeonato</th>
                                                        <th>Club/Departamento</th>
                                                       
                                                        <th>Acción</th>
                                                    </tr>
                                                </thead>
                        
                                                <tbody>
                                               @foreach($rec as $data)  
                                                <tr>
                                                        <td style="font-size:12px"><center>{{$data->category_type}}</center></td>
                                                        <td style="font-size:12px"><center>{{$data->gender}}</center></td> 
                                                        <td style="font-size:12px"><center>{{$data->year}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$data->position}}</center></td>
                                                        <td style="font-size:12px"><center>{{$data->type_championship}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$data->team_dep}}</center></td>
                                                      
                                                        <td><center>

                                                   
                                                   
                                                                                                        
                                                    <form
                                                            action="{{ route('record.destroy', $data->id) }}"
                                                            method="POST">
                                                            <a href="/record/{{$data->id}}/edit" class="btn" title="Editar"><i class="fa fa-edit" ></i></a>
                                                   
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn1"
                                                                    onclick="return confirm('¿Seguro que quiere eliminar el registro de historial?')"
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