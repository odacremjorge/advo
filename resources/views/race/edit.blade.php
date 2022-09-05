@extends('layouts.layoutRace')

@section('content')

<section class="form-register">

<center><h4>Actualizar Dato de la Trayectoria del Jugador</h4></center>
        <form action="{{ route('race.update', $recor->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
        
                <div class="col-xl-6"> 
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
                
                

                <div class="col-xl-6">
                <label>Año:</label>
                <br><br>
                        <input class="controls" type="number" value="{{$recor->year_race}}"name="Year" id="Year" placeholder="Ingrese el año del campeonato">
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
                    <input class="controls" type="text" value="{{$recor->team_race}}"name="Team" id="Team" placeholder="Ingrese el club o ciudad">
                    <br>    
            </div>
               <input class="botons" type="submit" value="Actualizar Datos">
        </div>

        </form>
</section>

@endsection