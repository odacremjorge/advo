@extends('layouts.layoutPlayer')

@section('content')
<div class="container">
<main>
        <center><h1>CREAR JUGADOR</h1><br></center>
        

</main>
<section class="form-register">
<form action="{{ route('player.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
                
                <div class="col-xl-3">
                <label>Número de Registro:</label>
                    <br><br>
                        <input class="controls" type="number" name="Registro" id="Registro" placeholder="Ingrese número de registro *">
                        <br>    
                </div>

                <div class="col-xl-3">
                <label>Kardex del Jugador:</label>
                    <br><br>
                        <input class="controls" type="text" name="Kardex" id="Kardex" placeholder="Ingrese kardex *">
                        <br>    
                </div>

                <div class="col-xl-6">
                <label>Nombre del Jugador:</label>
                    <br><br>
                        <input class="controls" type="text" name="Name" id="Name" placeholder="Ingrese nombre del jugador">
                        <br>    
                </div>

                <div class="col-xl-3">
                <label>Nacionalidad del Jugador:</label>
                    <br><br>
                        <input class="controls" type="text" name="Nacionalidad" id="Nacionalidad" placeholder="Ingrese nacionalidad">
                        <br>    
                </div>

                <div class="col-xl-3">
                <label>Fecha de Nacimiento:</label>
                    <br><br>
                        <input class="controls" type="date" name="Date" id="Date" placeholder="Ingrese Fecha de nacimiento">
                        <br>    
                </div>

                <div class="col-xl-3">
                <label>Carnet de Identidad del Jugador:</label>
                    <br><br>
                        <input class="controls" type="text" name="Ci" id="Ci" placeholder="Ingrese C.I.">
                        <br>    
                </div>

                <div class="col-xl-3"> 
                <label>Categoria:</label>
                    <br><br>
                        <select class="controls"  name="Category" id="Category" placeholder="Seleccione">
                                
                                <option value="1ra de Honor">1ra de Honor</option>
                                <option value="1ra de Ascenso">1ra de Ascenso</option>
                                <option value="2da de Ascenso">2da de Ascenso</option>
                                <option value="Juvenil">Juvenil</option>
                                <option value="Menores">Menores</option>
                                <option value="Infantil">Infantil</option>
                                <option value="Minis">Minis</option>                                
                        </select>  
                        
                         <br> 
                </div>

                <div class="col-xl-6">
                <label>Ingrese Foto del Jugador:</label>
                    <br><br>
                        <input class="controls" type="file" name="Foto" id="Foto" >
                        <br>    
                </div>
                               
                
                <div class="col-xl-6"> 
                <label>Ingrese Club:</label>
                    <br><br>
                        <select class="controls"  name="Team" id="Team" placeholder="Seleccione">
                                @foreach($teams as $data)
                                <option value="{{$data->id}}">{{$data->id}} | {{$data->name_team}}</option>
                               
                                 @endforeach                          
                        </select>  
                        
                         <br> 
                </div>

                <div class="col-xl-3"> 
                <label>Rama:</label>
                    <br><br>
                        <select class="controls"  name="Gender" id="Gender" placeholder="Seleccione">
                                
                                <option value="Femenino">Femenino</option>
                                <option value="Masculino">Masculino</option>
                                                            
                        </select>  
                        
                         <br> 
                </div>

                <div class="col-xl-3">
                <label>Lugar de Nacimiento:</label>
                    <br><br>
                        <input class="controls" type="text" name="Lugar" id="Lugar" placeholder="Ingrese lugar de nacimiento">
                        <br>    
                </div>

                <div class="col-xl-3">
                <label>Dirección:</label>
                    <br><br>
                        <input class="controls" type="text" name="Direccion" id="Direccion" placeholder="Ingrese dirección">
                        <br>    
                </div>

                <div class="col-xl-3">
                <label>Telefono:</label>
                    <br><br>
                        <input class="controls" type="text" name="Telefono" id="Telefono" placeholder="Ingrese telefono">
                        <br>    
                </div>
                <div class="col-xl-12">
               <center><label>Datos de Jugador Nuevo (Solo si es necesario)</center>
               <br>
               </div>
               <div class="col-xl-3">
               <label>Certificado de Nacimiento ORC:</label>
                    <br><br>
                        <input class="controls" type="text" name="ORC" id="ORC" placeholder="Ingrese ORC">
                        <br>    
                </div>

                <div class="col-xl-4">
                <label>Certificado de Nacimiento LN:</label>
                    <br><br>
                        <input class="controls" type="text" name="LN" id="LN" placeholder="Ingrese LN">
                        <br>    
                </div>

                <div class="col-xl-4">
                <label>Partida de Nacimiento:</label>
                    <br><br>
                        <input class="controls" type="text" name="Partida" id="Partida" placeholder="Ingrese partida">
                        <br>    
                </div>
                
               

                <div class="col-xl-3">
                <label>Centro de Trabajo:</label>
                    <br><br>
                        <input class="controls" type="text" name="Trabajo" id="Trabajo" placeholder="Ingrese Trabajo">
                        <br>    
                </div>

                <div class="col-xl-3">
                <label>Centro de Estudios:</label>
                    <br><br>
                        <input class="controls" type="text" name="Estudios" id="Estudios" placeholder="Ingrese Estudios">
                        <br>    
                </div>
                <div class="col-xl-3">
                <label>Grado de Estudios:</label>
                    <br><br>
                        <input class="controls" type="text" name="Grado" id="Grado" placeholder="Ingrese Grado">
                        <br>    
                </div>
                <div class="col-xl-3">
                <label>Club Anterior:</label>
                    <br><br>
                        <input class="controls" type="text" name="Anterior" id="Anterior" placeholder="Ingrese club anterior">
                        <br>    
                </div>
        </div>  
         <center>      
         <input class="botons" type="submit" value="Guardar Datos">
        </center>

        </form>
</section>
@endsection

@section('js')

    

@endsection